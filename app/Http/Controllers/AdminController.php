<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Policy;
use App\Role;
use App\Bank;

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

        $roles = Role::with('users')->get();
        //dd($roles);
        //$users = $roles->users;
        //dd($users);
        
        return view('admin.admin_user_list')
                            ->with(['user_list'=>$user_list, 'roles'=>$roles]);
    }

    public function getAssignStaff(Request $request)
    {   
        $user_list = User::whereIn('frole_code', ['2','3'])->get();

        $bank_list = Bank::all();

        return view('admin.admin_bank_assign')->with(['user_list'=>$user_list, 
                                                        'bank_list'=>$bank_list]);
    }

    public function getPolicyList()
    {  
        $policies = Policy::with('not_alloweds','alloweds')->get();
        //$alloweds = Policy::with('alloweds')->get();
        return view('admin.admin_policy_list', compact('policies'));
    }

}
