<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            [
                'status_code' => 0,
                'description' => 'reject',
            ],
            [
                'status_code' => 1,
                'description' => 'approve',
            ],
            [
                'status_code' => 2,
                'description' => 'kiv',
            ],
            [
                'status_code' => 3,
                'description' => 'new',
            ],

        ]);
    }
}
