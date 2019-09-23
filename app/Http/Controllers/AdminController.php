<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin_dashboard');
    }

    public function getAllUser()
    {
        $user_list = User::all();

        return view('admin.admin_user_list')->with(['user_list'=>$user_list]);
    }
}
