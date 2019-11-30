<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientDetail;
use App\BankBranch;
use App\Bank;

class CardApplicationController extends Controller{

    function index(){
        return view('maybank.index');
    }

    function addApplication(Request $request){
        
        $bank = Bank::select('bank_code', 'bank_name')
                    ->with('bank_branch')
                    ->get();

        return json_encode($bank);
    }

}