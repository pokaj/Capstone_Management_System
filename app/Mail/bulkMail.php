<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Auth;

class bulkMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject,$message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$message)
    {
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $first_name = User::find(Auth::user()->first_name);
        $last_name = user::find(Auth::user()->last_name);
        return $this->from(Auth::user()->email)
            ->markdown('emails.bulkMail')
            ->with([
                'subject' => $this->subject,
                'message' => $this->message,
            ]);
    }
}
