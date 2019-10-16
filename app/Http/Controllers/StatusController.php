<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientDetail;

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

    public function approve($ref_no)
    {
        $application = ClientDetail::select('fstatus_code')
                                    ->where('reference_no', $ref_no)
                                    ->get();
        //dd($application);
        
        if($application)
        {
            //dd($application);
           ClientDetail::where('reference_no', $ref_no)
                        ->update(['fstatus_code'=> 1]);

            return redirect()->back()->with('success','The application was approved successfully');
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
