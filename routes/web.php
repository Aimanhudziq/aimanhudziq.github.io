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

//Forgot Password
Route::get('password_reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
                ->name('password-request'); 
Route::post('password_email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
                ->name('password-email');
Route::get('password_reset/{token}', 'Auth\ResetPasswordController@showResetForm')
                ->name('password-reset'); 
Route::post('password_reset', 'Auth\ResetPasswordController@reset')
                ->name('password-update'); 

Route::get('user_dashboard', 'UserController@userDashboard')
                ->name('user-dashboard')
                ->middleware('user'); //access both users(normal user/reviewer)

Route::get('user_new_task/{bank_code}', 'UserController@userNewTask')
                ->name('user-new-task')
                ->middleware('normal_user'); //access by normal user only

Route::get('user_list_bank', 'UserController@userListBank')
                ->name('user-list-bank')
                ->middleware('normal_user'); //access by normal user only

Route::get('reviewer_list_bank', 'UserController@reviewerListBank')
                ->name('reviewer-list-bank');
                //->middleware('reviewer'); //access by reviewer only

Route::get('reviewer_kiv', 'UserController@reviewerKiv')
                ->name('reviewer-kiv');

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
                ->name('forgot-password')
                ->middleware('user');

Route::get('admin_user_list', 'AdminController@getAllUser')
                ->name('admin-user-list')
                ->middleware('admin');

Route::get('admin_admin_list', 'AdminController@getAllAdmin')
                ->name('admin-admin-list')
                ->middleware('admin');

Route::post('add_new_user', 'AdminActionController@addUser')
                ->name('add-new-user')
                ->middleware('admin');

Route::get('user/delete/{staff_id}', 'AdminActionController@deleteUser')
                ->name('delete-user')
                ->middleware('admin');

Route::get('admin_policy_list', 'AdminController@getPolicyList')
                ->name('admin-policy-list')
                ->middleware('admin');

Route::post('add_new_policy', 'AdminActionController@addPolicy')
                ->name('add-new-policy')
                ->middleware('admin');

Route::get('policy/delete/{policy_no}', 'AdminActionController@deletePolicy')
                ->name('delete-policy')
                ->middleware('admin');

Route::post('assign_bank_to_staff', 'AdminActionController@assignBankToStaff')
                ->name('assign-bank-to-staff')
                ->middleware('admin');

Route::post('unassign_bank_to_staff/{fuser_staff_id}', 'AdminActionController@unassignBankToStaff')
                ->name('unassign-bank-to-staff')
                ->middleware('admin');

Route::get('admin_user_bank_list', 'AdminController@getUserWithBank')
                ->name('admin-user-bank-list')
                ->middleware('admin');

Route::get('register/client_details', 'AdminActionController@clientDetails')
                ->name('register-client-details')
                ->middleware('admin');\

Route::post('register_client_details', 'AdminActionController@registerClientDetails')
                ->name('register-client-details')
                ->middleware('admin');

Route::get('approve/{ref_no}', 'StatusController@approve')
                ->name('approve')
                ->middleware('normal_user');



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