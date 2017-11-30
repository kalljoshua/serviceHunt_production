<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = ['title', 'user_id', 'company_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\SubCategory','sub_category_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function favorites_to_user(){
        return $this->belongsToMany('App\User','favourites');
    }


    public function images(){
        return $this->hasMany('App\ServiceImage');
    }


}
