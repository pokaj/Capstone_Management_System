<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectAccepted extends Mailable
{
    use Queueable, SerializesModels;
    public $studentID, $facultyID;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($studentID,$facultyID)
    {
        $this->studentID = $studentID;
        $this->facultyID = $facultyID;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = User::find($this->facultyID)->email;
        $student = User::find($this->studentID)->username;
        $first = User::find($this->facultyID)->first_name;
        $last = User::find($this->facultyID)->last_name;

        return $this->from($from)
        ->markdown('emails.projectAccepted')
            ->with([
                'student'=>$student,
                'first'=>$first,
                'last'=>$last
            ]);
    }
}
