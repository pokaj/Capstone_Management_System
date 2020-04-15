<?php

namespace App\Mail;

use App\Project;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppliedForProject extends Mailable
{
    use Queueable, SerializesModels;
    public $studentID;
    public $facultyID;
    public $project_ID;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($studentID,$facultyID, $project_ID)
    {
        $this->studentID = $studentID;
        $this->facultyID = $facultyID;
        $this->project_ID = $project_ID;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $project = Project::find($this->project_ID)->project_title;
        $faculty = User::find($this->facultyID)->username;
        $first = User::find($this->studentID)->first_name;
        $last = User::find($this->studentID)->last_name;

        return $this->from('donotreply@capstonemanagementsystem.com')
        ->markdown('emails.AppliedForProject')
            ->with([
                'project_title' => $project,
                'student_first_name' => $first,
                'student_last_name' => $last,
                'facutly_username' => $faculty
            ]);
    }
}
