<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use \Validator;
use App\User;
use Auth;
//use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //$this->middleware('guest')->except('logout');
        $this->user = $user;
        //$this->middleware('auth');
    }

    public function loginCheck(Request $request, User $user)
    {              
        $validator = Validator::make($request->all(), [
            'username' => ['required'],
            'password' => ['required','string','min:8', 
            'regex:/[a-z]/',      // must contain at least one lowercase letter
            'regex:/[A-Z]/',      // must contain at least one uppercase letter
            'regex:/[0-9]/',      // must contain at least one digit
            'regex:/[@$!%*#?&]/'] // must contain a special character],
        ]);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        }

        $user->username = $request->input('username');
        $user->password = $request->input('password');

        $result = User::where('username','=', $user->username)->first();

        if(!$result)
        {   
            \Session::flash('errMsg','username does not exist in database');
            return redirect()->back();
        }
        else{
            $credentials = [
                'username' => $user->username,
                'password' => $user->password,
            ];

            if (Auth::attempt($credentials)) {
                //dd($credentials);
                $user = Auth::user()->username;
                //dd($user);
                //dd($user->first_name, $user->last_name);
                return redirect()->intended('user_dashboard')->with(['user'=>$user]);
            }
        }
        \Session::flash('infoMsg','username and password does not match!');
        return redirect()->back()->withInput();
        

    }

    public function logout(Request $requset){
        Auth::logout();
        \Session::flush();
        return redirect()->intended('/');
        
    }
}
