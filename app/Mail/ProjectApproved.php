<?php

namespace App\Mail;

use App\Project;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectApproved extends Mailable
{
    use Queueable, SerializesModels;
    public $student_ID, $faculty_ID, $project_ID;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($student_ID,$faculty_ID,$project_ID)
    {
        $this->student_ID = $student_ID;
        $this->faculty_ID = $faculty_ID;
        $this->project_ID = $project_ID;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $student = User::find($this->student_ID)->username;
        $first = User::find($this->faculty_ID)->first_name;
        $last = User::find($this->faculty_ID)->last_name;
        $project = Project::find($this->project_ID)->project_title;
        return $this->from('donotreply@capstonemanagementsystem.com')
        ->markdown('emails.ProjectApproved')
            ->with([
               'student_username' => $student,
               'faculty_firstname' => $first,
               'faculty_lastname' => $last,
               'project_title' => $project
            ]);
    }
}
