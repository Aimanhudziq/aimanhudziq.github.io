<?php

use Illuminate\Database\Seeder;

class BankBranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('bank_branches')->insert([

            [
                'branch_code'=>'1001',
                'branch_name'=>'Butterworth, Penang, Malaysia',
                'branch_address'=>'Butterworth, Penang, Malaysia',
                'branch_city'=>'Butterworth, Penang, Malaysia',
                'fbank_code'=>'101'
            ],
            [
                'branch_code'=>'1002',
                'branch_name'=>'Ipoh Perak',
                'branch_address'=>'Ipoh Perak',
                'branch_city'=>'Ipoh Perak',
                'fbank_code'=>'101'
            ],
            [
                'branch_code'=>'1003',
                'branch_name'=>'Johor Bahru Johor',
                'branch_address'=>'Johor Bahru Johor',
                'branch_city'=>'Johor Bahru Johor',
                'fbank_code'=>'101'
            ],
            [
                'branch_code'=>'1004',
                'branch_name'=>'Kota Kinabalu Sabah',
                'branch_address'=>'Kota Kinabalu Sabah',
                'branch_city'=>'Kota Kinabalu Sabah',
                'fbank_code'=>'101'
            ],
            
       ]);
    }
}
