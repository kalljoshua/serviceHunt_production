<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newsletter;

class AdminNewsLetterSubscribersController extends Controller
{
    //
    function getSubscribers(){
      $subscribers = Newsletter::all();

      return view('admin.admin_subscribers_listings')
      ->with('subscribers',$subscribers);
    }
}
