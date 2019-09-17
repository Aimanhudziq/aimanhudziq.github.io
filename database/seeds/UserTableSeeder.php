<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->get()->count() < 5){
            DB::table('users')->insert([
                [
                    'user_id' => '12345',
                    'first_name' => 'Jurin',
                    'last_name' => 'Liyun',
                    'username' => 'mrjurin',
                    'email' => 'jurinliyun@yahoo.com',
                    'password' => '12345',
                    'user_type' => 'reviewer',
                    'frole_id' => 2,
                ],
                [
                    'user_id' => '123456',
                    'first_name' => 'Jukvin',
                    'last_name' => 'Liyun',
                    'username' => 'mrjukvin',
                    'email' => 'jukvinliyun@yahoo.com',
                    'password' => '12345',
                    'user_type' => 'normal_user',
                    'frole_id' => 3,
                ]
                
            ]);
        }
        else{
            echo "Table is not empty";
        }
    }
}
