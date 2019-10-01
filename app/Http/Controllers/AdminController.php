<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Policy;
use App\Role;
use App\Bank;
use App\BankAssignmentList;

class AdminController extends Controller
{
    public function adminDashboard()
    {   
        $user_list = User::whereIn('frole_code', ['2','3'])->get()->count();
        $policy_list = Policy::all()->count();
        $bank_assginment = BankAssignmentList::all()->count();
        //($policy_list);
        //dd($user_list);
        return view('admin_dashboard', compact('user_list',$user_list,
                                               'policy_list', $policy_list,
                                                'bank_assginment', $bank_assginment));
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

    public function getAllAdmin()
    {
        $admin_list = User::whereIn('frole_code', ['1'])->get();
        return view('admin.admin_admin_list')
                            ->with(['admin_list'=>$admin_list]);
    }

    public function getAssignStaff(Request $request)
    {   
        $user_list = User::whereIn('frole_code', ['2','3'])->get();

        $bank_list = Bank::all();

        return view('admin.admin_bank_assign')->with(['user_list'=>$user_list, 
                                                        'bank_list'=>$bank_list]);
    }

    public function getUserWithBank()
    {   
        $user_bank = User::with('bank_assignment_list')
                            ->whereIn('frole_code', ['2','3'])
                            ->get();
         $bank_list = Bank::all();
        return view('admin.admin_user_bank_list', compact('user_bank','bank_list'));
    }

    public function getPolicyList()
    {  
        $policies = Policy::with('not_alloweds','alloweds')->get();
        //$alloweds = Policy::with('alloweds')->get();
        return view('admin.admin_policy_list', compact('policies'));
    }

}
