<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $reminder;
    public $student;
    public $supervisor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($student, $reminder, $supervisor)
    {
        $this->student = $student;
        $this->reminder = $reminder;
        $this->supervisor = $supervisor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = User::find($this->supervisor)->email;
        $username = User::find($this->student)->username;
        $first_name = User::find($this->supervisor)->first_name;
        $last_name = User::find($this->supervisor)->last_name;


        return $this->from($from)
            ->markdown('emails.reminder')
            ->with([
                'reminder' => $this->reminder,
                'username' => $username,
                'first' => $first_name,
                'last' => $last_name
            ]);
    }
}
