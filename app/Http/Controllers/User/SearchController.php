<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Input, Auth;
use App\Service;
use App\SavedSearch;

class SearchController extends Controller
{
    //
    public function search(Request $request,Service $service)
    {
      # code...
      $saved_search = new SavedSearch();
      $service = $service->newQuery();
      //dd ($service);
            // Search for a service based on the subcategory.
            if ($request->has('subcategory')) {
                $service->where('sub_category_id', $request->input('subcategory'))->where('active', 1);
            }
            // Search for a service based on the town.
            if ($request->has('town')) {
                $service->where('town', $request->input('town'))->where('active', 1);
            }
            // Search for a service based on the keyword.
            if ($request->has('keyword')) {
                $saved_search->keyword  = $request->input('keyword');
                $service->where('title', $request->input('keyword'))->where('active', 1);
            }

          if(Auth::guard('user')->check()){
            $saved_search->user_id  = Auth::guard('user')->id();
          }else if(Auth::guard('admin')->check()){
            $saved_search->user_id  = Auth::guard('admin')->id();
          }else{
            $saved_search->user_id  = 0;
          }

            $services = $service->paginate(5);
            if (count ( $services ) > 0){
                if($saved_search->save()){
                return view('user.search_results')->with('services',$services);
              }
            }else{
                return view('user.search_results')->with('services',$services);            
            }

    }
}
