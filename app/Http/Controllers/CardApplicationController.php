<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\ClientDetail;
use App\BankBranch;
use App\Bank;

class CardApplicationController extends Controller{

    function index(){
        return view('maybank.index');
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

}