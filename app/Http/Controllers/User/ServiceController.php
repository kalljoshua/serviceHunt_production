<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Company;
use App\Category;

class ServiceController extends Controller
{
    //
    public function getAll()
    {
      $services = Company::orderby('created_at','DESC')->paginate(5);
      return view("user.all_ads")->with('services',$services);
    }
    public function getCategory(Request $request, $id)
    {
      # code...
      $categories = Category::where('id',$id)->first();
      $services = Company::where('sub_category_id',$id)->where('active',1)->paginate(5);
      //return $services;
      return view("user.get_category")
      ->with('services',$services)
      ->with('categories',$categories);
    }

    public function adsDetails()
    {
      # code...
      return view("user.ads_details");
    }

    public function displayProfile(){
        return "going to display profile here";
    }
}
