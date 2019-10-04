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
        
        Alert::success($user->first_name.' Successful added to the system ',' Add User');

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
            'bank_list' => 'required'
        ]);
        
        $data = new BankAssignmentList;
      
        $data->fuser_staff_id = $request->input('user_staff_id');
        $data->frole_code = $request->input('role_code');
        $data->fbank_code = $request->input('bank_list');
        //dd($bank->fuser_staff_id,$bank->frole_code,$bank->fbank_code);
        $check_user = BankAssignmentList::where('fuser_staff_id',$data->fuser_staff_id)
                                            ->where('frole_code',$data->frole_code)
                                            ->where('fbank_code',$data->fbank_code)->get();
                                            //->first();
        if(count($check_user) > 0){
            //dd('suda ada');
            Alert::error($data->fuser_staff_id.' Already assigned with that bank.',' Duplicate Bank!');
            return back()->withInput();
        }
        else{

            $data->save();
            Alert::success($data->fuser_staff_id. ' Successfully assigned bank to user ID ', 'Assign Bank');
            return redirect('admin_user_bank_list');
        }
       
    }

    public function unassignBankToStaff(Request $req, $fuser_staff_id)
    {   
        //get bank code from spesific user
        $this->validate($req,[
            'bank_list' => 'required'
        ]);

        $bank_code = $req->get('bank_list');

        $unassigned_bank = BankAssignmentList::where('fuser_staff_id',$fuser_staff_id)
                                                ->where('fbank_code', $bank_code)
                                                ->first();

        $unassigned_bank->delete();
        Alert::success(' Successfully drop bank from user ID '.$fuser_staff_id, 'Drop Bank');

        return redirect('admin_user_bank_list');
   
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
