<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo(){

            return '/studentProfile';

        }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required','regex:/^[a-zA-Z]+$/u','max:255|'],
            'last_name' => ['required', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'gender' => ['required', 'string'],
            'username' => ['required','alpha_dash', 'string', 'max:255','unique:users'],
            'phone' => 'required|regex:/(0)[0-9]{9}/|max:10',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'regex:/[A-Z]/', 'min:8', 'confirmed'],
        ],
            [
                    'phone.regex' => 'Please check the phone number entered.',
                    'phone.max' => 'Phone number must be 10 digits',
                    'first_name.regex' => 'This field only accepts alphabets',
                    'last_name.regex' => 'This field only accepts alphabets',
                    'password.regex' => 'The password must contain at least one Uppercase letter'

                ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'category' => 'student',
            'user_role' => 3,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        /**
         *  populate sutdent table with student ID
         */

            DB::table('student')->insert([
                'student_user_id' => $data->userId,
            ]);

        return $data;

    }
}
