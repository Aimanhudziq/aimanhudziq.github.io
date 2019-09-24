<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Policy;
use App\Role;

class AdminController extends Controller
{
    public function adminDashboard()
    {   
        $user_list = User::whereIn('frole_code', ['2','3'])->get()->count();
        $policy_list = Policy::all()->count();
        //($policy_list);
        //dd($user_list);
        return view('admin_dashboard', compact('user_list',$user_list,
                                               'policy_list', $policy_list));
    }

    public function getAllUser()
    {
        $user_list = User::whereIn('frole_code', ['2','3'])->get();

        $roles = Role::all();
        /*
        $users = $roles->users;
        dd($users);
        */
        return view('admin.admin_user_list')
                            ->with(['user_list'=>$user_list, 'roles'=>$roles]);
    }
    
    public function getPolicyList()
    {
        $policies = Policy::all();
        return view('admin.admin_policy_list', compact('policies', $policies));
    }

}
