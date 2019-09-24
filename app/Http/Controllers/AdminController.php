<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin_dashboard');
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

}
