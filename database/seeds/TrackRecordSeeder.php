<?php

use Illuminate\Database\Seeder;

class TrackRecordSeeder extends Seeder
{
    public $timestamps = true;
    
    public function run()
    {
        DB::table('track_records')->insert([
            [
                'freference_no' => '2001',
                'policy_name' => 'Cardholders picture/portrait',
                'status' => 'KIV',
            ],
            [
                'freference_no' => '2002',
                'policy_name' => 'Cardholders picture/portrait',
                'status' => 'KIV',
            ],
            [
                'freference_no' => '2002',
                'policy_name' => 'Cardholders picture/portrait',
                'status' => 'KIV',
            ]
        ]);
    }
}
