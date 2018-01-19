<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    //
    public function newsLetters(){
    return $this->belongsToMany('App\NewsLetterMail','news_letter_logs');
  }
}
