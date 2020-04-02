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

        $faculty = DB::table('faculty')->get();
        $students = DB::table('student')->get();
        $capstone = DB::table('capstone_table')->get();

        $facultyCount = count($faculty);
        $studentCount = count($students);
        $capstoneCount = count($capstone);

        return view('super_dashboard',compact('facultyCount','studentCount','capstoneCount'));
    }

    public function addFaculty(){
        return view('addFaculty');
    }

    public function profile(){
        return view('super_profile');
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
        $faculty->save();

        return redirect()->back()
            ->with('message','Few faculty member added');

    }

    public function manage_faculty(){

        return view('manageFaculty');
    }

}
