<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientDetail;
use App\CardApplication;
use App\TrackRecord;
use Alert;
use Carbon\Carbon;

class StatusController extends Controller
{
    

    public function reject(Request $request, $ref_no)
    {
       // $policy = request()->get('policy');
       // $user = request()->get('currentuser');
        
       $this->validate($request,[
            'policy'=>'required',
            'comment'=>'required',
       ]);

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

                $card = new CardApplication;

                $policy = implode(",",(array)request()->get('policy'));
                
                for($i = 0; $i < count($request->get('policy')); $i++)
                {
                    $card->comment = $request->get('comment');
                    $card->violated_policy = $policy;
                    //$card->code_policy = $policy_no;
                }

                    $card->checked_by = request()->get('currentuser');
                    $card->fstatus_code = 0;
                    $card->fuser_staff_id = request()->get('currentuserID');
                    $card->fbank_code = request()->get('bank');
                    $card->status_change_datetime = Carbon::now();
                    $card->freference_no = request()->get('refNo');
                    $card->save();

                $log = new TrackRecord;

                $policy = implode(",",(array)request()->get('policy'));
                $policy_no = implode(",",(array)request()->get('policy_no'));

                for($i = 0; $i < count(request()->get('policy')); $i++)
                {
                
                    $log->violated_policy = $policy;
                    $log->code_policy = $policy_no;
                   
                }
 
                $log->comment = request()->get('comment');
                $log->freference_no = request()->get('refNo');
                $log->ori_status_code = 3;
                $log->new_status_code = 0;
                $log->save();

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

                $card = new CardApplication;

                $card->checked_by = request()->get('currentuser');
                $card->fstatus_code = 1;
                $card->fuser_staff_id = request()->get('currentuserID');
                $card->fbank_code = request()->get('bank');
                //$card->comment = 'Apa apa';
               // $card->violated_policy = null;
                $card->status_change_datetime = Carbon::now();
                $card->freference_no = request()->get('refNo');
                // dd($card->violated_policy);
                // dd($card->checked_by,$card->fstatus_code,$card->fuser_staff_id,
                // $card->fbank_code,$card->comment,$card->violated_policy,$card->status_change_datetime);
                $card->save();

                $log = new TrackRecord;

                $log->freference_no = request()->get('refNo');
                $log->ori_status_code = 3;
                $log->new_status_code = 1;
                $log->save();

                
                Alert::success('Application successfully approve', 'Approved Succeed!');
                return redirect()->back();
            }
        }
    }

    public function kiv(Request $request,$ref_no)
    {
        $this->validate($request,[
            'policy'=>'required',
            'comment'=>'required',
       ]);

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

                $card = new CardApplication;

                $policy = implode(",",(array)request()->get('policy'));
                
                for($i = 0; $i < count($request->get('policy')); $i++)
                {
                    
                    $card->comment = $request->get('comment');
                    $card->violated_policy = $policy;
                    
                    
                }

                    $card->checked_by = request()->get('currentuser');
                    $card->fstatus_code = 2;
                    $card->fuser_staff_id = request()->get('currentuserID');
                    $card->fbank_code = request()->get('bank');
                    $card->status_change_datetime = Carbon::now();
                    $card->freference_no = request()->get('refNo');
                    $card->save();
                
                $log = new TrackRecord;
                
                $policy = implode(",",(array)request()->get('policy'));
                $policy_no = implode(",",(array)request()->get('policy_no'));

                for($i = 0; $i < count(request()->get('policy')); $i++)
                {
                   
                    $log->violated_policy = $policy;
                    $log->code_policy = $policy_no;
                    
                }
                
                $log->comment = request()->get('comment');
                $log->freference_no = request()->get('refNo');
                $log->ori_status_code = 3;
                $log->new_status_code = 2;
                $log->save();
                
                            
                    Alert::success('Application successfully kiv', 'Kiv Succeed!');
                    return redirect()->back();
            }
        }
    }

    /**
     * Status controller for reviewer
     * only allowed Approve and Reject
     */

    public function rejectChecker(Request $request, $ref_no)
    {
        $this->validate($request,[
            'policy'=>'required',
            'comment'=>'required',
        ]);

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
            else{
                //$pol_no = implode(",",(array)request()->get('policy_no'));
                ClientDetail::where('reference_no', $ref_no)
                            ->update(['fstatus_code'=> 0]);

            $card = new CardApplication;

            $policy = implode(",",(array)request()->get('policy'));
            
            for($i = 0; $i < count($request->get('policy')); $i++)
            {
                
                $card->comment = $request->get('comment');
                $card->violated_policy = $policy;
               
            }
                $card->checked_by = request()->get('currentuser');
                $card->fstatus_code = 0;
                $card->fuser_staff_id = request()->get('currentuserID');
                $card->fbank_code = request()->get('bank');
                $card->status_change_datetime = Carbon::now();
                $card->freference_no = request()->get('refNo');

                $card->save();


            $log = new TrackRecord;

            $policy = implode(",",(array)request()->get('policy'));
            $policy_no = implode(",",(array)request()->get('policy_no'));

            for($i = 0; $i < count(request()->get('policy')); $i++)
            {
                
                $log->violated_policy = $policy;
                $log->code_policy = $policy_no;
               
            }

                $log->comment = request()->get('comment');
                $log->freference_no = request()->get('refNo');
                $log->ori_status_code = 2;
                $log->new_status_code = 0;
                //$log->code_policy = re;
                $log->save();

                Alert::success('Application succesfully reject!', 'Rejected Succeed!');
                return redirect()->back();
            }
            
        }
    }

    public function approveChecker($ref_no)
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
            else{
                ClientDetail::where('reference_no', $ref_no)
                            ->update(['fstatus_code'=> 1]);

                $card = new CardApplication;

                $card->checked_by = request()->get('currentuser');
                $card->fstatus_code = 1;
                $card->fuser_staff_id = request()->get('currentuserID');
                $card->fbank_code = request()->get('bank');
                // $card->comment = 'Apa apa';
                // $card->violated_policy = $policy;
                $card->status_change_datetime = Carbon::now();
                $card->freference_no = request()->get('refNo');
                // dd($card->violated_policy);
                $card->save();

                $log = new TrackRecord;

                $log->freference_no = request()->get('refNo');
                $log->ori_status_code = 2;
                $log->new_status_code = 1;
               // $log->violated_policy = $policy;
                //dd($log->freference_no,$log->ori_status_code,$log->new_status_code,$log->violated_policy);
                $log->save();
                

                Alert::success('Application successfully approve', 'Approved Succeed!');
                return redirect()->back();
            }
        }
    }

}
