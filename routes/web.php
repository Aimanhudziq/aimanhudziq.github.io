<?php

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
//Route::auth();
//login page http//127.0.0.1:8000
//Route::get('/', 'UserController@loginUser')->name('login-page'); 

Route::get('/', ['as'=>'/', 'uses'=>'UserController@loginUser']);

//authenticate user login
Route::get('login', 'Auth\LoginController@loginCheck')->name('login-check');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password_reset', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('user_dashboard', 'UserController@userDashboard')
                ->name('user-dashboard')
                ->middleware('user'); //access both users(normal user/reviewer)

Route::get('user_new_task', 'UserController@userNewTask')
                ->name('user-new-task')
                ->middleware('normal_user'); //access by normal user only

Route::get('user_track_log', 'UserController@userTrackLog')
                ->name('user-track-log')
                ->middleware('user'); //access both users(normal user/reviewer)

Route::get('user_search', 'UserController@userSearch')
                ->name('user-search')
                ->middleware('user'); //access both users(normal user/reviewer)

Route::get('admin_dashboard', 'AdminController@adminDashboard')
                ->name('admin-dashboard')
                ->middleware('admin'); // access by admin only

Route::get('forgot_password', 'UserController@forgotPassword')
                ->name('forgot-password');

Route::get('admin_user_list', 'AdminController@getAllUser')
                ->name('admin-user-list')
                ->middleware('admin');

Route::post('add_new_user', 'AdminController@addUser')
                ->name('add-new-user')
                ->middleware('admin');

//Route::post('password_email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password-email');
//Route::get('password/reset', 'Auth\ResetPasswordController@reset');
//Route::get('policy', 'PolicyController@policyList');
/*
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    //All the routes that belongs to the group goes here
    Route::get('dashboard', function() {} );
});
*/