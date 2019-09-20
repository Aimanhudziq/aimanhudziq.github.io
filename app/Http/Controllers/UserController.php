<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\policy;

class UserController extends Controller
{
    //user and admin login
    public function loginUser()
    {
    	return view('auth.login_user');
    }

    public function forgotPassword()
    {
        return view('users.forgot_password');
    }

    public function userDashboard()
    {
    	return view('user_dashboard');
    }

    public function userNewTask()
    {
        $policy = Policy::all();
        return view('users.user_new_task')->with('policy', $policy);
    }

    public function userSearch()
    {
        return view('users.user_search');
    }

    public function userTrackLog()
    {
        return view('users.user_track_log');
    }
}
