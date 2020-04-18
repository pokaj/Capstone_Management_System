<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something gr*/


use App\Mail\ReminderMail;
use Illuminate\Support\Facades\Mail;

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
//Route::get('/feedback', 'FacultyController@feedback')->name('feedback');
Route::post('/reminder', 'FacultyController@reminder')->name('reminder');
Route::get('/contact', 'FacultyController@contact')->name('contact');



/*
 * Routes for Projects
 */
Route::get('project{id}','ProjectsController@go_to_project')->name('viewProject'); //REVIEW
Route::post('/submit','ProjectsController@store');
Route::get('/show','ProjectsController@view_faculty_Projects');
Route::put('completeProfile', 'StudentController@complete')->name('complete');
Route::post('studentTopics','ProjectsController@select_supervisor')->name('studentTopics');
Route::delete('deleteproject/{id}','ProjectsController@deleteproject')->name('deleteproject');
Route::get('acceptProject/{id}','ProjectsController@acceptProject')->name('acceptProject');
Route::post('apply','ProjectsController@apply')->name('apply');
Route::post('acceptProposal','ProjectsController@acceptProposal');

/*
 * Routes for students
 */
Route::get('/studentDashboard','StudentController@index');
Route::get('/studentProfile','StudentController@student_profile');
Route::get('/studentTopics','StudentController@student_topics');
Route::get('/myProject','StudentController@myProject');
Route::get('/viewFaculty','StudentController@viewFaculty');


/*
 * Routes for cs_supervisor
 */
Route::get('/super_dashboard','coordinatorController@index');
Route::post('/super_dashboard/fetch_data','coordinatorController@fetch_data');
Route::post('/super_dashboard/unsuper','coordinatorController@unsupervised_student');
Route::post('/super_dashboard/super','coordinatorController@supervised_students');
Route::get('/addFaculty','coordinatorController@addFaculty')->name('addFaculty');
Route::post('/newFaculty','coordinatorController@newFaculty')->name('newFaculty');
Route::get('/super_profile','coordinatorController@profile');
Route::get('/manage_faculty','coordinatorController@manage_faculty');
Route::get('/searchFaculty','coordinatorController@searchFaculty');
Route::get('/details','coordinatorController@details');
Route::post('/limit','coordinatorController@limit');










//Route::resource('topics','ProjectsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','faculty']], function() {

});



