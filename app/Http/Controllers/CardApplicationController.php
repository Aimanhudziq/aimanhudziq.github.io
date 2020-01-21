<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\URL;
use App\ClientDetail;
use App\BankBranch;
use App\Bank;
use App\State;
use App\DemoUser;
use \Auth;
use App\Helper\ReferenceNumberHelper as RefGen;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Hash;

class CardApplicationController extends Controller{
    
    public function __constructor(){
        $this->middleware('icchecker')->only('submitCardApplication');
        
    }

    function index(Request $request){
        if($request->ip()!="192.168.3.175"){
            return "unauthorized";
        }else{
            return "success";
        }
        //    return view('maybank.index');
          
    }
    
    function demo(){
        if(Auth::guard('demouser')->guest()){
            return redirect('/demo/login');
        }else{
            return view('maybank.demo');
        }
    }
    function viewAllBankBranch($bank_code)
    {
        
        $bank = BankBranch::where('fbank_code', $bank_code)->get();

        return response()->json($bank);
    }

    function addCardApplication($name,$ic,$phone_no, $branch_code, $image_url){

        // $client_info = array([
        //     'name'=>$name,
        //     'ic'=>$ic,
        //     'phone_no'=>$phone_no,
        //     'branch_code'=>$branch_code,
        //     'image_url'=>$image_url,
        // ]);
        $client_info = "test";
        //dd($client_info);
        return redirect()->action('CardApplicationController@index',compact('client_info'));
    }

    function getStates(){
        return response()->json(State::select(['state_code2','state_name'])->get());
    }

    function getBankBranches(){
        return response()->json(BankBranch::all());
    }

    /**
     * Upload images file function
     * 
     */

    public function getImageUrl($ref_no)
    {
        $image_url ="";

        $image = request()->input('image_file');  // your base64 encoded
        if(!empty($image))
        {
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $image_decoded = base64_decode($image);


            $file_name = $ref_no.'.png';
            $img = Image::make($image_decoded)->resize(1036,664)->stream('png','100');

            \File::put(public_path(). '/images/client/' . $file_name, $img);

            $image_url = '/images/client/' . $file_name; 
        }
            
        return $image_url;
            
    }

    function submitCardApplication(Request $req)
    {
        
        
       $bank_code = 101;

        $client = new ClientDetail;

        //get the branch address from bank branch db 
        $banks = BankBranch::select('branch_address')
                            ->where('fbank_code',$bank_code)
                            ->where('branch_code', $req->get('branch_code'))    
                            ->first();
        
        $client->reference_no = RefGen::genRefNum();
        $client->ic_no = $req->get('ic_no');
        $client->phone_number = $req->get('phone_no');
        $client->email = $req->get('email');
        $client->address = trim($banks->branch_address);
        $client->fstatus_code = 3;
        $client->image_url = $this->getImageUrl($client->reference_no);
        $client->fbank_code = $bank_code;
        
        if($client->save()){
            return response()->json(['status' => 'success', 'message' => 'Client successfully registered!']);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Client already registered to the system!']);
        }
  
    }


    function login(Request $request){
        return view('maybank.login');
    }

    function logout(){
        Auth::guard('demouser')->logout();
        return redirect()->intended('/demo/login');
    }
    function authenticate(Request $request){
        
        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if(Auth::guard('demouser')->attempt($credentials)){
            return redirect()->action('CardApplicationController@demo');
        }else{
            return response("Unauthorize",401);
        }
    }

}