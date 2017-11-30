<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsLetterMailer extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */

  public $newsLetter;

  public function __construct($newsLetter)
  {
      $this->newsLetter = $newsLetter;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
      return $this->view('emails.news_letter');
  }
}
