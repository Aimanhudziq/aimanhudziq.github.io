<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientDetail;
use Alert;

class StatusController extends Controller
{

    public function reject($ref_no)
    {
        $status_code = ClientDetail::select('fstatus_code')
                                    ->where('reference_no', $ref_no)
                                    ->get();
        foreach($status_code as $sc)
        {
            if($sc->fstatus_code == 0)
            {
                Alert::error('Application already rejected!', 'Error!');
                return back()->withInput();
            }
            else if($sc->fstatus_code == 1)
            {
                Alert::error('Application already approved!', 'Error!');
                return back()->withInput();
            }
            else if($sc->fstatus_code == 2)
            {
                Alert::error('Application already kiv!', 'Error!');
                return back()->withInput();
            }
            else{
                ClientDetail::where('reference_no', $ref_no)
                            ->update(['fstatus_code'=> 0]);

                Alert::success('Application succesfully reject!', 'Rejected Succeed!');
                return redirect()->back();
            }
            
        }
    }

    public function approve($ref_no)
    {
        $status_code = ClientDetail::select('fstatus_code')
                                    ->where('reference_no', $ref_no)
                                    ->get();
        foreach($status_code as $sc)
        {
            if($sc->fstatus_code == 0)
            {
                Alert::error('Application already rejected!', 'Error!');
                return back()->withInput();
            }
            else if($sc->fstatus_code == 1)
            {
                Alert::error('Application already approved!', 'Error!');
                return back()->withInput();
            }
            else if($sc->fstatus_code == 2)
            {
                Alert::error('Application already kiv!', 'Error!');
                return back()->withInput();
            }
            else{
                ClientDetail::where('reference_no', $ref_no)
                            ->update(['fstatus_code'=> 1]);

                Alert::success('Application successfully approve', 'Approved Succeed!');
                return redirect()->back();
            }
        }
    }

    public function kiv($ref_no)
    {
        $status_code = ClientDetail::select('fstatus_code')
                                    ->where('reference_no', $ref_no)
                                    ->get();
        foreach($status_code as $sc)
        {
            if($sc->fstatus_code == 0)
            {
                Alert::error('Application already rejected!', 'Error!');
                return back()->withInput();
            }
            else if($sc->fstatus_code == 1)
            {
                Alert::error('Application already approved!', 'Error!');
                return back()->withInput();
            }
            else if($sc->fstatus_code == 2)
            {
                Alert::error('Application already kiv!', 'Error!');
                return back()->withInput();
            }
            else{
                    ClientDetail::where('reference_no', $ref_no)
                            ->update(['fstatus_code'=> 2]);
                            
                    Alert::success('Application successfully kiv', 'Kiv Succeed!');
                    return redirect()->back();
            }
        }
    }


}
