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
        DB::table('users')->insert([
            'user_id' => '1234',
            'first_name' => 'Jasvin',
            'last_name' => 'Liyun',
            'username' => 'mrjasvin',
            'email' => 'jasvinliyun@yahoo.com',
            'password' => '12345',
            'user_type' => 'admin',
            'frole_id' => 1,
        ]);
    }
}
