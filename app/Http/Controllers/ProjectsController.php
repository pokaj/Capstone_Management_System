<?php

namespace App\Http\Controllers;

use App\Casptone_Table;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Project;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

//        code to show projects to faculty chosen by student
        $studentProjects = DB::table('project')
            ->join('faculty_student', 'student_Id', '=', 'project_user')
            ->join('users','userId','=','student_Id')
            ->where('faculty_Id', '=', Auth::user()->userId)
            ->get();
        $count = count($studentProjects);

        return view('topics', compact('users', 'faculty_projects', 'studentProjects','count'));
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


    public function go_to_project($id)
    {
        if (Auth::user()->category == 'faculty') {
            $data['id'] = $id;
            $users = DB::table('users')
                ->join('project', 'project.project_user', '=', 'users.userId')
                ->where('project.project_Id', '=', $data['id'])
                ->select('users.first_name', 'users.last_name', 'project.*')
                ->get();

            return view('viewProject')->with('users', $users);
        }
    }

//review this
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

    public function addProject(Request $request)
    {
        $project = new Project;
        $date = now();
        $project->project_user = Auth::user()->userId;
        $project->project_date = $date;
        $project->project_title = $request->project_title;
        $project->project_type = $request->project_type;
        $project->project_field = $request->project_field;
        $project->project_desc = $request->project_desc;
        $project->save();

        return redirect()->back()
            ->with('message', 'Project created successfully');
    }


    public function select_supervisor(Request $request)
    {
        DB::table('faculty_student')
            ->insert(array(
                'student_id' => Auth::user()->userId,
                'faculty_Id' => $request->input('super_one'),
            ));

        DB::table('faculty_student')
            ->insert(array(
                'student_id' => Auth::user()->userId,
                'faculty_Id' => $request->input('super_two'),
            ));

        DB::table('faculty_student')
            ->insert(array(
                'student_id' => Auth::user()->userId,
                'faculty_Id' => $request->input('super_three'),
            ));

        return redirect()->back()
            ->with('message', 'Preferred supervisors selected');
    }

    public function supervisor_requests()
    {
        $requests = DB::table('project')
            ->join('faculty_student', 'faculty_Id', '=', Auth::user()->userId)
            ->get();

        return $requests;
    }
//
//    public function supervisor_requests(){
//        if(Auth::user()->category == 'faculty'){
//            $faculty_interests = DB::table('users')
//                ->join('faculty','faculty.faculty_Id','=','users.userId')
//                ->where('faculty.faculty_Id','=', Auth::user()->userId)
//                ->select('users.first_name','users.last_name','faculty.*')
//                ->get();
//
//            return $faculty_interests;
//
//        }
//    }


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

    public function acceptProject($id){
        $projectDetails = Project::find($id);
        $capstone = new Casptone_Table;
        $studentID = $projectDetails->project_user;
        $facultyID = Auth::user()->userId;
        $capstone->cp_supervisor = $facultyID;
        $capstone->cp_student = $studentID;
        $capstone->cp_project = $id;
        $capstone->cp_startdate = now();

//        DB::table('faculty_student')
//
//            ->where('faculty_Id','!=',$facultyID)
//            ->delete();
//dd($studentID);
dd($facultyID);
DB::table('faculty_student')
    ->where('student_Id', '!=', $studentID)
    ->where('faculty_Id','!=',$facultyID)
    ->delete();



//        $capstone->save();
//        return view('/students')->with('message','New student added!');
//        return redirect()->back()->with('message','New student added!');

    }

}
