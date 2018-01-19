<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

  public function services()
  {
      return $this->hasMany('App\Service');
  }

    public function requests()
    {
        return $this->hasMany('App\ServiceRequest');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\SubCategory','sub_category_id');
    }

    public function archived_to_user(){
        return $this->belongsToMany('App\User','archiveds');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function images(){
        return $this->hasMany('App\ServiceImage');
    }

}
