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
                    'user_staff_id' => '123',
                    'first_name' => 'Jasvin',
                    'last_name' => 'Liyun',
                    'username' => 'mrjasvin',
                    'email' => 'jasvinliyun@yahoo.com',
                    'password' => \Hash::make('Mrjasvin009@'),
                    'user_type' => 'Admin',
                    'frole_code' => 1,
                ],
                [
                    'user_staff_id' => '5050',
                    'first_name' => 'Admin',
                    'last_name' => 'Modular',
                    'username' => 'admin',
                    'email' => 'admin@modular-corp.com',
                    'password' => \Hash::make('Admin009@'),
                    'user_type' => 'Admin',
                    'frole_code' => 1,
                ],
                [
                    'user_staff_id' => '12345',
                    'first_name' => 'Jurin',
                    'last_name' => 'Liyun',
                    'username' => 'mrjurin',
                    'email' => 'jurinliyun@yahoo.com',
                    'password' => \Hash::make('Mrjurin009@'),
                    'user_type' => 'Reviewer',
                    'frole_code' => 2,
                ],
                [
                    'user_staff_id' => '123456',
                    'first_name' => 'Jukvin',
                    'last_name' => 'Liyun',
                    'username' => 'mrjukvin',
                    'email' => 'jukvinliyun@yahoo.com',
                    'password' => \Hash::make('Mrjukvin009@'),
                    'user_type' => 'Normal User',
                    'frole_code' => 3,
                ],
                [
                    'user_staff_id' => '111',
                    'first_name' => 'Jukchin',
                    'last_name' => 'Liyun',
                    'username' => 'mrjukchin',
                    'email' => 'jukchin@yahoo.com',
                    'password' => \Hash::make('Mrjukchin009@'),
                    'user_type' => 'Normal User',
                    'frole_code' => 3,
                ]
                
            ]);
        }
        else{
            echo "Table data more than 5";
        }
    }
}
