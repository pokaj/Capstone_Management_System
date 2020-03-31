<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use App\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class coordinatorController extends Controller
{
    public function index(){

        $faculty = DB::table('faculty')
            ->get();

        $facultyCount = count($faculty);

        $students = DB::table('student')
            ->get();

        $studentCount = count($students);

        return view('super_dashboard',compact('facultyCount','studentCount'));


    }

    public function addFaculty(){
        return view('addFaculty');
    }

    public function profile(){
        return view('super_profile');
    }

    public function newFaculty(Request $request){
        $user = new User;
        $user->first_name = $request->fname;
        $user->last_name = $request->lname;
        $user->email = $request->email;
        $user->category = 'faculty';
        $user->user_role = 2;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        $faculty = new Faculty;
        $faculty->faculty_Id = $user->userId;
        $faculty->save();

        return redirect()->back()
            ->with('message','Faculty member added');




    }
}
