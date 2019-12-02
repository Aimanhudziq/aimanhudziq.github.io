<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use App\User;
use App\Role;
use App\Policy;
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

class AdminActionController extends Controller
{
    /**
     * Add new user with no dulipcate
     * 
     */
    use ResetsPasswords;
    
    //redirect user after reset password
    protected $redirectTo = '/user_dashboard';

     /**
     * show form for user to enter their email
     * 
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * show form for user to reset their password
     * 
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')
        ->with(
            ['token' => $token, 'email' => $request -> email]
        );
    }

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
            //'password'=>'required',
            //'user_type'=>'required|email|unique:users',
            'role_category'=>'required',
        ]);
        //$input['autoOpenModal'] = 'true';

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
        $user->password = bcrypt($password);        //\Hash::make('Mrtesting009@');
        $user->user_type = "Normal User";
        $user->frole_code = $request->input('role_category');
        $user->created_at = Carbon::now();

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
     * reset user password
     */
    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );
        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($request, $response)
                    : $this->sendResetFailedResponse($request, $response);

    }
     /**
     * use in reset function 
     * 
     */
    protected function sendResetResponse(Request $request, $response)
    {
        return redirect($this->redirectPath())
                            ->with('status', trans($response));
    }

    /**
     * use in reset function 
     * 
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
    }

    /**
     * use in reset function 
     * 
     */
    protected function validationErrorMessages()
    {
        return [];
    }

    /**
     * use in reset function 
     * 
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    /**
     * use in reset function 
     * 
     */
    protected function credentials(Request $request)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    /**
     * use in reset function 
     * 
     */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);

       // protected function resetPassword($user, $password)

       /* $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();*/

    }

    /**
     * use in reset function 
     * 
     */
    public function broker()
    {
        return Password::broker();
    }

    /**
     * send password reset link to user
     * 
     */
    public function sendResetLinkEmail(Request $request)
    {
        //dd($request->all());
        $this->validateEmail($request);
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );
        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response); 
    
    }
    
    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }
    /**
     * Get the needed authentication credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return back()->with('status', trans($response));
    }
    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => trans($response)]);
    }


    /**
     * Add new policy to the system
     */

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

    /***
     * generate ref number for client by date + random number
     */

    private function shuffleString($stringValue, $startWith = "") {
        $range = \range(0, \mb_strlen($stringValue));
        shuffle($range);
        foreach($range as $index) {
            $startWith .= \mb_substr($stringValue, $index, 1);
        }
        //dd($startWith);
        return $startWith;
    }

    /**
     * 1. generate ref number by using method shuffle string
     * eg output => g2^x%a)z+=jq$v1oubf#rk_ned3twihc(!lyp@ms&*
     * shuffle string method will be generate unique id 
     * 2. includes date ie: year + month + day (20191025)
     * 3. using sha1 (secure Hash Algorithm);
     */
    private function genRefNum()
    {
        $strvalue = $this->shuffleString("abcdefghijklmnopqrstuvwxyz123!@#$%^&*()_+=");

        $str_alph = substr(uniqid($strvalue),0,6);

        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $ref_number =  strtoupper($today . $rand . $str_alph);
        //dd($ref_number);
        return $ref_number;
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
            //dd($image_url);
            return $image_url; 
            
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

        $data_client->reference_no = $this->genRefNum();
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
