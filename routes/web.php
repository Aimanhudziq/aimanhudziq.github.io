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
Route::get('dashboard', 'UserController@dashboard')->name('dashboard');
