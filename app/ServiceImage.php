<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    //
    protected $fillable = array('image');

    public function services(){
        return $this->belongsTo('App\Service');
    }
}
