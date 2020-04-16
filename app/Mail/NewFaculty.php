<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;

class NewFaculty extends Mailable
{
    use Queueable, SerializesModels;
    public $first, $last, $email, $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first,$last,$email,$password)
    {
        $this->first = $first;
        $this->last = $last;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('donotreply@capstonemanagementsystem.com')
        ->markdown('emails.newFaculty')
            ->with([
                'first' => $this->first,
                'last ' => $this->last,
                'email' => $this->email,
                'password' => $this->password,

            ]);
    }
}
