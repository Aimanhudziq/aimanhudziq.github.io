<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Carbon\Carbon;

class AdminActionController extends Controller
{
    public function addUser(Request $request)
    {
        $validator = $this->validate($request,[
            'user_staff_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'username'=>'required',
            'email'=>'required|email|unique:users',
            //'password'=>'required',
            //'user_type'=>'required|email|unique:users',
            //'frole_code'=>'required',
        ]);
        //$input['autoOpenModal'] = 'true';
        
        $user = new User;
        
        $user->user_staff_id = $request->input('user_staff_id');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = \Hash::make('Mrtesting009@');
        $user->user_type = "Normal User";
        $user->frole_code = $request->input('role_category');
        $user->created_at = Carbon::now();

        \DB::beginTransaction();
        $user->save();

        \Session::flash('createMsg','Staff : '.$user->first_name. 'Successful added in the system');
        return redirect('admin_user_list');
        //$user->password = $request->input('user_staff');
    }

    public function autoGeneratePwd()
    {
        return "pwd_generated";
    }

    public function deleteUser($staff_id)
    {
        $user = User::where('user_staff_id', $staff_id)->first();
        //dd($user);
        $user->delete();
        \Session::flash('delMsg','Staff : '.$user->first_name. 'Successful removed from the system');
    	return redirect('admin_user_list');

    }
}
