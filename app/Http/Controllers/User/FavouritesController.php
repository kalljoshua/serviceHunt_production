<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class FavouritesController extends Controller
{
    //
    public function myFavourites($user_id)
    {
      # code...
      $favorites = User::find($user_id)->user_favorites()->paginate(5);
      //return $favorites;
        return view('user.myfavourites')->with('services',$favorites);
      //return view("user.myfavourites");
    }
}
