<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardApplicationController extends Controller{

    function index(){
        return view('maybank.index');
    }

    function addApplication(Request $request){
        return "1";
    }

}