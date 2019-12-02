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

        return json_encode($bank);
    }

    /*
    function getUrl()
    {
        //$url = action('CardApplicationController@viewAllBankBranch');
        $url = url()->current();

        return json_encode($url);
    }*/

    function addCardApplication($name,$ic){
        return redirect()->action('CardApplicationController@index',compact('name','ic'));
    }


}