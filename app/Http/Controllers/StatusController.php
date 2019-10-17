<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientDetail;
use Alert;

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
        $status_code = ClientDetail::select('fstatus_code')
                                    ->where('reference_no', $ref_no)
                                    ->get();
        foreach($status_code as $sc)
        {
            if($sc->fstatus_code == 1)
            {
                Alert::error('Already approved the application', 'Error!');
                return back()->withInput();
            }
            else
            {
                ClientDetail::where('reference_no', $ref_no)
                            ->update(['fstatus_code'=> 1]);
                            
                Alert::success('successfully approved the application', 'Approved Succeed!');
                return redirect()->back();
            }
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
