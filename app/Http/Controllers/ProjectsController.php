<?php

namespace App\Http\Controllers;

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
    public function index(){
        $facultyID = Auth::user()->userId;
        if(Auth::user()->category == 'faculty'){
            $faculty_projects = DB::table('users')
                ->join('project','project.project_user','=','users.userId')
                ->where('project.project_user','=',$facultyID)
                ->select('users.first_name','users.last_name','project.*')
                ->get();

        }
        $users = DB::table('users')
            ->join('project','project.project_user','=','users.userId')
            ->select('users.first_name','users.last_name', 'project.*')
            ->get();

//        return view('topics')->with('users',$users);
        return view('topics', compact('users','faculty_projects'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        print_r($request->input());
        $project = new Project;
        $date = now();
        $project->project_user = Auth::user()->userId;
        $project->project_date = $date;
        $project->project_title = $request->project_title;
        $project->project_field = $request->project_field;
        $project->project_type = $request->project_type;
        $project->project_desc = $request->project_description;
        $project->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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


    public function view_faculty_Projects(){
        $facultyID = Auth::user()->userId;
        if(Auth::user()->category == 'faculty'){
            $faculty_projects = DB::table('users')
                ->join('project','project.project_user','=','users.userId')
                ->where('project.project_user','=',$facultyID)
                ->select('users.first_name','users.last_name','project.*')
                ->get();

            return $faculty_projects;
        }
    }
}
