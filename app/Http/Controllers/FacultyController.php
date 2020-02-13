<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;
use Illuminate\Support\Facades\DB;

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

            return view('dashboard');
        }
        return view('student_dashboard');;
    }

    public function profile()
    {
        if (Auth::user()->category == 'faculty') {

            return view('profile');
        }
        return view('student_profile');
    }

    public function students()
    {
        if (Auth::user()->category == 'faculty') {

            return view('students');
        }

    }

    public function topics()
    {
        if (Auth::user()->category == 'faculty') {

            return view('topics');
        }
    }

    public function milestones()
    {
        if (Auth::user()->category == 'faculty') {

            return view('milestones');
        }
    }

    public function viewProject($id){
        if(Auth::user()->category == 'faculty'){
            $data['id'] = $id;

            $users = DB::table('users')
                ->join('project','project.project_user','=','users.userId')
                ->where('project.project_Id', '=', $data['id'])
                ->select('users.first_name','users.last_name', 'project.*')
                ->get();

//            return $users;
            return view('viewProject')->with('users',$users);
        }
    }


}
