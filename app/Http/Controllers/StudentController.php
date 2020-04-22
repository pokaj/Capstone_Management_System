<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $approvedProjects = DB::table('capstone_table')
                ->join('project','project_Id','=','cp_project')
                ->where('cp_student','=',Auth::user()->userId)
                ->select('project_title','project_type')
                ->get();

            $meetingDetails = DB::table('meetings')
                ->join('person_meeting','meetings.mt_id','=','person_meeting.mt_id')
                ->where('mt_student','=',Auth::user()->userId)
                ->orderBy('person_meeting.mt_id', 'DESC')
                ->first();


            $count = count($approvedProjects);

            return view('student/student_dashboard',compact('approvedProjects','meetingDetails','count'));
        }


    public function student_topics(){

            $users = DB::table('project')
                ->where('project_user',  '=', Auth::user()->userId)
                ->where('status','=','pending')
                ->get();

            $facultyProjects = DB::table('project')
                ->join('faculty','faculty_id','=','project.project_user')
                ->join('users','userId','=','faculty.faculty_id')
                ->where('status','!=','taken')
//                ->select('users.*','project.*')
                ->get();


            $facultyDropdown = DB::select( DB::raw("SELECT * FROM users,faculty,department WHERE
                        users.userId = faculty.faculty_Id AND faculty.faculty_dept = department.department_Id AND
                        faculty.number_of_students < department.student_limit"));


            $approvedProjects = DB::table('capstone_table')
                ->join('project','project_Id','=','cp_project')
                ->join('users','userId','=','cp_supervisor')
                ->where('cp_student','=',Auth::user()->userId)
                ->get();

            $selected = DB::table('faculty_student')
                ->join('faculty','faculty.faculty_Id','=','faculty_student.faculty_Id')
                ->join('users','userId','=','faculty.faculty_Id')
                ->join('department','department_Id','=','faculty_dept')
                ->where('student_Id','=',Auth::user()->userId)
                ->where('status','=','picked')
                ->get();


              $facultydets = DB::table('users')
            ->join('faculty','faculty_Id','=','users.userId')
            ->join('department','department_Id','=','faculty_dept')
            ->paginate(5);

            $count = count($facultyProjects);
            $usersProjects = count($users);

            return view('student/student_topics' ,compact('users','facultyProjects','facultyDropdown',
                'approvedProjects','count','usersProjects','selected','facultydets'));
        }


    public function student_profile(){

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

            return view('student/student_profile' ,compact('studentData','majorDropdown','dummydata'));

        }


    public function myProject(){

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

            return view('student/myProject',compact('projectDetails','meetingInfo','nextMeeting'));

        }


    //    Function to update student information
    public function update(Request $request){

        $updatefaculty = DB::table('users')
        ->where('userId','=',Auth::user()->userId)
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
                'interests' => $request->input('interests'),

            ));

        return redirect()->back()
            ->with('message','Profile successfully updated')
            ->with('$updatefaculty',$updatefaculty);
    }


    public function complete(Request $request){

        $validatedData = $request->validate([
            'student_Id' => 'required|max:8|unique:student|min:8',
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048'

        ],
            [
                'student_Id.unique'=>'The student ID you entered belongs to another student',
                'student_Id.min' => 'Please check your student Id',
                'student_Id.max' => 'Please check your student Id',
            ]);
        $image = $request->file( 'picture');
        $image_name = $image->getClientOriginalName();

        DB::table('users')
            ->where('userId','=',Auth::user()->userId)
            ->update([
                'image' => $image_name,
            ]);

        $image->move(public_path("images"),$image_name);


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


//    public function viewFaculty(Request $request){
//        $name = $request->get('search');
//
//        $facultyDropdown = DB::table('users')
//            ->join('faculty','faculty_Id','=','users.userId')
//            ->join('department','department_Id','=','faculty_dept')
//            ->where('users.first_name','LIKE','%'.$name.'%')
//            ->orWhere('users.last_name','LIKE','%'.$name.'%')
//            ->paginate(5);
//
//        return ['success' => true, 'data' => $facultyDropdown];
//    }

    public function viewFaculty(Request $request){
        $output='';
        $name = $request->get('search');

        $facultyDropdown = DB::table('users')
            ->join('faculty','faculty_Id','=','users.userId')
            ->join('department','department_Id','=','faculty_dept')
            ->where('users.first_name','LIKE','%'.$name.'%')
            ->orWhere('users.last_name','LIKE','%'.$name.'%')
            ->paginate(5);

        if($facultyDropdown){
            foreach ($facultyDropdown as $faculty){
                $output.= '<tr>'.
                    '<td>'. $faculty->first_name.' '.' '.$faculty->last_name.'</td>'.
                    '<td>'.$faculty->department_name.'</td>'.
                    '<td><a href=""  class="nav-link" data-toggle="modal" data-target='."#$faculty->first_name$faculty->last_name$faculty->faculty_Id".'><i class="fas fa-eye text-muted"></i></a></td>'.
                    '</tr>'

//                <!-- beginning of modal to view faculty details-->
                                        .'<div class="modal fade" id='."$faculty->first_name$faculty->last_name$faculty->faculty_Id".'>'
                                            .'<div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p class="modal-title font-weight-bold">'
                                                            .'<strong>'."$faculty->first_name $faculty->last_name".'</strong>
                                                        </p><br>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body align-content-center">'
                                                    .'<img src="images/'."$faculty->image".'">'
                                                    .'</div>
                                                </div>
                                            </div>
                                        </div>';
//                                        <!-- end of modal to view faculty details-->
            }
            return Response($output);

        }
    }

    public function faculty_details(Request $request){
        if($request->ajax()){
            $facultydets = DB::table('users')
                ->join('faculty','faculty_Id','=','users.userId')
                ->join('department','department_Id','=','faculty_dept')
                ->paginate(5);

            return view('student/faculty_details', compact('facultydets'))->render();
        }
    }



    public function student_project_feedback(){
        $feedback = DB::table('feedback')
            ->join('faculty','faculty.faculty_Id','=','feedback.faculty_Id')
            ->join('department','department_Id','=','faculty.faculty_dept')
            ->join('users','userId','=','faculty.faculty_Id')
            ->where('feedback.student_Id','=',Auth::user()->userId)
            ->get();
//        return $feedback;
        return view('student/projectFeedback',compact('feedback'));
    }





}
