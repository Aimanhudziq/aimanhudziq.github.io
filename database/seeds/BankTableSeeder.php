<?php

use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->delete();
            //$ran_num = substr(str_shuffle("0123456789"), 0, 3);

            DB::table('banks')->insert([
                [
                   'bank_code'=> substr(str_shuffle("0123456789"), 0, 3),
                   'bank_name'=>'maybank',
                ],
                [
                    'bank_code'=> substr(str_shuffle("0123456789"), 0, 3),
                    'bank_name'=>'cimb',
                ],
                [
                    'bank_code'=> substr(str_shuffle("0123456789"), 0, 3),
                    'bank_name'=>'rhb',
                ],
                [
                    'bank_code'=> substr(str_shuffle("0123456789"), 0, 3),
                    'bank_name'=>'mbsb',
                ],
                [
                    'bank_code'=> substr(str_shuffle("0123456789"), 0, 3),
                    'bank_name'=>'bank islam',
                ],
                [
                    'bank_code'=> substr(str_shuffle("0123456789"), 0, 3),
                    'bank_name'=>'public bank',
                ],
                [
                    'bank_code'=> substr(str_shuffle("0123456789"), 0, 3),
                    'bank_name'=>'muamalat',
                ],
    
            ]);
        
    }
}
