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

/*
 * Routes for Faculty
 */

Route::get('/dashboard', 'FacultyController@index');
Route::get('/profile', 'FacultyController@profile');
Route::get('/students', 'FacultyController@students');
Route::get('/topics','ProjectsController@index');
Route::get('/milestones','FacultyController@milestones');
Route::put('profile', 'FacultyController@update');
Route::put('studentProfile', 'StudentController@update')->name('update');
Route::get('supervisor_requests', 'ProjectsController@supervisor_requests');
Route::post('createMeeting','FacultyController@createMeeting')->name('createMeeting');
Route::post('/meetingDetails', 'FacultyController@searchMeeting')->name('searchMeeting');

/*
 * Routes for Projects
 */
Route::get('project{id}','ProjectsController@go_to_project')->name('viewProject'); //REVIEW
Route::post('/submit','ProjectsController@store');
Route::get('/show','ProjectsController@view_faculty_Projects');
Route::post('studentTopics','ProjectsController@select_supervisor');
Route::put('completeProfile', 'StudentController@complete')->name('complete');
Route::post('studentTopics','ProjectsController@select_supervisor');
Route::delete('deleteproject/{id}','ProjectsController@deleteproject')->name('deleteproject');
Route::get('acceptProject/{id}','ProjectsController@acceptProject')->name('acceptProject');
Route::get('apply/{id}','ProjectsController@apply')->name('apply');
Route::get('acceptProposal/{project_ID}/{student_ID}','ProjectsController@acceptProposal')->name('acceptProposal');

/*
 * Routes for students
 */
Route::get('/studentDashboard','StudentController@index');
Route::get('/studentProfile','StudentController@student_profile');
Route::get('/studentTopics','StudentController@student_topics');
Route::get('/myProject','StudentController@myProject');

/*
 * Routes for cs_supervisor
 */
Route::get('/super_dashboard','coordinatorController@index');
Route::get('/addFaculty','coordinatorController@addFaculty');
Route::post('/newFaculty','coordinatorController@newFaculty')->name('newFaculty');
Route::get('/super_profile','coordinatorController@profile');
Route::get('/manage_faculty','coordinatorController@manage_faculty');







//Route::resource('topics','ProjectsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','faculty']], function() {

});



