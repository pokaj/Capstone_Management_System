<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;
use App\Faculty;
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

    public function viewFacultyInterests(){
        if(Auth::user()->category == 'faculty'){
            $faculty_interests = DB::table('users')
                ->join('faculty','faculty.faculty_Id','=','users.userId')
                ->where('faculty.faculty_Id','=', Auth::user()->userId)
                ->select('users.first_name','users.last_name','faculty.*')
                ->get();

            return view('profile')->with('faculty_interests',$faculty_interests);

        }
    }
}
