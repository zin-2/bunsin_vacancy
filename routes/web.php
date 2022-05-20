<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();
Route::post('apply_job/{job_id}/{user_id}', ['as' => 'apply_job', 'uses'=>'JobController@applyJob']);
Route::get('/admin/dashboard', 'JobController@dashboard')->name('dashbaord');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/register-post','Auth\RegisterController@RegisterMemeber')->name('register-post');
Route::resource('job','JobController');
Route::get('/fetchState','JobController@fetchStateByProvice');
Route::resource('category','CategoryController');
Route::resource('company','CompanyController');
Route::resource('vacancy','VacancyController');
Route::resource('contact','ContactController');
Route::resource('pricing','PricingController');
Route::resource('payment','PaymentController');
Route::post('get-job','VacancyController@jobSearch')->name('job-search');
Route::resource('user','UserController');
Route::resource('post','PostController');
Route::get('post-page','PostController@postview')->name('post_page');
Route::get('post-page-detail/{id}','PostController@postviewDetail')->name('post_page_detail');
Route::get('change-password', 'UserController@changePassword')->name('change_password');
Route::get('check-email/{id}', 'UserController@checkPassword')->name('check_email');
Route::post('change-password', 'UserController@changePasswordPost');
Route::get('applicant', 'UserController@employerApplicant')->name('employer_applicant');
Route::get('applicant-create', 'UserController@employerApplicantCreate')->name('employer_applicant_create');
Route::get('applicant-edit/{id}', 'UserController@employerApplicantEdit')->name('employer_applicant_edit');
Route::patch('applicant-update/{id}', 'UserController@employerApplicantUpdate')->name('employer_applicant_update');
Route::post('applicant-create-post', 'UserController@employerApplicantPost')->name('employer_applicant_post');
Route::get('applicant-create-detail/{id}/{user_id}/{job_id}', 'UserController@employerApplicantDetail')->name('employer_applicant_detail');


