<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Mail\Contact;
use App\Mail\ReminderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Meeting;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->category == 'faculty') {


            $studentProjects=  DB::table('Project')
                ->join('faculty_student','faculty_student.project_Id','=','project.project_Id')
                ->join('users','userId','=','faculty_student.student_Id')
                ->where('faculty_student.faculty_Id','=',Auth::user()->userId)
                ->where('project.status','=','pending')
                ->get();

            $showapplied = DB::table('pending_request')
                ->join('users','userId','=','student_Id')
                ->join('project','project.project_Id','=','pending_request.project_Id')
                ->where('pending_request.faculty_id','=',Auth::user()->userId)
                ->where('pending_request.status','=','pending')
                ->select('users.*','project.*')
                ->get();

            $projectDetails = DB::table('capstone_table')
                ->join('users','userId','=','cp_student')
                ->join('project','project_Id','=','cp_project')
                ->where('cp_supervisor','=',Auth::user()->userId)
                ->get();

            $totalSupervisedStudents = count($projectDetails);


            $pendingCount = count($showapplied);
            $proposedCount = count($studentProjects);
            $totalPending = $pendingCount + $proposedCount ;




            return view('faculty/faculty_dashboard', compact('totalPending','totalSupervisedStudents','projectDetails'));
        }
        return view('student/student_dashboard');;
    }


    public function profile()
    {
        if (Auth::user()->category == 'faculty') {

            $interests = DB::table('users')
                ->join('faculty','faculty_Id','=','userId')
                ->where('faculty_Id','=',Auth::user()->userId)
                ->get();

            $depart = DB::table('department')
                ->join('faculty','faculty_dept','=','department_Id')
                ->where('faculty_Id','=',Auth::user()->userId)
                ->get();

            $depts = DB::table('department')->get();

            return view('faculty/faculty_profile' ,compact('depts','interests','depart'));
        }
        return view('student_profile');
    }


    public function students()
    {
            $projectDetails = DB::table('capstone_table')
                ->join('users','userId','=','cp_student')
                ->join('project','project_Id','=','cp_project')
                ->where('cp_supervisor','=',Auth::user()->userId)
                ->get();


            return view('faculty/students',compact('projectDetails'));
        }

    public function topics()
    {
            return view('faculty/topics');
        }


    public function milestones()
    {
            return view('faculty/milestones');
        }

//    Function to update faculty information
        public function update(Request $request){

           DB::table('users')
            ->where('userId','=',Auth::user()->userId)
                ->update([
                    'first_name' => $request->input('fname'),
                    'last_name' => $request->input('lname'),
                    'username' => $request->input('username'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                ]);

            DB::table('faculty')
                ->where('faculty_Id','=', Auth::user()->userId)
                ->update(array(
                    'faculty_dept' => $request->input('department'),
                    'faculty_interests' => $request->input('interests')
                ));

            return redirect()->back()
                ->with('message','Profile successfully updated');
        }

        public function createMeeting(Request $request){


            $meeting = new Meeting;
            $meeting->mt_date = now();
            $meeting->mt_project = $request->projectID;
            $meeting->mt_supervisor = Auth::user()->userId;
            $meeting->mt_student = $request->studentID;
            $meeting->save();

            DB::table('person_meeting')
                ->insert(array(
                    'mt_id' => $meeting->mt_id,
                    'mt_date' => now(),
                    'mt_objective' => $request->currentObj,
                    'mt_challenges' => $request->problems,
                    'mt_sumofprogress' => $request->progress,
                    'mt_objnxtperiod' => $request->nextObj,
                    'mt_nextDate' => $request->nextDate,
                ));

            return redirect()->back()
                ->with('message','Meeting closed!');
        }


    public function searchMeeting(Request $request)
    {

        $meetingInformation = DB::table('person_meeting')
            ->where('mt_id', '=', $request->get('inputVal'))
            ->get();

        return ['success' => true, 'data' => $meetingInformation];

    }

    public function reminder(Request $request){
        $reminder = $request->post('date');
        $student = $request->post('student');
        $supervisor = Auth::user()->userId;

        $send = Mail::to(User::find($student))->send(new ReminderMail($student, $reminder, $supervisor));

            return ['success' => true, 'data' =>$send ];


    }   public function contact(Request $request){
        $faculty = Auth::user()->userId;
        Mail::to($request->mail)->send(new Contact($faculty,$request->subject, $request->message));
            return redirect()->back()->with('message','Mail sent');

    }

    public function feedback(){
        $details = DB::table('student')
            ->join('users','userId','=','student_user_id')
            ->join('capstone_table','cp_student','=','student_user_id')
            ->join('project','project_Id','=','cp_project')
            ->get();

        return view('faculty/feedback',compact('details'));
    }

    public function send_feedback(Request $request){
            $feedback = new Feedback;
            $feedback->faculty_Id = Auth::user()->userId;
            $feedback->student_Id = $request->get('studentID');
            $feedback->date = now();
            $feedback->comments = $request->get('feedback');
            $feedback->save();

            return ['success' => true, 'data' => 1];

    }

    public function upload_image(Request $request){
        $this->validate($request,[
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file( 'picture');
        $image_name = $image->getClientOriginalName();
        DB::table('users')
            ->where('userId','=',Auth::user()->userId)
            ->update([
                'image' => $image_name,
            ]);
        $image->move(public_path("images"),$image_name);
        return back()
            ->with('message','Image uploaded successfully');
    }




}
