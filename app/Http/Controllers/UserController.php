<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\policy;
use App\User;
use App\BankAssignmentList;
use App\Bank;
use App\ClientDetail;
use Carbon\Carbon;
use App\CardApplication;

use App\TrackRecord;

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

    //change/reset password
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
     * count by year
     * count how many reject,approve in a month
     */
    public function countApproveByMonth()
    {
        $jan = ClientDetail::select('updated_at')->whereMonth('updated_at','01')->where('fstatus_code',1)->get()->count();
        $feb = ClientDetail::select('updated_at')->whereMonth('updated_at','02')->where('fstatus_code',1)->get()->count();
        $mac = ClientDetail::select('updated_at')->whereMonth('updated_at','03')->where('fstatus_code',1)->get()->count();
        $apr = ClientDetail::select('updated_at')->whereMonth('updated_at','04')->where('fstatus_code',1)->get()->count();
        $mei = ClientDetail::select('updated_at')->whereMonth('updated_at','05')->where('fstatus_code',1)->get()->count();
        $jun = ClientDetail::select('updated_at')->whereMonth('updated_at','06')->where('fstatus_code',1)->get()->count();
        $july = ClientDetail::select('updated_at')->whereMonth('updated_at','07')->where('fstatus_code',1)->get()->count();
        $aug = ClientDetail::select('updated_at')->whereMonth('updated_at','08')->where('fstatus_code',1)->get()->count();
        $sept = ClientDetail::select('updated_at')->whereMonth('updated_at','09')->where('fstatus_code',1)->get()->count();
        $oct = ClientDetail::select('updated_at')->whereMonth('updated_at','10')->where('fstatus_code',1)->get()->count();
        $nov = ClientDetail::select('updated_at')->whereMonth('updated_at','11')->where('fstatus_code',1)->get()->count();
        $dec = ClientDetail::select('updated_at')->whereMonth('updated_at','12')->where('fstatus_code',1)->get()->count();
       
        $month_info_count_apprv[] =[
            'jan'=>$jan,
            'feb'=>$feb,
            'mac'=>$mac,
            'apr'=>$apr,
            'mei'=>$mei,
            'jun'=>$jun,
            'july'=>$july,
            'aug'=>$aug,
            'sept'=>$sept,
            'oct'=>$oct,
            'nov'=>$nov,
            'dec'=>$dec,
        ];

        return $month_info_count_apprv;

    }

    public function countRejectByMonth()
    {
        $jan = ClientDetail::select('updated_at')->whereMonth('updated_at','01')->where('fstatus_code',1)->get()->count();
        $feb = ClientDetail::select('updated_at')->whereMonth('updated_at','02')->where('fstatus_code',0)->get()->count();
        $mac = ClientDetail::select('updated_at')->whereMonth('updated_at','03')->where('fstatus_code',0)->get()->count();
        $apr = ClientDetail::select('updated_at')->whereMonth('updated_at','04')->where('fstatus_code',0)->get()->count();
        $mei = ClientDetail::select('updated_at')->whereMonth('updated_at','05')->where('fstatus_code',0)->get()->count();
        $jun = ClientDetail::select('updated_at')->whereMonth('updated_at','06')->where('fstatus_code',0)->get()->count();
        $july = ClientDetail::select('updated_at')->whereMonth('updated_at','07')->where('fstatus_code',0)->get()->count();
        $aug = ClientDetail::select('updated_at')->whereMonth('updated_at','08')->where('fstatus_code',0)->get()->count();
        $sept = ClientDetail::select('updated_at')->whereMonth('updated_at','09')->where('fstatus_code',0)->get()->count();
        $oct = ClientDetail::select('updated_at')->whereMonth('updated_at','10')->where('fstatus_code',0)->get()->count();
        $nov = ClientDetail::select('updated_at')->whereMonth('updated_at','11')->where('fstatus_code',0)->get()->count();
        $dec = ClientDetail::select('updated_at')->whereMonth('updated_at','12')->where('fstatus_code',0)->get()->count();
       
        $month_info_count_reject[] =[
            'jan'=>$jan,
            'feb'=>$feb,
            'mac'=>$mac,
            'apr'=>$apr,
            'mei'=>$mei,
            'jun'=>$jun,
            'july'=>$july,
            'aug'=>$aug,
            'sept'=>$sept,
            'oct'=>$oct,
            'nov'=>$nov,
            'dec'=>$dec,
        ];

        return $month_info_count_reject;

    }

    /**
     * normal user and reviewer landing page
     * 
     */
    public function userDashboard() 
    {
        $new = ClientDetail::whereIn('fstatus_code', ['3'])->get()->count();
        $kiv = ClientDetail::whereIn('fstatus_code', ['2'])->get()->count();
        $approve = ClientDetail::whereIn('fstatus_code', ['1'])->get()->count();
        $reject = ClientDetail::whereIn('fstatus_code', ['0'])->get()->count();

        $tot  = $new + $kiv + $approve + $reject;
        

        $count_aprv = $this->countApproveByMonth();
        $count_rej = $this->countRejectByMonth();
        //dd($count_aprv);

        return view('user_dashboard', compact('new',$new,
                                               'kiv', $kiv, 
                                                'approve', $approve,
                                                 'reject', $reject,
                                                    'tot', $tot,
                                                    'count_aprv',$count_aprv,
                                                        'count_rej',$count_rej)); 
        
    }

    /**
     * normal user whos assigned to the spesific bank
     * 
     */
    public function userListBank() 
    {   
        $user = BankAssignmentList::where('fuser_staff_id', Auth::user()->user_staff_id)->get();

        $bank = Bank::join('client_details','bank_code','=','fbank_code')
                     ->where('fstatus_code', 3)
                     ->get(); 
        //dd($user);
        return view('users.user_list_bank')->with(['user'=>$user, 'bank'=>$bank]);
    }

    /**
     * reviewer whos assigned to the spesific bank
     * 
     */
    public function reviewerListBank()
    {   
        //$user = User::with('bank_assignment_list')->where('user_staff_id', Auth::user()->user_staff_id)->get();
        
        $reviewer = BankAssignmentList::where('fuser_staff_id', Auth::user()->user_staff_id)->get();

        $bank = Bank::join('client_details','bank_code','=','fbank_code')
                    ->where('fstatus_code', 2)
                    ->get(); 
        //dd($bank);
        return view('users.reviewer_list_bank')->with(['reviewer'=>$reviewer, 'bank'=>$bank]);
    }


    public function reviewerNewTask($bank_code)
    {   
        
        $client = DB::table('banks as b')
                        ->join('client_details as cd', 'cd.fbank_code', '=', 'b.bank_code')
                        ->join('bank_assignment_lists as ba', 'ba.fbank_code', '=', 'b.bank_code')
                        ->where('ba.fuser_staff_id', Auth::user()->user_staff_id)
                        ->where('cd.fbank_code', $bank_code) 
                        ->where('cd.fstatus_code',2) 
                        ->get();

        $staff_info = DB::table('users as u')
                                ->join('bank_assignment_lists as ba', 'ba.fuser_staff_id', '=', 'u.user_staff_id')
                                ->where('ba.fbank_code', $bank_code)
                                ->get();

        $allInfo = DB::table('client_details as cd')
                     ->join('track_records as tr', 'tr.freference_no', '=', 'cd.reference_no')
                     ->where('tr.new_status_code', 2)
                     ->groupBy('freference_no')
                     //->where('ca.freference_no', '=', 'cd.reference_no')
                     ->get();

    //dd($allInfo);
   
        foreach($staff_info as $si)
        {
               if($si->frole_code == 3)
               {
                    $staff_name = $si->first_name .' '. $si->last_name;
               }
        }

        $policy = Policy::all(); 

        

        return view('users.reviewer_new_task')->with(['policy'=>$policy, 'allInfo'=>$allInfo,
                                                'client'=>$client, 'staff_name'=>$staff_name]);
    }

    public function userNewTask($bank_code)
    {   

        $client  = DB::table('banks as b')
                    ->join('client_details as cd', 'cd.fbank_code', '=', 'b.bank_code')
                    ->join('bank_assignment_lists as ba', 'ba.fbank_code', '=', 'b.bank_code')
                    ->where('ba.fuser_staff_id', Auth::user()->user_staff_id)
                    ->where('cd.fbank_code', $bank_code)
                    ->whereIn('cd.fstatus_code',['3'])
                    ->get(); 
                    
        $policy = Policy::all(); 
        
        
        return view('users.user_new_task')->with(['policy'=>$policy, 
                                                'client'=>$client]);
    }
   
    public function userSearch()
    {
        $search = Clientdetail::all();
        return view('users.user_search', compact('search'));
    }

    public function userTrackLog()
    { 

        $data = DB::table('track_records as tr')
                  ->join('card_applications as ca', 'ca.freference_no', '=', 'tr.freference_no')
                  ->get();

        $logs = DB::table('client_details')
                  ->where('fstatus_code', '!=', ['3'])
                  ->orderBy('updated_at', 'desc')
                  ->get();
        // dd($logs);

        $trackRec = TrackRecord::all();
       
        $cardApp = CardApplication::all();

        return view('users.user_track_log')->with(['logs'=>$logs,'trackRec'=>$trackRec, 'cardApp'=>$cardApp, 'data'=>$data]);
    }


}
