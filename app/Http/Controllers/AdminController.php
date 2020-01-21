<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\User;
use App\Policy;
use App\Role;
use App\Bank;
use App\BankAssignmentList;
use \Hash;
//use Alert;

class AdminController extends Controller
{
    public function adminDashboard()
    {   
        $user_list = User::whereIn('frole_code', ['2','3'])->get()->count();
        $policy_list = Policy::all()->count();
        $active_policy = Policy::whereIn('status',['0'])->count();
        $bank_assginment = BankAssignmentList::all()->count();
        //($policy_list);
        //dd($user_list);
        return view('admin_dashboard', compact('user_list',$user_list,
                                               'policy_list', $policy_list,
                                               'active_policy', $active_policy,
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
/*
    public function getAssignStaff(Request $request)
    {   
        $user_list = User::whereIn('frole_code', ['2','3'])->get();

        $bank_list = Bank::all();

        return view('admin.admin_bank_assign')->with(['user_list'=>$user_list, 
                                                        'bank_list'=>$bank_list]);
    }
*/

    public function getUserWithBank()
    {   
        $user_bank = User::with('bank_assignment_list')
                            ->whereIn('frole_code', ['2','3'])
                            ->get();

        $bank_list = Bank::all();
        
        return view('admin.admin_user_bank_list', compact('user_bank', 'bank_list'));
    }

    public function getPolicyList()
    {  
        $policies = Policy::with('not_alloweds','alloweds')->get();
        //$alloweds = Policy::with('alloweds')->get();
        return view('admin.admin_policy_list', compact('policies'));
    }

    //show page for change password
    public function forgotPassword()
    {
        return view('admin.forgot_passwordAdmin');
    }

    //change password
    public function changePasswordAdmin(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        else  if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        else{
            $validator = \Validator::make($request->all(), [
                'current-password' => ['required'],
                'new-password' => ['required','string','min:8', 'confirmed', 
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/'], // must contain a special character],
                'new-password_confirmation' => ['required','string','min:8', 
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/'], // must contain a special character],
            ]);
    
            if ($validator->fails()) {
                return redirect('/forgot_password')->withErrors($validator)->withInput();
            }
        }
        
        
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !"); 
    } 

}
