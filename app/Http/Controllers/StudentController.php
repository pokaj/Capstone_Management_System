<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            $majors = DB::table('major')->get();

            return view('student_profile' ,compact('majors'));

        }
    }

    public function student_milestones(){

        if(Auth::user()->category == 'student'){

            return view('student_milestones');
        }
    }

    //    Function to update student information
    public function update(Request $request){

        $updatefaculty = User::where('userId',Auth::user()->userId)
            ->update([
                'first_name' => $request->input('fname'),
                'last_name' => $request->input('lname'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),


            ]);

        DB::table('student')
            ->where('student_user_id', Auth::user()->userId)
            ->update(array(
                'student_Id' => $request->input('id'),
                'student_yeargroup' => $request->input('yearGroup'),
                'student_major' => $request->input('major'),

            ));

        return redirect()->back()
            ->with('message','Profile successfully updated')
            ->with('$updatefaculty',$updatefaculty);
    }

}
