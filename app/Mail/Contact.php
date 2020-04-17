<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class Contact extends Mailable
{
    use Queueable, SerializesModels;
    public $faculty,$subject,$message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($faculty,$subject,$message)
    {
        $this->faculty = $faculty;
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
        $from = User::find($this->faculty)->email;
        $first = User::find($this->faculty)->first_name;
        $last = User::find($this->faculty)->last_name;
        return $this->from($from)
        ->markdown('emails.Contact')
            ->with([
               'first'=>$first,
               'last' => $last,
                'subject' => $this->subject,
                'message' => $this->message
            ]);
    }
}
