<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Company;
use App\Review;
use App\Service;
use App\SavedSearch;



class HomeController extends Controller
{
  //
  public function index()
  {
    //$companies = Company::all();
    $categories = Category::take(8)->get();
    $searches = SavedSearch::orderBy('created_at','DESC')->take(6)->get();
    $featured_services = Company::where('featured',1)->where('active',1)->orderBy('created_at','DESC')->get();
    $most_viewed_services = Company::where('active',1)->orderBy('views','DESC')->get();
    $recent_services = Company::where('active',1)->orderBy('created_at','DESC')->get();
    //return $categories;
    return view('user.index')
    ->with('categories',$categories)
    ->with('featured_services',$featured_services)
    ->with('most_viewed_services',$most_viewed_services)
    ->with('recent_services',$recent_services)
    ->with('searches',$searches);
  }

  function adsDetails(Request $request, $id){
    $service = Service::find($id);
    $service->increment('views');
    //return $service;
    return view('user.ads_details')->with('service',$service);
  }

      function privacy(){
          return view('user.privacy');
      }

      function contact(){
          return view('user.contact');
      }

      function about(){
          return view('user.about');
      }

      function personalsafety(){
          return view('user.personalsafety');
      }

      function disclaimer(){
          return view('user.disclaimer');
      }

      function termsofUse(){
          return view('user.termsAndConditions');
      }

}
