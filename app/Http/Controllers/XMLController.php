<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\ArrayToXml\ArrayToXml;
use Carbon\Carbon;
use App\ClientDetail;
use App\BankBranch;
use Hash, Str, File, Storage;

class XMLController extends Controller
{
    

    public function arrayToXML()
    {
        $timestamp = Carbon::now();
        $current_time = $timestamp->toTimeString();
        $current_date = $timestamp->toDateString();

        $approved = ClientDetail::where('fstatus_code',['1'])->count();
        $rejected = ClientDetail::where('fstatus_code',['0'])->count();
                 
        $clients = ClientDetail::with('track_record')->get();

        //dd($clients[0]);

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

            $latestlog=$data->track_record->count()>= 1 ? $data->track_record[sizeof($data->track_record)-1]:null;
            $policy_code = $latestlog == null ? '' : $latestlog->code_policy;
            //dd($policy_code);

            $status="";
            $reason="";
            if($data->fstatus_code == 0){
                $status = "REJECTED";
            }else if($data->fstatus_code == 1){
                $status = "ACCEPTED";
            }

            $clientobj = [
                    'pictureId'=>$data->reference_no,
                    'name'=>$data->reference_no.'.png',
                    'state'=>$status,
                    'cardtype'=>'maybank',
                    'pictureReasons'=>[
                        'reason'=>$policy_code
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
                                    'value'=>$data->ic_no,
                                    ]
                                ],
                            ],
                            [
                                ['_attributes'=>[
                                    'key'=>'branch',
                                    'value'=>$data->branch_code,
                                    ]
                                ],
                            ]
                        ],
                    ]
                ];
                array_push($xml_data_structure["content"]["final"]["finalPicture"], $clientobj);
        }//foreach
   
    //dd($xml_data_structure);
        $result = ArrayToXml::convert($xml_data_structure, [
            'rootElementName' => 'tns:scrnrpt',
            '_attributes' => [
                'xmlns:tns' => 'http://uri.gi-de.de/SCRNRPT/v202',
            ],
        ], true, 'UTF-8');
        
        return $result;
        //dd($result);
        //$test = $result->put('test.xml');
    }

    public function downloadXML(){
        
        $file = $this->arrayToXML();

        return response()->attachment($file);
        
    }
    
}
