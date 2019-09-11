<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login_user()
    {
    	return view('auth.login_user');
    }

    public function dashboard()
    {
    	return view('dashboard');
    }
}
