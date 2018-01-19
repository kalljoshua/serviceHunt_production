<?php

namespace App\Http\Controllers\User;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Input, Auth;
use App\Service;
use App\SavedSearch;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
      # code...
        //$saved_search = new SavedSearch();
        //$saved_search->keyword  = $request->input('keyword');
        $sub_category = $request->input('subcategory');
        $district = $request->input('town');
        $keyword = $request->input('keyword');

      //$service = $service->newQuery();
            // Search for a service based on the subcategory.
            if ($sub_category && !$district && !$keyword) {
                        $service = Company::where('sub_category_id', $request->input('subcategory'))
                            ->where('active', 1)
                            ->paginate(5);
                if ($service->count() > 0) {
                    return view('user.search_results', ['services' => $service]);
                } else {
                    flash('Searh fields you provided are empty')->error();
                    return view('user.search_results', ['services' => $service]);
                }

            }
            // Search for a service based on the town.
            if (!$sub_category && $district && !$keyword) {
                $service=Company::where('district', $request->input('town'))
                    ->where('active', 1)->paginate(5);
                if ($service->count() > 0) {
                    return view('user.search_results', ['services' => $service]);
                } else {
                    flash('Searh fields you provided are empty')->error();
                    return view('user.search_results', ['services' => $service]);
                }
            }
            // Search for a service based on the keyword.
            if (!$sub_category && !$district && $keyword) {
                $service=Company::where('name', 'LIKE', '%' . $request->input('keyword') . '%')
                    ->where('active', 1)->paginate(5);
                if ($service->count() > 0) {
                    return view('user.search_results', ['services' => $service]);
                } else {
                    flash('Searh fields you provided are empty')->error();
                    return view('user.search_results', ['services' => $service]);
                }
            }

        if ($sub_category && $district && !$keyword) {
            $service=Company::where('district', $request->input('town'))
                ->where('sub_category_id', $request->input('subcategory'))
                ->where('active', 1)->paginate(5);
            if ($service->count() > 0) {
                return view('user.search_results', ['services' => $service]);
            } else {
                flash('Searh fields you provided are empty')->error();
                return view('user.search_results', ['services' => $service]);
            }
        }

        if ($sub_category && $district && $keyword) {
            $service=Company::where('district', $request->input('town'))
                ->where('sub_category_id', $request->input('subcategory'))
                ->where('name', 'LIKE', '%' . $request->input('keyword') . '%')
                ->where('active', 1)->paginate(5);
            if ($service->count() > 0) {
                return view('user.search_results', ['services' => $service]);
            } else {
                flash('Searh fields you provided are empty')->error();
                return view('user.search_results', ['services' => $service]);
            }
        }

        if (!$sub_category && !$district && !$keyword) {
                flash('Searh fields you provided are empty')->warning();
                return redirect()->back();
        }

            /*if($service->count()>0){
                $services = $service->paginate(5);

                if(count($services)>0){
                    return view('user.search_results',['services'=>$services]);
                }else{
                    flash('Searh fields you provided are empty')->error();
                    return redirect()->back();
                }

            }else{
                flash('Searh fields you provided are empty')->warning();
                return redirect()->back();
            }*/



    }

    /*public function search(Request $request)
    {
        //return "am here";
        //return $request->fullUrl();

        $saved_search = new SavedSearch();
        $saved_search->keyword  = $request->input('keyword');
        $sub_category = $request->input('subcategory');
        $district = $request->input('town');
        $searchQuery = $request->input('keyword');
        if ($searchQuery or $district or $sub_category) {
            //$properties = DB::table('properties');
            $results = Company::where('name', 'LIKE', '%' . $searchQuery . '%')
                ->where('district', 'LIKE', '%' . $district . '%')
                ->where('sub_category_id',$sub_category)
                ->paginate(5);

            if(Auth::guard('user')->check()){
                $saved_search->user_id  = Auth::guard('user')->id();
            }else if(Auth::guard('admin')->check()){
                $saved_search->user_id  = Auth::guard('admin')->id();
            }else{
                $saved_search->user_id  = 0;
            }

                if($saved_search->save()){
                    return view('user.search_results',['services'=>$results]);
                }

        }else{
            flash('Searh fields you provided are empty')->error();
            return route(back());
        }
    }*/

}
