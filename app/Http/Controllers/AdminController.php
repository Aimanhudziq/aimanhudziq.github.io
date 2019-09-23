<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin_dashboard');
    }

    public function getAllUser()
    {
        $user_list = User::all();

        $roles = Role::all();
        /*
        $users = $roles->users;
        dd($users);
        */
        return view('admin.admin_user_list')
                            ->with(['user_list'=>$user_list, 'roles'=>$roles]);
    }

    public function addUser(Request $request)
    {
        $validator = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'username'=>'required',
            'user_staff_id'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'frole_code'=>'required',
        ]);
        //$input['autoOpenModal'] = 'true';
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = new User;

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->username = $request->input('username');
        $user->user_staff_id = $request->input('staff_id');
        $user->email = $request->input('email');
        $user->password = autoGeneratePwd();
        $user->frole_code = $request->input('role_category');
        $user->created_at = Carbon::now();

        \DB::beginTransaction();
        $user->save();

        return redirect('admin.admin_user_list');
        //$user->password = $request->input('user_staff');
    }

    public function autoGeneratePwd()
    {
        return "pwd_generated";
    }

}
