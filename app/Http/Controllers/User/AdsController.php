<?php

namespace App\Http\Controllers\User;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Review;
use App\Service;

class AdsController extends Controller
{
  //
  
  function adsDetails(Request $request, $id){
    return "what the fuck is going on";
    $service = Service::find($id);
    $service->increment('views');
      $reviews = Review::where('company_id',$company->id);
      return $reviews->user;
    //return $service;
    return view('user.ads_details')->with('service',$service);
  }
}
