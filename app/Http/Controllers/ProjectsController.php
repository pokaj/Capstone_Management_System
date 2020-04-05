<?php

namespace App\Http\Controllers;

use App\Casptone_Table;
use App\Notifications\AppliedForProject;
use App\Pending_Request;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Project;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use function MongoDB\BSON\toJSON;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultyID = Auth::user()->userId;
        if (Auth::user()->category == 'faculty') {
            $faculty_projects = DB::table('users')
                ->join('project', 'project.project_user', '=', 'users.userId')
                ->where('project.project_user', '=', $facultyID)
                ->select('users.first_name', 'users.last_name', 'project.*')
                ->get();

        }
        $users = DB::table('users')
            ->join('project', 'project.project_user', '=', 'users.userId')
            ->select('users.first_name', 'users.last_name', 'project.*')
            ->get();

        $studentProjects=  DB::table('Project')
            ->join('faculty_student','faculty_student.project_Id','=','project.project_Id')
            ->join('users','userId','=','faculty_student.student_Id')
            ->where('faculty_student.faculty_Id','=',Auth::user()->userId)
            ->where('project.status','=','pending')
            ->get();

        $proposedCount = count($studentProjects);

        $showapplied = DB::table('pending_request')
            ->join('users','userId','=','student_Id')
            ->join('project','project.project_Id','=','pending_request.project_Id')
            ->where('pending_request.faculty_id','=',Auth::user()->userId)
            ->where('pending_request.status','=','pending')
            ->select('users.*','project.*')
            ->get();

        $pendingCount = count($showapplied);

        return View('topics', compact('users', 'faculty_projects',
            'studentProjects','proposedCount','showapplied','pendingCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

//    Function for both students and faculty members to create projects
    public function store(Request $request)
    {
        $project = new Project;
        $date = now();
        $project->project_user = Auth::user()->userId;
        $project->project_date = $date;
        $project->project_title = $request->project_title;
        $project->project_field = $request->project_field;
        $project->project_type = $request->project_type;
        $project->project_desc = $request->project_description;
        $project->status = 'pending';
        $project->save();

        return redirect()->back()
            ->with('message', 'Project created successfully ');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

// Function for faculty members to visit projects of students they supervise.
    public function go_to_project($id)
    {
        if (Auth::user()->category == 'faculty') {
            $users = DB::table('project')
                ->join('capstone_table','cp_project','=','project_Id')
                ->join('users','userId','=','cp_student')
                ->join('student','student_user_id','=','capstone_table.cp_student')
                ->join('major','major_Id','=','student.student_major')
                ->where('project_Id','=',$id)
                ->get();

            $meetingInfo = DB::table('meetings')
                ->join('person_meeting','person_meeting.mt_id','=','meetings.mt_id')
                ->where('mt_supervisor','=', Auth::user()->userId)
                ->where('mt_project','=',$id)
                ->orderBy('person_meeting.mt_id', 'DESC')
                ->get();

            $last = DB::table('person_meeting')
                ->join('meetings','person_meeting.mt_id','=','meetings.mt_id')
                ->where('mt_supervisor','=', Auth::user()->userId)
                ->where('mt_project','=',$id)
                ->orderBy('person_meeting.mt_id', 'DESC')->first();

            return view('viewProject', compact('users','meetingInfo','last'));
        }
    }

// Function for students to view projects proposed by faculty members
    public function view_faculty_Projects()
    {
        $facultyID = Auth::user()->userId;
        if (Auth::user()->category == 'faculty') {
            $faculty_projects = DB::table('users')
                ->join('project', 'project.project_user', '=', 'users.userId')
                ->where('project.project_user', '=', $facultyID)
                ->select('users.first_name', 'users.last_name', 'project.*')
                ->get();
            return $faculty_projects;
        }
    }

//    Function for students to select their preferred supervisors.
    public function select_supervisor(Request $request)
    {
        DB::table('faculty_student')
            ->insert(array(
                'student_id' => Auth::user()->userId,
                'faculty_Id' => $request->input('super_one'),
                'project_Id' => $request->input('project'),
                'status' => 'picked',
            ));

        DB::table('faculty_student')
            ->insert(array(
                'student_id' => Auth::user()->userId,
                'faculty_Id' => $request->input('super_two'),
                'project_Id' => $request->input('project'),
                'status' => 'picked',
            ));

        DB::table('faculty_student')
            ->insert(array(
                'student_id' => Auth::user()->userId,
                'faculty_Id' => $request->input('super_three'),
                'project_Id' => $request->input('project'),
                'status' => 'picked',
            ));

        return redirect()->back()
            ->with('message', 'Preferred supervisors selected');
    }

//    REVIEW
    public function supervisor_requests()
    {
        $requests = DB::table('project')
            ->join('faculty_student', 'faculty_Id', '=', Auth::user()->userId)
            ->get();

        return $requests;
    }

//   Function for both students and faculty members to delete their projects
    public function deleteproject($id)
    {
        $project = Project::find($id);
        $project->delete();

        if (Auth::user()->category == 'student') {
            return redirect('/studentTopics')->with('message', 'Project deleted successfully');
        } else {
            return redirect('/topics')->with('message', 'Project deleted successfully');
        }
    }

//    Function for faculty members to accept the supervisory role when chosen by students.
    public function acceptProject($id){
        $projectDetails = Project::find($id);
        $capstone = new Casptone_Table;
        $studentID = $projectDetails->project_user;
        $facultyID = Auth::user()->userId;
        $capstone->cp_supervisor = $facultyID;
        $capstone->cp_student = $studentID;
        $capstone->cp_project = $id;
        $capstone->cp_startdate = now();

        DB::table('faculty_student')
            ->where('student_Id', $studentID)
            ->where('faculty_Id',$facultyID)
            ->where('project_Id', $id)
            ->update(array(
                'status' => 'matched',
            ));

        DB::table('faculty_student')
            ->where('project_Id','=',$id)
            ->where('faculty_Id','!=',$facultyID)
            ->update(array(
                'status' => 'unmatched',
            ));


        DB::table('project')
            ->where('project_Id','=',$id)
            ->update(array(
                'status' => 'taken'
            ));


        $capstone->save();
        return redirect()->back()->with('message','New student added!');

    }

//    Function for students to apply for projects proposed by faculty members.
    public function apply($id){
        $find = Project::find($id);
        $studentID = Auth::user()->userId;
        $facultyID = $find->project_user;
        $random =  User::find($facultyID);
        $random->notify(new AppliedForProject());

        DB::table('pending_request')
            ->insert(array(
                'faculty_Id' => $facultyID,
                'student_Id' => $studentID,
                'project_Id' => $id,
                'status' => 'pending',
            ));

       return redirect()->back()->with('message','You have just applied for a project!');
    }

//    Function for faculty member to accept a student to work on his proposed topic
    public function acceptProposal($project_ID,$student_ID){

        DB::table('capstone_table')
            ->insert(array(
                'cp_supervisor' => Auth::user()->userId,
                'cp_Student' => $student_ID,
                'cp_project' => $project_ID,
                'cp_startdate' => now(),
            ));

        DB::table('pending_request')
            ->where('faculty_Id', Auth::user()->userId)
            ->where('student_Id',$student_ID)
            ->where('project_Id', $project_ID)
            ->update(array(
                'status' => 'accepted',
            ));

        DB::table('pending_request')
            ->where('project_Id', '=', $project_ID)
            ->where('student_Id', '!=', $student_ID)
            ->update(array(
                'status' => 'declined'
            ));

        DB::table('project')
            ->where('project_Id','=',$project_ID)
            ->update(array(
                'status' => 'taken'
            ));

        DB::table('faculty')
            ->where('faculty_Id','=',Auth::user()->userId)
            ->increment('number_of_students', 1);

        return redirect()->back()->with('message','New student added!');
    }

}
