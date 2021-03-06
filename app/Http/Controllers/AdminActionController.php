<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use App\User;
use App\Role;
use App\Policy;
use App\Allowed;
use App\NotAllowed;
use App\BankAssignmentList;
use App\ClientDetail;
use Carbon\Carbon;
use Alert;
use App\Mail\sendMail;
use App\Mail\sendWelcomeEmail;
use \Mail;
use \Hash;
use Illuminate\Support\Str;
use Password;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Events\PasswordReset;
use App\Helper\ReferenceNumberHelper as GenRefNo;
use Intervention\Image\Facades\Image as Image;

class AdminActionController extends Controller
{

    use ResetsPasswords;
    
    //redirect user after reset password
    protected $redirectTo = '/user_dashboard';

   

    /**
     * Add new user with no dulipcate
     * 
     */
    public function addUser(Request $request)
    {
        $this->validate($request,[
            'user_staff_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'username'=>'required',
            'email'=>'required|email|unique:users',
            'role_category'=>'required',
        ]);

        //generate a password for the new users
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ1234567890!$%^&!$%^&');
        $password = substr($random, 0, 8);

        //add new user to database
        $user = new User;
        
        $user->user_staff_id = $request->input('user_staff_id');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($password);
        $user->frole_code = $request->input('role_category');
        $user->created_at = Carbon::now();


        
        if($user->frole_code == 1)
        {
            $user->user_type = "Admin";
        }
        else if($user->frole_code == 2)
        {
            $user->user_type = "Reviewer";
        }
        else
        {
            $user->user_type = "Normal User";
        }   
        
        // dd($user->user_staff_id,$user->first_name,$user->last_name,$user->username,$user->email,
        // $user->password,$user->frole_code,$user->created_at,$user->user_type);
        $user->save();


        // Generate a new reset password token
        $token = app('auth.password.broker')->createToken($user);
        
        Alert::success($user->first_name.' Successful added to the system ',' Add User');
        \Mail::to($user->email)->send(new sendWelcomeEmail($user, $token));

  
        return redirect('admin_user_list');
        return [
            'password'   => $password,
            'user'       => $user,
         
        ];
    }

    /**
     * activate/deactivate status policy
     */

    public function changeStatus(Request $request)
    {
        
        //$a = Policy::findOrFail($request->policy_no);
        
        $pol = Policy::findOrFail($request->policy_id);
        $pol->status = $request->status;
        $pol->save();


        return response()->json(['success'=>'Status change successfully.']);
    }
  
    /**
     * Add new policy to the system
     */

    public function addPolicy(Request $request)
    {
    
        $this->validate($request,[
            'policy_no'=>'required',
            'policy_name'=>'required',
            'policy_source'=>'required',
            'policy_regulation'=>'required',
            'allowed_desc'=>'required',
            'notAllowed_desc'=>'required',
        ]);

        $policy = new Policy;
        
        //randomize the policy number to DB insertion
       // $pol_no = substr(str_shuffle("0123456789"), 0, 3);
       // $policy_code = $pol_no;

        $policy->policy_no = $request->input('policy_no');
        $policy->policy_name = $request->input('policy_name');
        $policy->policy_source = $request->input('policy_source');
        $policy->policy_regulation = $request->input('policy_regulation');
        $policy->save();

        $allowed = new Allowed;

        $allowed->fpolicy_no = $request->input('policy_no');
        $allowed->desc = $request->input('allowed_desc');
        $allowed->save(); 

        $not_allowed = new NotAllowed;

        $not_allowed->fpolicy_no = $request->input('policy_no');
        $not_allowed->desc = $request->input('notAllowed_desc');
        $not_allowed->save();


        Alert::success($policy->policy_name.' Successful added to the policy list ',' Policy');

        return redirect('admin_policy_list');

    }

    /**
     * Assigned bank to staff
     * validate staff with duplicate bank assgined
     * notified email to staff when assigned to bank
     */

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

        
        if(count($check_user) > 0){
            //dd('suda ada');
            Alert::error($data->fuser_staff_id.' Already assigned with that bank.',' Duplicate Bank!');
            return back()->withInput();
        }
        /*
        else if($this->isBankAssignedToUser())
        {
            Alert::error('Only one bank per user can be assigned', 'Error!');
            return back();
        }*/
        else{

            $info = [
               'bank_code'=> $data->fbank_code,
               'first_name'=> $request->get('first_name'),
            ];
            //dd($info);
            $data->save();
            Alert::success($data->fuser_staff_id. ' Successfully assigned bank to user ID ', 'Assign Bank');

            \Mail::to($request->get('email'))->send(new sendMail($info));

            return redirect('admin_user_bank_list');
        }
       
    }
    
    /**
     * Unassigned bank to staff
     */
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

    public function clientDetails()
    {
        $bank_name = Bank::all();    
        return view('admin.client.client_details', compact('bank_name'));
    }

    /**
     * Upload images file function
     * 
     */

     public function getImage()
     {
        if(request()->hasFile('image_file'))
        {
            $image_file = request()->file('image_file');
            
            $image_name = date('d-m'). '_' .$image_file->getClientOriginalName();
            //$destination_path =  request()->file('image_file')->store('images/client');
            $destination_path =  'images/client';
            $image_url = $image_file->move($destination_path, $image_name);

            $image = Image::make($image_url)->resize(1036,664);
            $image->save($image_url);
            return $image; 
            
        }
     }

    /**
     * Add client details
     * upload images
     */

     public function registerClientDetails(Request $req)
     {
        
        $this->validate($req, [
            'full_name'=>'required',
            'email'=>'required|email',
            'phone_no'=>'required|digits_between:10,11',
            'ic_no'=>'required|numeric',
            'image_file'=>'required|mimes:jpeg,jpg,png|max:1024',
            'bank_name'=>'required',
            'address'=>'required',
        ]); 
        
        $status_code = 3;

        $data_client = new ClientDetail;

        $data_client->reference_no = GenRefNo::genRefNum();
        $data_client->full_name = $req->get('full_name');
        $data_client->email = $req->get('email');
        $data_client->phone_number = $req->get('phone_no');
        $data_client->ic_no = $req->get('ic_no');
        $data_client->address = $req->get('address');
        $data_client->image_url = $this->getImage();
        $data_client->fstatus_code = $status_code;
        $data_client->fbank_code = $req->get('bank_name');
        
        $check_client = ClientDetail::where('ic_no', $data_client->ic_no)
                                    ->where('fbank_code', $data_client->fbank_code)
                                    ->get();

        if(count($check_client) > 0)
        {
            Alert::error($data_client->full_name.' Already registered with that bank.',' Duplicate Client!');

            return back()->withInput();
        }
        
        $data_client->save();
        Alert::success('Applicant '.$data_client->full_name.' successful save in the system!',' Save Successful');
    
        return redirect('register/client_details');

     }

    /**
     * Remove user from the system
     */

    public function deleteUser($staff_id)
    {
        $user = User::where('user_staff_id', $staff_id)->first();
        //dd($user);
        $user->delete();
        Alert::success($user->first_name. trans(' message.msg_delete_success '), trans('message.title_delete_success'));
    	return redirect('admin_user_list');

    }

    /**
     * Delete policy
     */

    public function deletePolicy($policy_no)
    {
        $policy = Policy::where('policy_no', $policy_no)->first();
        $policy->delete();
        Alert::success($policy->policy_name.' Successful removed from the system ',' Delete Policy');
        return redirect('admin_policy_list');
        
    }

}
