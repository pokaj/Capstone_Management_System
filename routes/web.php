<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something gr*/


Route::get('/', function () {
    return view('login');
});

//Routes for Faculty
Route::get('/dashboard', 'FacultyController@index');
Route::get('/profile', 'FacultyController@profile');
Route::get('/students', 'FacultyController@students');
Route::get('/topics','ProjectsController@index');
Route::get('/milestones','FacultyController@milestones');
Route::put('profile', 'FacultyController@update');
Route::put('studentProfile', 'StudentController@update');

Route::get('supervisor_requests', 'ProjectsController@supervisor_requests');



//Routes for Projects
Route::get('/viewProject/{id}', ['uses' =>'ProjectsController@go_to_project' , 'as' => 'viewProject']);
Route::post('/submit','ProjectsController@store');
Route::get('/show','ProjectsController@view_faculty_Projects');
Route::get('/register','RegisterController@genderDropDown');
Route::post('addproject', 'ProjectsController@addProject');
Route::post('studentTopics','ProjectsController@select_supervisor');
Route::post('studentTopics','ProjectsController@select_supervisor');
Route::delete('deleteproject/{id}','ProjectsController@deleteproject')->name('deleteproject');
Route::get('acceptProject/{id}','ProjectsController@acceptProject')->name('acceptProject');
Route::get('apply/{id}','ProjectsController@apply')->name('apply');


//deleteproject




//Routes for students
Route::get('/studentDashboard','StudentController@index');
Route::get('/studentProfile','StudentController@student_profile');
Route::get('/studentTopics','StudentController@student_topics');
Route::get('/studentMilestones','StudentController@student_milestones');
//only authenticated users can enter:
//->middleware('auth')


//Route::resource('topics','ProjectsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','faculty']], function() {

});



