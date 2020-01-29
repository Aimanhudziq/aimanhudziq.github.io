<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function maintenance()
    {
        return view('system_down_up');
    }
}
