<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role_code' => 1,
                'role_name' => 'Admin',
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'role_code' => 2,
                'role_name' => 'Reviewer',
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'role_code' => 3,
                'role_name' => 'Normal User',
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            
        ]);
    }
}
