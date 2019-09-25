<?php

use Illuminate\Database\Seeder;

class AllowedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alloweds')->insert([
            [
                'fpolicy_no' => '101',
                'desc' => 'Portraits of people not being celebrities, unless the celebrity is the customer',
            ],
            [
                'fpolicy_no' => '102',
                'desc' => 'Portraits of people not being celebrities (friends, family colleagues)',
            ],
            [
                'fpolicy_no' => '102',
                'desc' => 'Pictures of adults/kids posing with celebrities e.g. posing with one idol => Permission from celebrity is required!',
            ],
            [
                'fpolicy_no' => '103',
                'desc' => 'Own building/house',
            ],
            [
                'fpolicy_no' => '103',
                'desc' => 'As part of a (street) scene',
            ],
            [
                'fpolicy_no' => '103',
                'desc' => 'As background of a portrait picture',
            ],
            [
                'fpolicy_no' => '104',
                'desc' => 'As background of a picture (e.g. in a museum)',
            ],
            [
                'fpolicy_no' => '104',
                'desc' => 'As part of a (street) scene',
            ],
            [
                'fpolicy_no' => '104',
                'desc' => 'Childs drawing',
            ],
            [
                'fpolicy_no' => '104',
                'desc' => 'By an artist deceased longer than 70 years ago (e.g. Rembrandt, Van Gogh, Monet)',
            ],
            [
                'fpolicy_no' => '105',
                'desc' => 'Logos as part of a (street) scene, unless the logo is from another bank/payment organization',
            ],
            [
                'fpolicy_no' => '106',
                'desc' => 'Names as part of a (street) scene, unless the logo is from another bank/payment organization',
            ],
            [
                'fpolicy_no' => '108',
                'desc' => 'Cardholders name (not allowed as part of the design)',
            ],
            [
                'fpolicy_no' => '111',
                'desc' => 'Pictures of adults/children together with animated cartoon figures (e.g. made in Disneyland)',
            ],
            [
                'fpolicy_no' => '111',
                'desc' => 'Make sure cardholder is prominent (no picture showing a huge cartoon figure and a very small cardholder)',
            ],
            [
                'fpolicy_no' => '114',
                'desc' => 'Flags a s part of a street scene',
            ],
            [
                'fpolicy_no' => '115',
                'desc' => 'Car/motorcycle/boat/plane or any other vehicle as part of a (street) scene',
            ],
            [
                'fpolicy_no' => '115',
                'desc' => 'Other products as part of a (street) scene',
            ],
            [
                'fpolicy_no' => '116',
                'desc' => 'Personal phone number or web address as part of a scene',
            ],
            [
                'fpolicy_no' => '117',
                'desc' => 'Decent holiday pictures of cardholder relatives or other people in bikini/swimsuit',
            ],
            [
                'fpolicy_no' => '118',
                'desc' => 'Illustrations of military tanks, planes when part of an air show or military exhibition or event',
            ],
            [
                'fpolicy_no' => '118',
                'desc' => 'Portrait of someone in military outfit (also part of a scene or doing his military service)',
            ],

            [
                'fpolicy_no' => '119',
                'desc' => 'Cardholder in front of a religious monument church, temple, cathedral etc. (for tourism purposes only e.g. in front of Notre Dame de Paris)',
            ],

            [
                'fpolicy_no' => '121',
                'desc' => 'Decent pictures of cardholder or people drinking or smoking provided it is part of a scene (terrace on a street, party, toast)',
            ],

        ]);
    }
}
