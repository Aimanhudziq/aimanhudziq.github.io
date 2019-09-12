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


Route::get('/', 'UserController@login_user');
Route::get('/dashboard', 'UserController@dashboard');

Auth::routes();

Route::get('/login', 'Auth\LoginController@login')->name('login_user');
