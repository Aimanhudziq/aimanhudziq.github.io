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

    public function userDashboard()
    {
    	return view('user_dashboard');
    }

    public function userNewTask()
    {
        $policy = Policy::all();
        return view('normaluser.user_new_task')->with('policy', $policy);
    }
}
