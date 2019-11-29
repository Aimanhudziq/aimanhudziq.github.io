<?php

namespace App\Exports;

//use /DB as DB;
use App\ClientDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $client =  ClientDetail::select('id','reference_no','full_name',
                                    'email','phone_number',
                                    'ic_no','address')->get();
        return $client;
    }

    public function headings(): array
    {
        return [
            '#',
            'Reference No',
            'Full Name',
            'Email',
            'Phone Number',
            'NRIC',
            'Address',
        ];
    }
    
}
