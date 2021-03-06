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
                'fpolicy_no' => 'CB01',
                'desc' => 'Portraits of people not being celebrities, unless the celebrity is the customer',
            ],
            [
                'fpolicy_no' => 'CB02',
                'desc' => 'Portraits of people not being celebrities (friends, family colleagues)',
            ],
            [
                'fpolicy_no' => 'CB02',
                'desc' => 'Pictures of adults/kids posing with celebrities e.g. posing with one idol => Permission from celebrity is required!',
            ],
            [
                'fpolicy_no' => 'CB03',
                'desc' => 'Own building/house',
            ],
            [
                'fpolicy_no' => 'CB03',
                'desc' => 'As part of a (street) scene',
            ],
            [
                'fpolicy_no' => 'CB03',
                'desc' => 'As background of a portrait picture',
            ],
            [
                'fpolicy_no' => 'CB04',
                'desc' => 'As background of a picture (e.g. in a museum)',
            ],
            [
                'fpolicy_no' => 'CB04',
                'desc' => 'As part of a (street) scene',
            ],
            [
                'fpolicy_no' => 'CB04',
                'desc' => 'Childs drawing',
            ],
            [
                'fpolicy_no' => 'CB04',
                'desc' => 'By an artist deceased longer than 70 years ago (e.g. Rembrandt, Van Gogh, Monet)',
            ],
            [
                'fpolicy_no' => 'CB05',
                'desc' => 'Logos as part of a (street) scene, unless the logo is from another bank/payment organization',
            ],
            [
                'fpolicy_no' => 'CB06',
                'desc' => 'Names as part of a (street) scene, unless the logo is from another bank/payment organization',
            ],
            [
                'fpolicy_no' => 'CB08',
                'desc' => 'Cardholders name (not allowed as part of the design)',
            ],
            [
                'fpolicy_no' => 'CB11',
                'desc' => 'Pictures of adults/children together with animated cartoon figures (e.g. made in Disneyland)',
            ],
            [
                'fpolicy_no' => 'CB11',
                'desc' => 'Make sure cardholder is prominent (no picture showing a huge cartoon figure and a very small cardholder)',
            ],
            [
                'fpolicy_no' => 'CB14',
                'desc' => 'Flags a s part of a street scene',
            ],
            [
                'fpolicy_no' => 'CB15',
                'desc' => 'Car/motorcycle/boat/plane or any other vehicle as part of a (street) scene',
            ],
            [
                'fpolicy_no' => 'CB15',
                'desc' => 'Other products as part of a (street) scene',
            ],
            [
                'fpolicy_no' => 'CB16',
                'desc' => 'Personal phone number or web address as part of a scene',
            ],
            [
                'fpolicy_no' => 'CB17',
                'desc' => 'Decent holiday pictures of cardholder relatives or other people in bikini/swimsuit',
            ],
            [
                'fpolicy_no' => 'CB18',
                'desc' => 'Illustrations of military tanks, planes when part of an air show or military exhibition or event',
            ],
            [
                'fpolicy_no' => 'CB18',
                'desc' => 'Portrait of someone in military outfit (also part of a scene or doing his military service)',
            ],

            [
                'fpolicy_no' => 'CB19',
                'desc' => 'Cardholder in front of a religious monument church, temple, cathedral etc. (for tourism purposes only e.g. in front of Notre Dame de Paris)',
            ],

            [
                'fpolicy_no' => 'CB21',
                'desc' => 'Decent pictures of cardholder or people drinking or smoking provided it is part of a scene (terrace on a street, party, toast)',
            ],

        ]);
    }
}
