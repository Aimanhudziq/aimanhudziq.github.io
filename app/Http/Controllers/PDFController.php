<?php

namespace App\Http\Controllers;
use App\ClientDetail;
use Illuminate\Http\Request;
use PDF;
use DB;

class PDFController extends Controller
{

    //display data 
    // function index()
    // {
    //  $customer_data = $this->get_customer_data();
    //  return view('htmlPDF')->with('customer_data', $customer_data);
    // }

    //ambik 10 data
    function get_data()
    {
     $data = DB::table('client_details')
         ->get();
    //dd($data);
     return $data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_data_to_html());
     return $pdf->download('data.pdf');

    }

    function convert_data_to_html()
    {
     $data = $this->get_data();
     $output = '
     <h3 align="center">Client Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:10px;" width="10%">Id</th>
    <th style="border: 1px solid; padding:10px;" width="15%">Reference Number</th>
    <th style="border: 1px solid; padding:10px;" width="20%">Full Name</th>
    <th style="border: 1px solid; padding:10px;" width="15%">Email</th>
    <th style="border: 1px solid; padding:10px;" width="15%">Phone Number</th>
    <th style="border: 1px solid; padding:10px;" width="15%">Ic Number</th>
    <th style="border: 1px solid; padding:10px;" width="20%">Address</th>
   </tr>
     ';  
     foreach($data as $d)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:10px; font-size:15px;">'.$d->id.'</td>
       <td style="border: 1px solid; padding:10px; font-size:15px;">'.$d->reference_no.'</td>
       <td style="border: 1px solid; padding:10px; font-size:15px;">'.$d->full_name.'</td>
       <td style="border: 1px solid; padding:10px; font-size:15px;">'.$d->email.'</td>
       <td style="border: 1px solid; padding:10px; font-size:15px;">'.$d->phone_number.'</td>
       <td style="border: 1px solid; padding:10px; font-size:15px;">'.$d->ic_no.'</td>
       <td style="border: 1px solid; padding:10px; font-size:15px;">'.$d->address.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
}
