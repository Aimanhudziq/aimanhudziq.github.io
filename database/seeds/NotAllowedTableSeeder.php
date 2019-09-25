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
            [
                'fpolicy_no' => '106',
                'desc' => 'Names as illustration',
            ],
            [
                'fpolicy_no' => '106',
                'desc' => 'Names of other banks, payment organizations even if part of the (street) scene',
            ],
            [
                'fpolicy_no' => '107',
                'desc' => 'Olympic marks, logos are prohibited',
            ],
            [
                'fpolicy_no' => '108',
                'desc' => 'Names of others not being the customer',
            ],
            [
                'fpolicy_no' => '109',
                'desc' => 'To be on the safe side preferably no text at all unless it is part of a scene (if text is shown, under the sole responsibility of the member)',
            ],
            [
                'fpolicy_no' => '110',
                'desc' => 'Any wording not being part of the design',
            ],
            [
                'fpolicy_no' => '111',
                'desc' => 'Picture of cartoon figure as sole representation (e.g. Mickey Mouse is not allowed)',
            ],
            [
                'fpolicy_no' => '112',
                'desc' => '•	Pictures of politicians or pictures showing a political event of any nature (e.g. strikes, demonstrations)',
            ],
            [
                'fpolicy_no' => '112',
                'desc' => 'Logos of political parties',
            ],
            [
                'fpolicy_no' => '112',
                'desc' => 'Swastika or other political symbols',
            ],
            [
                'fpolicy_no' => '113',
                'desc' => 'Racist text, wordings or symbols of any kind',
            ],
            [
                'fpolicy_no' => '113',
                'desc' => 'Racist event, exhibitions, protests',
            ],
            [
                'fpolicy_no' => '114',
                'desc' => 'Flags as sole representation',
            ],
            [
                'fpolicy_no' => '115',
                'desc' => 'Pictures made for advertising purposes',
            ],
            [
                'fpolicy_no' => '116',
                'desc' => 'Any picture of a scene that could hurt people belonging to another race',
            ],
            [
                'fpolicy_no' => '117',
                'desc' => 'Pornographic illustrations',
            ],
            [
                'fpolicy_no' => '117',
                'desc' => 'Any picture of a scene that could hurt people belonging to another race',
            ],
            [
                'fpolicy_no' => '117',
                'desc' => 'Complete nudity (visible genitals, and/or no underwear) including babies and or children',
            ],
            [
                'fpolicy_no' => '117',
                'desc' => 'Pictures of people with provocative underwear (lingerie)'
            ],
            [
                'fpolicy_no' => '117',
                'desc' => 'Offending/obscene gestures, positions, scenes',
            ],
            [
                'fpolicy_no' => '117',
                'desc' => 'Monokini',
            ],
            [
                'fpolicy_no' => '118',
                'desc' => 'Pictures of terrorists and/or criminals',
            ],
            [
                'fpolicy_no' => '118',
                'desc' => 'symbols and icons of terrorist organizations',
            ],

            [
                'fpolicy_no' => '118',
                'desc' => 'fighting, bloods',
            ],

            [
                'fpolicy_no' => '118',
                'desc' => 'Injured, mistreated people',
            ],

            [
                'fpolicy_no' => '118',
                'desc' => 'Maltreated animals',
            ],

            [
                'fpolicy_no' => '118',
                'desc' => 'gangs',
            ],

            [
                'fpolicy_no' => '118',
                'desc' => 'Pictures promoting army',
            ],

            [
                'fpolicy_no' => '119',
                'desc' => 'Gods, biblical illustrations',
            ],

            [
                'fpolicy_no' => '119',
                'desc' => 'Pictures of clergymen',
            ],

            [
                'fpolicy_no' => '119',
                'desc' => 'Religious symbols',
            ],

            [
                'fpolicy_no' => '119',
                'desc' => 'Religious scenes (praying)',
            ],

            [
                'fpolicy_no' => '119',
                'desc' => 'Processions, religious celebrations or events',
            ],

            [
                'fpolicy_no' => '120',
                'desc' => 'Casinos',
            ],

            [
                'fpolicy_no' => '120',
                'desc' => 'gambling machines',
            ],

            [
                'fpolicy_no' => '120',
                'desc' => 'Lottery',
            ],
            [
                'fpolicy_no' => '121',
                'desc' => 'Any picture that might be interpreted as promoting alcoholic beverages, smoking or taking drugs',
            ],
            [
                'fpolicy_no' => '121',
                'desc' => 'Pictures showing bottles or glasses of alcohol, cigarettes (tobacco as a whole as sole representation',
            ],
            [
                'fpolicy_no' => '121',
                'desc' => 'Picture of drugs (not even grass)',
            ],
            [
                'fpolicy_no' => '121',
                'desc' => 'Scenes showing drunk people or people high on drugs',
            ],
            [
                'fpolicy_no' => '122',
                'desc' => 'Card looks like a debit card or credit cards',
            ],
            [
                'fpolicy_no' => '122',
                'desc' => 'Card looks like another bank card',
            ],

            [
                'fpolicy_no' => '122',
                'desc' => 'Card looks like ID card',
            ],
            [
                'fpolicy_no' => '123',
                'desc' => 'cards with one of the above mentioned prohibited or restricted images or contents',
            ],


        ]);
    }
}
