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
            /**
             * Bank code should be fix
             */
            DB::table('banks')->insert([
                [
                   'bank_code'=> 101,
                   'bank_name'=>'maybank',
                ],
                [
                    'bank_code'=> 102,
                    'bank_name'=>'cimb',
                ],
                [
                    'bank_code'=> 103,
                    'bank_name'=>'rhb',
                ],
                [
                    'bank_code'=> 104,
                    'bank_name'=>'mbsb',
                ],
                [
                    'bank_code'=> 105,
                    'bank_name'=>'bank islam',
                ],
                [
                    'bank_code'=> 106,
                    'bank_name'=>'public bank',
                ],
                [
                    'bank_code'=> 107,
                    'bank_name'=>'muamalat',
                ],
    
            ]);
        
    }
}
