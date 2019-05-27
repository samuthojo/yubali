<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VisitorEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $sender_name, $sender_email, $message, $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
      $this->sender_name = $email['name'];
      $this->sender_email = $email['email'];
      $this->message = $email['content'];
      $this->subject = "Tazara Mbeya Saccos - Visitor Email";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from($this->sender_email)
                  ->subject($this->subject)
                  ->markdown('emails.visitor.email');
    }
}
