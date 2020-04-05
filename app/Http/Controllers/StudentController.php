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

            $approvedProjects = DB::table('capstone_table')
                ->join('project','project_Id','=','cp_project')
                ->where('cp_student','=',Auth::user()->userId)
                ->select('project_title','project_type')
                ->get();

            $count = count($approvedProjects);

            return view('student_dashboard',compact('approvedProjects','count'));
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


            $facultyDropdown = DB::select( DB::raw("SELECT * FROM users,faculty,department WHERE
                        users.userId = faculty.faculty_Id AND faculty.faculty_dept = department.department_Id AND
                        faculty.number_of_students < department.student_limit"));


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

            $studentData = DB::table('users')
                ->join('student','student_user_id','=','userId')
                ->join('major','major_Id','=','student_major')
                ->where('userId','=',Auth::user()->userId)
                ->get();

            $dummydata = DB::table('users')
                ->join('student','student_user_id','=','userId')
                ->where('userId','=',Auth::user()->userId)
                ->get();

            $majorDropdown = DB::table('major')
                ->get();

            return view('student_profile' ,compact('studentData','majorDropdown','dummydata'));

        }
    }

    public function myProject(){

        if(Auth::user()->category == 'student'){

            $projectDetails = DB::table('capstone_table')
                ->join('users','userId','=','cp_supervisor')
                ->join('project','project_Id','=','cp_project')
                ->where('cp_student','=',Auth::user()->userId)
                ->get();

            $meetingInfo = DB::table('meetings')
                ->join('person_meeting','person_meeting.mt_id','=','meetings.mt_id')
                ->where('mt_student','=', Auth::user()->userId)
                ->orderBy('person_meeting.mt_id', 'DESC')
                ->get();

            $nextMeeting = DB::table('meetings')
                ->join('person_meeting','person_meeting.mt_id','=','meetings.mt_id')
                ->where('mt_student','=', Auth::user()->userId)
                ->orderBy('person_meeting.mt_id', 'DESC')
                ->first();

            return view('myProject',compact('projectDetails','meetingInfo','nextMeeting'));

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


    public function complete(Request $request){

        $validatedData = $request->validate([
            'student_Id' => 'required|max:255|unique:student',
        ],
            [
                'student_Id.unique'=>'The student ID you entered belongs to another student',
            ]);


        DB::table('student')
            ->where('student_user_id', Auth::user()->userId)
            ->update(array(
                'student_Id' => $validatedData['student_Id'],
                'student_yeargroup' => $request->input('yearGroup'),
                'student_major' => $request->input('major'),

            ));

        return redirect()->back()
            ->with('message','Profile Completed');

    }


    public function viewFaculty(Request $request){
        $name = $request->get('search');
        $output = "";

        $facultyDropdown = DB::table('users')
            ->join('faculty','faculty_Id','=','users.userId')
            ->join('department','department_Id','=','faculty_dept')
            ->where('users.first_name','LIKE','%'.$name.'%')
            ->orWhere('users.last_name','LIKE','%'.$name.'%')
            ->get();

        if($facultyDropdown){
            foreach ($facultyDropdown as $faculty){
                $output.= '<tr>'.
                    '<td>'. $faculty->first_name.' '.' '.$faculty->last_name.'</td>'.
                    '<td>'.$faculty->department_name.'</td>'.
                    '</tr>';
            }
            return Response($output);

        }

//        return ['success' => true, 'data' => $facultyDropdown];
    }





}
