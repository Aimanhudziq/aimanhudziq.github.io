<?php

namespace App\Http\Controllers;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function export()
    {
        return Excel::download(new ReportExport(), 'clients.xlsx');
    }
}
