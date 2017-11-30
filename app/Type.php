<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    public function services()
    {
        return $this->hasMany('App\Service');
    }

    public function company()
    {
        return $this->hasMany('App\Company');
    }
}
