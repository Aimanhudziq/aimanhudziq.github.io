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


    public function reviewerNewTask()
    {   
        
        $client = DB::table('banks as b')
                        ->join('client_details as cd', 'cd.fbank_code', '=', 'b.bank_code')
                        ->join('bank_assignment_lists as ba', 'ba.fbank_code', '=', 'b.bank_code')
                        ->where('ba.fuser_staff_id', Auth::user()->user_staff_id)
                        ->where('cd.fstatus_code', 2)
                        ->get();

        $staff_info = DB::table('users as u')
                                ->join('bank_assignment_lists as ba', 'ba.fuser_staff_id', '=', 'u.user_staff_id')
                                ->get();
    //dd($staff_info);
        foreach($staff_info as $si)
        {
               if($si->frole_code == 3)
               {
                    $staff_name = $si->first_name .' '. $si->last_name;
                    //dd($role_code);
                    //$staff_id = $si->fuser_staff_id;
                    //$bank_code = $si->fbank_code;
                    //$status_code = $si->fstatus_code;
                    /*
                    $staff_name = DB::table('users as u')
                                ->join('bank_assignment_lists as ba', 'ba.fuser_staff_id', '=', 'u.user_staff_id')
                                ->where('ba.frole_code', $role_code)
                                ->where('ba.fuser_staff_id', $staff_id)
                                ->where('ba.fbank_code', $bank_code)
                                ->get();*/
                    //dd($staff_name);

               }
        }

        $policy = Policy::all();

        return view('users.reviewer_new_task')->with(['policy'=>$policy, 
                                                'client'=>$client, 'staff_name'=>$staff_name]);
    }

    public function userNewTask()
    {   
        $client = DB::table('banks as b')
                    ->join('client_details as cd', 'cd.fbank_code', '=', 'b.bank_code')
                    ->join('bank_assignment_lists as ba', 'ba.fbank_code', '=', 'b.bank_code')
                    ->where('ba.fuser_staff_id', Auth::user()->user_staff_id)
                    ->get();


        
        $policy = Policy::all();
        
        return view('users.user_new_task')->with(['policy'=>$policy, 
                                                'client'=>$client]);
    }

    public function userSearch()
    {
        return view('users.user_search');
    }

    public function userTrackLog()
    {
        $logs = Clientdetail::all();
        return view('users.user_track_log', compact('logs'));
    }

    /**
     * get status of the applicant card
     * 
     */
    /*
    public function getApplicantStatus()
    {
        $status_id = ClientDetail::select('fstatus_code')->get();
      
        foreach($status_id as $status_code)
        {   
            if($status_code->fstatus_code == 3)
            {
                $status_desc = "new";
            }
            else if($status_code->fstatus_code == 2)
            {
                $status_desc = 'kiv';
            }
            else if($status_code->fstatus_code == 1)
            {
                $status_desc = 'approve';
            }
            else
            {
                $status_desc = 'reject';
            }

            return $status_desc;
        }
    }
    */
}
