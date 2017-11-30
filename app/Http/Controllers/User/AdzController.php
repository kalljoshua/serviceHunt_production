<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Service;

class AdsController extends Controller
{
  public function __construct()
  {
    $this->middleware('user');
  }
  //
  public function myAds(Request $request, $userId)
  {
    # code...
    if($userId != Auth::guard('user')->id()){
      flash('Please Login to view your Ads')->success();
      return redirect(route('user.login'));
    }else{
      $services = Service::where('user_id',$userId)->where('active', 1)->orderBy('id','DESC')->paginate(5);
      $user = User::find($userId);
      //return $services;
      return view('user.myadds')->with(['user'=>$user,'services'=>$services]);
    }
  }

  
}
