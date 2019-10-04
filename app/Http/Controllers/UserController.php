<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\policy;
use App\User;
use App\BankAssignmentList;
use Auth;

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

    public function userListBank()
    {   
        //$user = User::with('bank_assignment_list')->where('user_staff_id', Auth::user()->user_staff_id)->get();
        
        $user = BankAssignmentList::where('fuser_staff_id', Auth::user()->user_staff_id)->get();

        return view('users.user_list_bank')->with('user', $user);
    }

    public function reviewerListBank()
    {   
        //$user = User::with('bank_assignment_list')->where('user_staff_id', Auth::user()->user_staff_id)->get();
        
        $reviewer = BankAssignmentList::where('fuser_staff_id', Auth::user()->user_staff_id)->get();
        //dd($reviewer);
        return view('users.reviewer_list_bank')->with('reviewer', $reviewer);
    }

    public function reviewerKiv()
    {   
        $policy = Policy::all();
        return view('users.reviewer_kiv')->with('policy', $policy);
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
