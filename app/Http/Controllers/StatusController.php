<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function reject($id)
    {
        $application=Application::where('id','=',$id)->first();
        
            if($application)
            {
                $application->approved=false;

                return redirect()->back()->with('error','The application was disapproved successfully');
            }
    }

    public function approve($id)
    {
        $application=Application::where('id','=',$id)->first();

        if($application)
        {
            $application->approved=false;

            return redirect()->back()->with('error','The application was disapproved successfully');
        }

    }

    public function kiv($id)
    {
        $application=Application::where('id','=',$id)->first();

        if($application)
        {
            $application->approved=false;

            return redirect()->back()->with('error','The application was disapproved successfully');
        }

    }
}
