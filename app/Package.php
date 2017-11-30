<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
  public function packages_to_user(){
      return $this->belongsToMany('App\User','package_subscriptions');
  }
}
