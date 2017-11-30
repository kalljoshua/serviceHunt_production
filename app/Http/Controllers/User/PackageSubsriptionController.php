<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use App\PackageSubscription;
use Illuminate\Support\Facades\Auth;
use Input, Redirect;
use App\User;

class PackageSubsriptionController extends Controller
{
    public function showPackages()
    {
      $user = User::find(Auth::guard('user')->id());
      if($user->user_package->count()<0){
        flash('You are subscribed to '.$user->user_package->title.'package')->success();
        return redirect(route('user.profile'));
      }else{
      $packages = Package::all();
      return view('user.user_select_package')
      ->with('packages',$packages);
      }
    }

    public function addPackage(Request $request)
    {
      $subscription = new PackageSubscription();
      if(Input::has('package_id')) $subscription->package_id = Input::get('package_id');
      $subscription->user_id = Auth::guard('user')->id();
      $package = Package::find(Input::get('package_id'));

      if($subscription->save()){
        flash('Successfully subscribed to '.$package->title.'package')->success();
        return redirect(route('user.profile'));
      }else{
        flash('Package subscription failed')->danger();
        return redirect(route('user.profile'));
      }
    }
}
