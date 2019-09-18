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
                    'user_id' => '123',
                    'first_name' => 'Jasvin',
                    'last_name' => 'Liyun',
                    'username' => 'mrjasvin',
                    'email' => 'jasvinliyun@yahoo.com',
                    'password' => 'mrjasvin',
                    'user_type' => 'Admin',
                    'frole_id' => 1,
                ],
                [
                    'user_id' => '12345',
                    'first_name' => 'Jurin',
                    'last_name' => 'Liyun',
                    'username' => 'mrjurin',
                    'email' => 'jurinliyun@yahoo.com',
                    'password' => '12345',
                    'user_type' => 'Reviewer',
                    'frole_id' => 2,
                ],
                [
                    'user_id' => '123456',
                    'first_name' => 'Jukvin',
                    'last_name' => 'Liyun',
                    'username' => 'mrjukvin',
                    'email' => 'jukvinliyun@yahoo.com',
                    'password' => '12345',
                    'user_type' => 'Normal User',
                    'frole_id' => 3,
                ]
                
            ]);
        }
        else{
            echo "Table data more than 5";
        }
    }
}
