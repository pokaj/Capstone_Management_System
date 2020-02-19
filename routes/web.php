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
Route::get('/topics','FacultyController@topics');
Route::get('/milestones','FacultyController@milestones');


//Routes for Projects
Route::get('/topics/viewProject/{id}', ['uses' =>'ProjectsController@go_to_project' , 'as' => 'viewProject']);
Route::post('/submit','ProjectsController@store');
Route::get('/show','ProjectsController@view_faculty_Projects');
Route::get('/register','RegisterController@genderDropDown');


//Routes for students
Route::get('/studentDashboard','StudentController@index');
Route::get('/studentProfile','StudentController@student_profile');
Route::get('/studentTopics','StudentController@student_topics');
Route::get('/studentMilestones','StudentController@student_milestones');


Route::resource('topics','ProjectsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','faculty']], function() {

});



