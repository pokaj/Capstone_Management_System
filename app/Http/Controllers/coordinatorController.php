<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Project;
use Illuminate\Http\Request;
use App\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class coordinatorController extends Controller
{
    public function index(){

        $faculty = DB::table('faculty')->get();
        $students = DB::table('student')->get();
        $capstone = DB::table('capstone_table')->get();

        $facultyCount = count($faculty);
        $studentCount = count($students);
        $capstoneCount = count($capstone);

        return view('coordinator/super_dashboard',compact('facultyCount','studentCount','capstoneCount'));
    }

    public function addFaculty(){

        $dept = DB::table('department')->get();
        return view('coordinator/addFaculty',compact('dept'));
    }

    public function profile(){
        return view('coordinator/super_profile');
    }

    public function newFaculty(Request $request){


        $validatedData = $request->validate([
            'fname' => 'required|alpha|max:255',
            'lname' => 'required|alpha|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:255|unique:users',
            'password' => 'required',

        ],
            [
                'fname.required'=>'The first name field is required',
                'fname.alpha' => 'Only Text is allowed for the first name',
                'lname.required'=>'The Last name field is required',
                'lname.alpha' => 'Only Text is allowed for the Last name'
            ]);

        $user = new User;
        $user->first_name = $validatedData['fname'];
        $user->last_name =  $validatedData['lname'];
        $user->email =  $validatedData['email'];
        $user->category = 'faculty';
        $user->user_role = 2;
        $user->username =  $validatedData['username'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        $faculty = new Faculty;
        $faculty->faculty_Id = $user->userId;
        $faculty->faculty_dept = $request->dept;
        $faculty->number_of_students = 0;
        $faculty->save();

        return redirect()->back()
            ->with('message','Few faculty member added');

    }

    public function manage_faculty(){

        return view('coordinator/manageFaculty');
    }

    public function searchFaculty(Request $request){
            $output = "";
            $faculty_data = DB::table('users')
                ->join('faculty','faculty_Id','=','userId')
                ->join('department','department_Id','=','faculty_dept')
                ->where('users.first_name','LIKE','%'.$request->get('search').'%')
                ->orWhere('users.last_name','LIKE','%'.$request->get('search').'%')
                ->get();

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

}

