<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLetterMail extends Model
{
    //
    public function subscribers(){
      return $this->belongsToMany('App\NewsLetter','news_letter_logs');
    }
}
