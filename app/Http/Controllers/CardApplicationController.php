<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\ClientDetail;
use App\BankBranch;
use App\Bank;

class CardApplicationController extends Controller{

    function index(Request $request){
        
        return view('maybank.index')->with($request->all());
    }

    function viewAllBankBranch(Request $request)
    {
        
        $bank = Bank::select('bank_code', 'bank_name')
                    ->with('bank_branch')
                    ->get();

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

    function submitCardApplication(Request $req)
    {
        $bank_code = 101;

        $client = new ClientDetail;
        $branch = BankBranch::select('branch_address')
                            ->where('fbank_code',$bank_code)
                            ->where('branch_code', $req->input('branch_code'))    
                            ->first();
        
        $client->freference_no = $req->get('reference_no');
        $client->full_name = $req->get('full_name');
        $client->ic_no = $req->get('ic_no');
        $client->phone_no = $req->get('phone_no');
        $client->email = $req->get('email');
        $client->address = $branch->branch_address;
        $client->image_url = $req->get('image_url');
        $client->fbank_code = $bank_code;

        $client->save();
        



    }

}