<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\ArrayToXml\ArrayToXml;
use Carbon\Carbon;
use App\ClientDetail;
use App\BankBranch;
use Hash, Str, SSH;

class DailyReportASCC extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dailyreport:ascc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a daily report to ASCC';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $timestamp = Carbon::now();
        $current_time = $timestamp->toTimeString();
        $current_date = $timestamp->toDateString();

        $approved = ClientDetail::where('fstatus_code',['1'])->count();
        $rejected = ClientDetail::where('fstatus_code',['0'])->count();
                 
        $clients = ClientDetail::with('track_record')->get();

        $xml_data_structure = [
            'header'=>[
                'filetype'=>'SCRNRPT',
                'customer'=>'maybank',
                'date'=>$current_date,
                'time'=>$current_time,
                'identifier'=>Hash::make(Str::random(32)),
                'responseCount'=>[
                    'finalState'=>[
                        'ACCEPTED'=>$approved,
                        'REJECTED'=>$rejected,
                    ],
                ],
            ],
            'content' => [
                'final' => [
                    'finalPicture'=>[
                        
                    ],
                ],
            ],
        ];

        foreach($clients as $data){
            /*
           foreach($data->track_record as $dc)
           {
               dd($dc->comment);
           }*/
            $status="";
            $reason="";
            if($data->fstatus_code == 0){
                $status = "REJECTED";
            }else if($data->fstatus_code == 1){
                $status = "ACCEPTED";
            }
            foreach($data->track_record as $dc){
               if($data->reference_no == $dc->freference_no && $data->fstatus_code == $dc->new_status_code)
               {
                   $reason = $dc->comment;
               }
            }
                    /****** get branch code************************* */
                    $banks = BankBranch::select('branch_code')
                    ->where('branch_address',trim($data->address))
                    ->where('fbank_code', $data->fbank_code)    
                    ->first();
                    /************************************************ */  

            $clientobj = [
                    'pictureId'=>$data->ic_no,
                    'name'=>$data->full_name,
                    'state'=>$status,
                    'cardtype'=>'maybank',
                    'pictureReasons'=>[
                        'reason'=>$reason
                    ],
                    'additionalData'=>[
                        'property'=>[
                            [
                                ['_attributes'=>[
                                    'key'=>'mail',
                                    'value'=>$data->email,
                                    ]
                                ],
                            ],
                            [
                                ['_attributes'=>[
                                    'key'=>'idcardlast4digits',
                                    'value'=>substr($data->ic_no,7,4),
                                    ]
                                ],
                            ],
                            [
                                ['_attributes'=>[
                                    'key'=>'branch',
                                    'value'=>$banks->branch_code,
                                    ]
                                ],
                            ]
                        ],
                    ]
                ];
                array_push($xml_data_structure["content"]["final"]["finalPicture"], $clientobj);
        }
   
        $result = ArrayToXml::convert($xml_data_structure, [
            'rootElementName' => 'tns:scrnrpt',
            '_attributes' => [
                'xmlns:tns' => 'http://uri.gi-de.de/SCRNRPT/v202',
            ],
        ], true, 'UTF-8');

        \Storage::put('ReportMaybank/ascc_daily_report.xml', $result);
        //SSH::into('staging')->get($remotePath, $localPath);
    }
}
