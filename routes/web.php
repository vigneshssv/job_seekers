<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/admin', function () {
    return view('auth.login');
});
Route::get('/admin/register', function () {
    return view('auth.register');
});

Route::post('admin/validate-login-form', 'Auth\LoginController@validate_login_form');
Route::post('admin/validate-registration-form', 'Auth\RegisterController@validate_registration_form');
Route::post('admin/login', 'Auth\LoginController@update_admin_login');

Route::get('/home', 'HomeController@index')->name('home');
/* Admin Panel */
/* Admin Panel */
Route::group(['prefix' => 'admin', 'middleware' => ['auth:web']], function() {
Route::get('dashboard',  'Admin\AdminController@index');
Route::resource('job_seekers',  'Admin\JobSeekersController');
});

Route::group(['prefix' => 'job_seekers', 'middleware' => ['auth:job_seeker', 'job_seeker']], function() {
Route::get('dashboard',  'Admin\AdminController@index');
Route::get('profile',  'Admin\AdminController@profile');
Route::get('change-password', 'Admin\AdminController@change_password');
Route::post('validate-change-password-form', 'Admin\AdminController@validate_change_password_form');
Route::post('update-password', 'Admin\AdminController@update_password');
Route::post('validate-profile-form', 'Admin\AdminController@validate_profile_form');
Route::post('update-profile', 'Admin\AdminController@update_profile');
});

Route::group(['prefix' => 'job_seekers'], function() {
Route::get('login',  'Auth\LoginController@job_seekers_login');
Route::get('register',  'Auth\LoginController@job_seekers_register');
Route::get('upate-registration',  'Auth\LoginController@register');

Route::post('validate-login-form', 'Auth\LoginController@validate_job_login_form');
Route::post('validate-registration-form', 'Auth\LoginController@validate_registration_form');
Route::post('upate-registration', 'Auth\LoginController@upate_registration');
Route::post('update-login', 'Auth\LoginController@update_login');
});