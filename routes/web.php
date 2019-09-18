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
Route::get('user_dashboard', 'UserController@userDashboard')->name('user-dashboard')->middleware('user');
Route::get('admin_dashboard', 'AdminController@adminDashboard')->name('admin-dashboard')->middleware('admin');

Route::get('user_new_task', 'UserController@userNewTask')->name('user-new-task')->middleware('user');

//Route::get('policy', 'PolicyController@policyList');
/*
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    //All the routes that belongs to the group goes here
    Route::get('dashboard', function() {} );
});
*/