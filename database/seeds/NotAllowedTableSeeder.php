<?php

use Illuminate\Database\Seeder;

class NotAllowedTableSeeder extends Seeder
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
                'fpolicy_no' => 'CB01',
                'desc' => 'Portraits of celebrities',
            ],
            [
                'fpolicy_no' => 'CB01',
                'desc' => 'Portraits of the cardholder as sole representation on the card front; 
                            not being part of a scene (=>card could be considered as an identity card)s',
            ],
            [
                'fpolicy_no' => 'CB02',
                'desc' => 'Portraits of celebrities',
            ],
            [
                'fpolicy_no' => 'CB02',
                'desc' => 'Passport photographs',
            ],
            [
                'fpolicy_no' => 'CB03',
                'desc' => 'Picture of a building as sole representation',
            ],
            [
                'fpolicy_no' => 'CB03',
                'desc' => 'Picture of the interior of a building if no permission (e.g. Versailles)',
            ],
            [
                'fpolicy_no' => 'CB04',
                'desc' => 'As sole representation on the card',
            ],
            [
                'fpolicy_no' => 'CB05',
                'desc' => 'Logos as main and sole representation',
            ],
            [
                'fpolicy_no' => 'CB05',
                'desc' => 'Portraits of celebrities',
            ],
            [
                'fpolicy_no' => 'CB05',
                'desc' => 'Logos that are too prominent',
            ],
            [
                'fpolicy_no' => 'CB05',
                'desc' => 'Logos of other banks, also if part of the (street) scene',
            ],
            [
                'fpolicy_no' => 'CB06',
                'desc' => 'Names as illustration',
            ],
            [
                'fpolicy_no' => 'CB06',
                'desc' => 'Names of other banks, payment organizations even if part of the (street) scene',
            ],
            [
                'fpolicy_no' => 'CB07',
                'desc' => 'Olympic marks, logos are prohibited',
            ],
            [
                'fpolicy_no' => 'CB08',
                'desc' => 'Names of others not being the customer',
            ],
            [
                'fpolicy_no' => 'CB09',
                'desc' => 'To be on the safe side preferably no text at all unless it is part of a scene (if text is shown, under the sole responsibility of the member)',
            ],
            [
                'fpolicy_no' => 'CB10',
                'desc' => 'Any wording not being part of the design',
            ],
            [
                'fpolicy_no' => 'CB11',
                'desc' => 'Picture of cartoon figure as sole representation (e.g. Mickey Mouse is not allowed)',
            ],
            [
                'fpolicy_no' => 'CB12',
                'desc' => '•	Pictures of politicians or pictures showing a political event of any nature (e.g. strikes, demonstrations)',
            ],
            [
                'fpolicy_no' => 'CB12',
                'desc' => 'Logos of political parties',
            ],
            [
                'fpolicy_no' => 'CB12',
                'desc' => 'Swastika or other political symbols',
            ],
            [
                'fpolicy_no' => 'CB13',
                'desc' => 'Racist text, wordings or symbols of any kind',
            ],
            [
                'fpolicy_no' => 'CB13',
                'desc' => 'Racist event, exhibitions, protests',
            ],
            [
                'fpolicy_no' => 'CB14',
                'desc' => 'Flags as sole representation',
            ],
            [
                'fpolicy_no' => 'CB15',
                'desc' => 'Pictures made for advertising purposes',
            ],
            [
                'fpolicy_no' => 'CB16',
                'desc' => 'Any picture of a scene that could hurt people belonging to another race',
            ],
            [
                'fpolicy_no' => 'CB17',
                'desc' => 'Pornographic illustrations',
            ],
            [
                'fpolicy_no' => 'CB17',
                'desc' => 'Any picture of a scene that could hurt people belonging to another race',
            ],
            [
                'fpolicy_no' => 'CB17',
                'desc' => 'Complete nudity (visible genitals, and/or no underwear) including babies and or children',
            ],
            [
                'fpolicy_no' => 'CB17',
                'desc' => 'Pictures of people with provocative underwear (lingerie)'
            ],
            [
                'fpolicy_no' => 'CB17',
                'desc' => 'Offending/obscene gestures, positions, scenes',
            ],
            [
                'fpolicy_no' => 'CB17',
                'desc' => 'Monokini',
            ],
            [
                'fpolicy_no' => 'CB18',
                'desc' => 'Pictures of terrorists and/or criminals',
            ],
            [
                'fpolicy_no' => 'CB18',
                'desc' => 'symbols and icons of terrorist organizations',
            ],

            [
                'fpolicy_no' => 'CB18',
                'desc' => 'fighting, bloods',
            ],

            [
                'fpolicy_no' => 'CB18',
                'desc' => 'Injured, mistreated people',
            ],

            [
                'fpolicy_no' => 'CB18',
                'desc' => 'Maltreated animals',
            ],

            [
                'fpolicy_no' => 'CB18',
                'desc' => 'gangs',
            ],

            [
                'fpolicy_no' => 'CB18',
                'desc' => 'Pictures promoting army',
            ],

            [
                'fpolicy_no' => 'CB19',
                'desc' => 'Gods, biblical illustrations',
            ],

            [
                'fpolicy_no' => 'CB19',
                'desc' => 'Pictures of clergymen',
            ],

            [
                'fpolicy_no' => 'CB19',
                'desc' => 'Religious symbols',
            ],

            [
                'fpolicy_no' => 'CB19',
                'desc' => 'Religious scenes (praying)',
            ],

            [
                'fpolicy_no' => 'CB19',
                'desc' => 'Processions, religious celebrations or events',
            ],

            [
                'fpolicy_no' => 'CB20',
                'desc' => 'Casinos',
            ],

            [
                'fpolicy_no' => 'CB20',
                'desc' => 'gambling machines',
            ],

            [
                'fpolicy_no' => 'CB20',
                'desc' => 'Lottery',
            ],
            [
                'fpolicy_no' => 'CB21',
                'desc' => 'Any picture that might be interpreted as promoting alcoholic beverages, smoking or taking drugs',
            ],
            [
                'fpolicy_no' => 'CB21',
                'desc' => 'Pictures showing bottles or glasses of alcohol, cigarettes (tobacco as a whole as sole representation',
            ],
            [
                'fpolicy_no' => 'CB21',
                'desc' => 'Picture of drugs (not even grass)',
            ],
            [
                'fpolicy_no' => 'CB21',
                'desc' => 'Scenes showing drunk people or people high on drugs',
            ],
            [
                'fpolicy_no' => 'CB22',
                'desc' => 'Card looks like a debit card or credit cards',
            ],
            [
                'fpolicy_no' => 'CB22',
                'desc' => 'Card looks like another bank card',
            ],

            [
                'fpolicy_no' => 'CB22',
                'desc' => 'Card looks like ID card',
            ],
            [
                'fpolicy_no' => 'CB23',
                'desc' => 'cards with one of the above mentioned prohibited or restricted images or contents',
            ],


        ]);
    }
}
