<?php

namespace App\Http\Controllers;
use App\Casptone_Table;
use App\User;
use Auth;
use App\Project;
use App\Faculty;
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

            $users = DB::table('project')
                ->where('project_user',  '=', Auth::user()->userId)
                ->where('status','=','pending')
                ->get();

            $facultyProjects = DB::table('project')
                ->join('faculty','faculty_id','=','project.project_user')
                ->join('users','userId','=','faculty.faculty_id')
                ->where('status','!=','taken')
                ->select('users.*','project.*')
                ->get();


            $facultyDropdown = DB::table('users')
                ->join('faculty','faculty_Id','=','users.userId')
                ->select('users.*')
                ->get();

            $approvedProjects = DB::table('capstone_table')
                ->join('project','project_Id','=','cp_project')
                ->join('users','userId','=','cp_supervisor')
                ->where('cp_student','=',Auth::user()->userId)
                ->get();

            $count = count($facultyProjects);
            $usersProjects = count($users);

            return view('student_topics' ,compact('users','facultyProjects','facultyDropdown',
                'approvedProjects','count','usersProjects'));
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

//    public function projectDetails(){
//        $details = Project::all();
//        return $details;
//    }

}
