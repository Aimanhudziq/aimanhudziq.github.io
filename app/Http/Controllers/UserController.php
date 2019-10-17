<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\policy;
use App\User;
use App\BankAssignmentList;
use App\Bank;
use App\ClientDetail;
use Auth;
use DB;
use \Hash;

class UserController extends Controller
{
    /**
     * User and admin login page
     * User consist of normal user and reviewer
     */

    

    public function loginUser()
    {
    	return view('auth.login_user');
    }

    /**
     * user forgot password
     * reset pasword
     */
    public function forgotPassword()
    {
        return view('users.forgot_password');
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !"); 
    }

    


    /**
     * normal user and reviewer landing page
     * 
     */
    public function userDashboard()
    {
    	return view('user_dashboard');
    }

    /**
     * normal user whos assigned to the spesific bank
     * 
     */
    public function userListBank()
    {   
        /**
         * $user = User::with('bank_assignment_list')->where('user_staff_id', Auth::user()->user_staff_id)->get();
         * 
         */
        
        //join table banks, bank_asiggnment_lists, client_details
        /*
        $user = DB::table('banks as b')
                    ->join('client_details as cd', 'cd.fbank_code', '=', 'b.bank_code')
                    ->join('bank_assignment_lists as ba', 'ba.fbank_code', '=', 'b.bank_code')
                    ->where('ba.fuser_staff_id', Auth::user()->user_staff_id)
                    ->groupBy('ba.fbank_code')
                    ->get();
        */
        $user = BankAssignmentList::where('fuser_staff_id', Auth::user()->user_staff_id)->get();
        return view('users.user_list_bank')->with(['user'=>$user]);
    }

    /**
     * reviewer whos assigned to the spesific bank
     * 
     */
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

    {   $client = DB::table('banks as b')
                    ->join('client_details as cd', 'cd.fbank_code', '=', 'b.bank_code')
                    ->join('bank_assignment_lists as ba', 'ba.fbank_code', '=', 'b.bank_code')
                    ->where('ba.fuser_staff_id', Auth::user()->user_staff_id)
                    ->get();

        $policy = Policy::all();
        
        return view('users.user_new_task')->with(['policy'=>$policy, 'client'=>$client]);
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
