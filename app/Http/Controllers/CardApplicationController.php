<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\URL;
use App\ClientDetail;
use App\BankBranch;
use App\Bank;

class CardApplicationController extends Controller{

    function index(Request $request){
        
        return view('maybank.index')->with($request->all());
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

    /***
     * generate ref number for client by date + random number
     */

    private function shuffleString($stringValue, $startWith = "") 
    {
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

    /**
     * Upload images file function
     * 
     */

    public function getImageUrl()
    {
        $bank_code = 101;
        $image_url ="";

        $image = request()->input('image_file');  // your base64 encoded
        if(!empty($image))
        {
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $file_name = $bank_code. '_' .request()->input('ic_no').'.png';
            \File::put(public_path(). '/images/client/' . $file_name, base64_decode($image));

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
        
        $client->reference_no = $this->genRefNum();
        $client->full_name = $req->get('full_name');
        $client->ic_no = $req->get('ic_no');
        $client->phone_number = $req->get('phone_no');
        $client->email = $req->get('email');
        $client->address = $banks->branch_address;
        $client->fstatus_code = 3;
        $client->image_url = $this->getImageUrl();
        $client->fbank_code = $bank_code;
    
        $check_client = ClientDetail::where('ic_no', $client->ic_no)->get();

        if(count($check_client) > 0)
        {
            //return redirect()->back()->with('error','Client already registered to the system!');
            return response()->json(['status' => 'error', 'message' => 'Client already registered to the system!']);
        }

        $client->save();

        //return redirect()->back()->with('success','Client successfully registered!');
        return response()->json(['status' => 'success', 'message' => 'Client successfully registered!']);
        
    }

}