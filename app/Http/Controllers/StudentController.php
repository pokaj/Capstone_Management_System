<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
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

    public function index(){
        if(Auth::user()->category == 'student'){

            return view('student_dashboard');
        }
    }

    public function student_topics(){

        if(Auth::user()->category == 'student'){

            return view('student_topics');
        }
    }

    public function student_profile(){

        if(Auth::user()->category == 'student'){

            return view('student_profile');
        }
    }

    public function student_milestones(){

        if(Auth::user()->category == 'student'){

            return view('student_milestones');
        }
    }




}
