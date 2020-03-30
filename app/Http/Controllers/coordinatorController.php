<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class coordinatorController extends Controller
{
    public function index(){

        $faculty = DB::table('users')
            ->where('user_role','=',2)
            ->get();

        $facultyCount = count($faculty);

        $students = DB::table('users')
            ->where('user_role','=',3)
            ->get();

        $studentCount = count($students);

        return view('super_dashboard',compact('facultyCount','studentCount'));


    }

    public function addFaculty(){
        return view('addFaculty');
    }

    public function newFaculty(Request $request){
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->category = 'faculty';
        $user->user_role = 2;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()
            ->with('message','Faculty member profile created');




    }
}
