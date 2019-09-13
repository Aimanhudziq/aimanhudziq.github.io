<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use \Validator;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request, User $user)
    {      
        //$user->username = $request->username
        
        $validator = Validator::make($request->all(), [
            'username' => ['required'],
            'password' => ['required','string','min:8', 
            'regex:/[a-z]/',      // must contain at least one lowercase letter
            'regex:/[A-Z]/',      // must contain at least one uppercase letter
            'regex:/[0-9]/',      // must contain at least one digit
            'regex:/[@$!%*#?&]/'] // must contain a special character],
        ]);
        //$input = $request->input('username');
        //dd($input);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        }

       $validate_input=[
            $user->username = $request->input('username'),
            $user->password = $request->input('password'),
       ];

        $result = User::where('username','=', $user->username);
        if($result->count()==0){
            return "username anda tidak wujud dalam database";
        }
        return "username anda wujud";

    }
}
