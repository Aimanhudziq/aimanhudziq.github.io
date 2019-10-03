<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Policy;
use App\BankAssignmentList;
use Carbon\Carbon;
use Alert;
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
            'role_category'=>'required',
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
        Alert::success($policy->policy_name.' Successful added to the policy list ',' Policy');
        //\Session::flash('createPolicy','Staff name: '.$policy->policy_name. 'Successful added to the policy list');
        return redirect('admin_policy_list');

    }

    public function autoGeneratePwd()
    {
        return "pwd_generated";
    }

    public function assignBankToStaff(Request $request)
    {   
        $this->validate($request,[
            'staff_name'=>'required',
            'user_category'=>'required',
            'bank_list' => 'required'
        ]);
        
        $bank = new BankAssignmentList;
      
        $bank->fuser_staff_id = $request->input('staff_name');
        $bank->frole_code = $request->input('user_category');
        $bank->fbank_code = $request->input('bank_list');
        
        $check_user_id = BankAssignmentList::whereIn('fuser_staff_id',[$bank->fuser_staff_id])
                                            ->whereIn('fbank_code', [$bank->fbank_code])
                                            ->whereIn('frole_code',[$bank->frole_code])
                                            ->first();
        //dd($check_user_id);
        if(count($check_user_id) > 0){
            //dd('suda ada');
            Alert::error($bank->fuser_staff_id.' Already assigned with that bank.',' Duplicate Bank!');
            return back()->withInput();
        }
        else{
            //dd('kasi masuk dalam db');
            foreach($request->bank_list as $bank_code ){

                $assign_bank = new BankAssignmentList;

                $assign_bank->fuser_staff_id = $request->input('staff_name');
                $assign_bank->frole_code = $request->input('user_category');
                $assign_bank->fbank_code = $bank_code;
                //dd($assign_bank->fbank_code);

                $assign_bank->save();
                Alert::success($assign_bank->fuser_staff_id. ' Successfully assigned bank to user ID ', 'Assign Bank');

            }
            return redirect('admin_assign_bank');
        }
       
    }

    public function deleteUser($staff_id)
    {
        $user = User::where('user_staff_id', $staff_id)->first();
        //dd($user);
        $user->delete();
        Alert::success($user->first_name.' Successful removed from the system ',' Delete Success');
        //\Session::flash('delMsg','Staff : '.$user->first_name. 'Successful removed from the system');
    	return redirect('admin_user_list');

    }

    public function deletePolicy($policy_no)
    {
        $policy = Policy::where('policy_no', $policy_no)->first();
        $policy->delete();
        Alert::success($policy->policy_name.' Successful removed from the system ',' Delete Policy');
        return redirect('admin_policy_list');
        
    }

}
