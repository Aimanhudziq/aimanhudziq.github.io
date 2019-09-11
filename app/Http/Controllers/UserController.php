<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login_user()
    {
    	return view('layouts.login_user');
    }

    public function images()
    {
    	return view('test_img');
    }
}
