<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Mail\NewFaculty;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class coordinatorController extends Controller
{
    public function index()
    {
        $faculty = DB::table('faculty')
            ->join('users','userId','=','faculty_Id')
            ->join('department','department_Id','=','faculty_dept')
            ->paginate(5);

        $supervised = DB::table('student')
            ->join('capstone_table','cp_student','=','student_user_id')
            ->join('project','project_Id','=','cp_project')
            ->join('users','userId','=','student_user_id')
            ->join('major','major_Id','=','student_major')
            ->paginate(5);


        $unsuper = DB::table('student')
            ->leftJoin('capstone_table','student.student_user_id','=','capstone_table.cp_student')
            ->join('users','userId','=','student.student_user_id')
            ->join('major','major_Id','=','student_major')
            ->where('capstone_table.cp_student','=',NULL)
            ->paginate(5);


        $supervisedCount = count(DB::table('student')
            ->join('capstone_table','cp_student','=','student_user_id')
            ->join('project','project_Id','=','cp_project')
            ->join('users','userId','=','student_user_id')
            ->join('major','major_Id','=','student_major')
            ->get());

        $facultyCount = count(DB::table('faculty')->get());

        $unsuperCount = count(DB::table('student')
            ->leftJoin('capstone_table','student.student_user_id','=','capstone_table.cp_student')
            ->join('users','userId','=','student.student_user_id')
            ->where('capstone_table.cp_student','=',NULL)
            ->get());

        return view('coordinator/super_dashboard', compact('faculty','unsuper','facultyCount','unsuperCount',
        'supervised','supervisedCount'));
    }

    public function fetch_data(Request $request){
        if($request->ajax()){
            $faculty = DB::table('faculty')
                ->join('users','userId','=','faculty_Id')
                ->join('department','department_Id','=','faculty_dept')
                ->paginate(5);

            return view('coordinator/faculty_pagination', compact('faculty'))->render();
        }
    }

    public function unsupervised_student(Request $request){
        if($request->ajax()){
            $unsuper = DB::table('student')
                ->leftJoin('capstone_table','student.student_user_id','=','capstone_table.cp_student')
                ->join('users','userId','=','student.student_user_id')
                ->join('major','major_Id','=','student_major')
                ->where('capstone_table.cp_student','=',NULL)
                ->paginate(5);

            return view('coordinator/unsupervised_students', compact('unsuper'))->render();


        }
    }

    public function supervised_students(Request $request){
        if($request->ajax()){
            $supervised = DB::table('student')
                ->join('capstone_table','cp_student','=','student_user_id')
                ->join('project','project_Id','=','cp_project')
                ->join('users','userId','=','student_user_id')
                ->join('major','major_Id','=','student_major')
                ->paginate(5);

            return view('coordinator/supervised_students', compact('supervised'))->render();
        }
    }

    public function addFaculty()
    {
        $dept = DB::table('department')->get();
        return view('coordinator/addFaculty', compact('dept'));
    }

    public function profile()
    {
        return view('coordinator/super_profile');
    }

    public function newFaculty(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required|alpha|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'dept' => 'required',
            'username' => 'required|max:255|alpha_dash|unique:users',
            'password' => 'required',

        ],
            [
                'fname.required' => 'The first name field is required',
                'fname.alpha' => 'First name field can only be text',
                'lname.required' => 'The Last name field is required',
            ]);

        $user = new User;
        $user->first_name = $validatedData['fname'];
        $user->last_name = $validatedData['lname'];
        $user->email = $validatedData['email'];
        $user->category = 'faculty';
        $user->user_role = 2;
        $user->username = $validatedData['username'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        $faculty = new Faculty;
        $faculty->faculty_Id = $user->userId;
        $faculty->faculty_dept = $request->dept;
        $faculty->number_of_students = 0;
        $faculty->save();

        Mail::to($user->email)->send(new NewFaculty($user->first_name,$user->last_name,$user->email,$validatedData['password']));

        return redirect()->back()
            ->with('message', 'New faculty member added');
    }




    public function manage_faculty(){
        $faculty_info = DB::table('users')
            ->join('faculty','faculty_Id','=','userId')
            ->join('department','department_Id','=','faculty_dept')
            ->paginate(5);

        return view('coordinator/manageFaculty',compact('faculty_info'));
    }

    public function searchFaculty(Request $request){
            $output = "";
            $faculty_data = DB::table('users')
                ->join('faculty','faculty_Id','=','userId')
                ->join('department','department_Id','=','faculty_dept')
                ->where('users.first_name','LIKE','%'.$request->get('search').'%')
//                ->orWhere('users.last_name','LIKE','%'.$request->get('search').'%')
                ->paginate(5);

            if($faculty_data){
                foreach ($faculty_data as $faculty){
                    $output.= '<tr>'.
                                '<td>'. $faculty->first_name.' '.' '.$faculty->last_name.'</td>'.
                                '<td>'.$faculty->department_name.'</td>'.
                                '<td>'.$faculty->number_of_students.'</td>'.
                                '<td><a href=""  class="nav-link" data-toggle="modal" data-target='."#viewFaculty".' onclick='."run($faculty->userId)".'><i class="fas fa-eye text-muted"></i></a></td>'.
                        '</tr>';
                }
                return Response($output);

            }

    }

    public function details(Request $request){
        $id = $request->get('facultyID');

        $capstone_details = DB::table('users')
            ->join('student','student_user_id','=','userId')
            ->join('capstone_table','cp_student','=','userId')
            ->join('project','project_Id','=','cp_project')
            ->where('cp_supervisor','=',$id)
            ->get();

        return ['success' => true, 'data' => $capstone_details];
    }

    public function limit(Request $request){
        $limit = $request->post('limit');

        $update = DB::table('department')->update(array('student_limit' => $limit));

        return ['success' => true, 'data' => $update];


    }

    public function search_faculty_dash(Request $request){
        $output='';
        $faculty = DB::table('faculty')
            ->join('users','userId','=','faculty_Id')
            ->join('department','department_Id','=','faculty_dept')
            ->where('users.first_name','LIKE','%'.$request->get('value').'%')
            ->orWhere('users.last_name','LIKE','%'.$request->get('value').'%')
            ->paginate(5);

        if($faculty){
            foreach ($faculty as $faculty){
                $output.= '<tr>'.
                    '<td>'. $faculty->first_name.' '.' '.$faculty->last_name.'</td>'.
                    '<td>'.$faculty->department_name.'</td>'.
                    '<td>'.$faculty->number_of_students.'</td>'.
                    '<td><a href=""  class="nav-link" data-toggle="modal" data-target='."#$faculty->faculty_Id".'><i class="fas fa-envelope text-muted"></i></a></td>'.
                    '</tr>';
            }
            return Response($output);

        }
    }

    public function search_supervised_dash(Request $request){
        $output='';
        $supervised = DB::table('student')
            ->join('capstone_table','cp_student','=','student_user_id')
            ->join('project','project_Id','=','cp_project')
            ->join('users','userId','=','student_user_id')
            ->join('major','major_Id','=','student_major')
            ->where('users.first_name','LIKE','%'.$request->get('value').'%')
            ->orWhere('users.last_name','LIKE','%'.$request->get('value').'%')
            ->paginate(5);

        if($supervised){
            foreach ($supervised as $student){
                $output.= '<tr>'.
                    '<td>'. $student->first_name.' '.' '.$student->last_name.'</td>'.
                    '<td>'.$student->major_name.'</td>'.
                    '<td>'.$student->project_type.'</td>'.
                    '<td><a href=""  class="nav-link" data-toggle="modal" data-target='."#$student->student_user_id".'><i class="fas fa-envelope text-muted"></i></a></td>'.
                    '</tr>';
            }
            return Response($output);

        }
    }


    public function search_unsupervised_dash(Request $request){
        $output='';

        $unsupervised = DB::table('student')
            ->leftJoin('capstone_table','student.student_user_id','=','capstone_table.cp_student')
            ->join('users','userId','=','student.student_user_id')
            ->join('major','major_Id','=','student_major')
            ->where('capstone_table.cp_student','=',NULL)
            ->where('users.first_name','LIKE','%'.$request->get('value').'%')
            ->paginate(5);


        if($unsupervised){
            foreach ($unsupervised as $student){
                $output.= '<tr>'.
                    '<td>'. $student->first_name.' '.' '.$student->last_name.'</td>'.
                    '<td>'.$student->major_name.'</td>'.
                    '<td><a href=""  class="nav-link" data-toggle="modal" data-target='."#$student->student_user_id".'><i class="fas fa-envelope text-muted"></i></a></td>'.
                    '</tr>';
            }
            return Response($output);

        }
    }

    public function contact_students(){
        return view('coordinator/contact_student');
    }


}

