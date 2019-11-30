<?php

namespace App\Http\Controllers;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use App\ClientDetail;

use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function userReport() {

        // $model = new ClientDetail;
        // $table = $model->getTable();
        // dd($table);

        return view('users.user_report');
        
    }

    public function export()
    {
        return Excel::download(new ReportExport(), 'clients.xlsx');
    }


}
