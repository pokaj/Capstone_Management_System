<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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

            $depts = DB::table('department')->get();

            return view('profile' ,compact('depts'));
        }
        return view('student_profile');
    }


    public function students()
    {
        if (Auth::user()->category == 'faculty') {

            $projectDetails = DB::table('capstone_table')
                ->join('project','project_Id','=','cp_project')
                ->join('users','userId','=','project_user')
                ->where('cp_supervisor','=',Auth::user()->userId)
                ->get();


            return view('students',compact('projectDetails'));
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

//    public function viewFacultyInterests(){
//        if(Auth::user()->category == 'faculty'){
//            $faculty_interests = DB::table('users')
//                ->join('faculty','faculty.faculty_Id','=','users.userId')
//                ->where('faculty.faculty_Id','=', Auth::user()->userId)
//                ->select('users.first_name','users.last_name','faculty.*')
//                ->get();
//
//            return view('profile')->with('faculty_interests',$faculty_interests);
//
//        }
//    }

//    Function to update faculty information
        public function update(Request $request){

            $updatefaculty = User::where('userId',Auth::user()->userId)
                ->update([
                    'first_name' => $request->input('fname'),
                    'last_name' => $request->input('lname'),
                    'username' => $request->input('username'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                ]);

            DB::table('faculty')
                ->where('faculty_Id', Auth::user()->userId)
                ->update(array(
                    'faculty_dept' => $request->input('department'),
                    'faculty_interests' => $request->input('interests')
                ));


            return redirect()->back()
                ->with('message','Profile successfully updated')
                ->with('$updatefaculty',$updatefaculty);
        }

}
