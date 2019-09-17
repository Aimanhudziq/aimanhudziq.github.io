<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
