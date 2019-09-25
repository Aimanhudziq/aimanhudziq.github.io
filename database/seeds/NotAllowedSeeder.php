<?php

use Illuminate\Database\Seeder;

class NotAllowedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('not_alloweds')->insert([
            [
                'fpolicy_no' => '101',
                'desc' => 'Portraits of celebrities',
            ],
            [
                'fpolicy_no' => '101',
                'desc' => 'Portraits of the cardholder as sole representation on the card front; 
                            not being part of a scene (=>card could be considered as an identity card)s',
            ],
            [
                'fpolicy_no' => '102',
                'desc' => 'Portraits of celebrities',
            ],
            [
                'fpolicy_no' => '102',
                'desc' => 'Passport photographs',
            ],
            [
                'fpolicy_no' => '103',
                'desc' => 'Picture of a building as sole representation',
            ],
            [
                'fpolicy_no' => '103',
                'desc' => 'Picture of the interior of a building if no permission (e.g. Versailles)',
            ],
            [
                'fpolicy_no' => '104',
                'desc' => 'As sole representation on the card',
            ],
            [
                'fpolicy_no' => '105',
                'desc' => 'Logos as main and sole representation',
            ],
            [
                'fpolicy_no' => '105',
                'desc' => 'Portraits of celebrities',
            ],
            [
                'fpolicy_no' => '105',
                'desc' => 'Logos that are too prominent',
            ],
            [
                'fpolicy_no' => '105',
                'desc' => 'Logos of other banks, also if part of the (street) scene',
            ],
        ]);
    }
}
