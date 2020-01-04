<?php

use Illuminate\Database\Seeder;

class DemoUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('demo_users')->get()->count() < 1){
            DB::table('demo_users')->insert([
                [
                    'username' => 'guest',
                    'email'=>'guest@gmail.com',
                    'password' => \Hash::make('guest009@'),
                ]
            ]);
        }
    }
}
