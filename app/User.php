<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user';

  public function services()
  {
      return $this->hasMany('App\Service');
  }

    public function company()
    {
        return $this->hasMany('App\Company','user_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment','user_id');
    }


    public function user_favorites(){
      return $this->belongsToMany('App\Service','favourites');
  }

  public function user_archived(){
      return $this->belongsToMany('App\Company','archiveds');
  }

  public function user_package(){
      return $this->belongsToMany('App\Package','package_subscriptions');
  }
}
