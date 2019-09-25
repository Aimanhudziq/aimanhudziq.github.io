<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Policy;
use Carbon\Carbon;

class AdminActionController extends Controller
{
    public function addUser(Request $request)
    {
        $this->validate($request,[
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

        $user->save();

        \Session::flash('createMsg','Staff : '.$user->first_name. 'Successful added in the system');
        return redirect('admin_user_list');

    }

    public function addPolicy(Request $request)
    {
    
        $this->validate($request,[
            //'policy_no'=>'policy_no',
            'policy_name'=>'required',
            'policy_source'=>'required',
            'policy_regulation'=>'required',
        ]);

        $policy = new Policy;
        
        //randomize the policy number to DB insertion
        $pol_no = substr(str_shuffle("0123456789"), 0, 3);
        $policy_code = $pol_no;

        $policy->policy_no = $policy_code;
        $policy->policy_name = $request->input('policy_name');
        $policy->policy_source = $request->input('policy_source');
        $policy->policy_regulation = $request->input('policy_regulation');

        $policy->save();

        \Session::flash('createPolicy','Staff : '.$policy->policy_name. 'Successful added to the policy list');
        return redirect('admin_policy_list');

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

    public function deletePolicy($policy_no)
    {
        $policy = Policy::where('policy_no', $policy_no)->first();
        $policy->delete();
        \Session::flash('delMsg','Policy : '.$policy->policy_name. 'Successful removed from the system');
        return redirect('admin_policy_list');
        
    }

}
