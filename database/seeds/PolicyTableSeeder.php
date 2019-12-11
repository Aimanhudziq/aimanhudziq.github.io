<?php

use Illuminate\Database\Seeder;

class PolicyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('policies')->insert([
            [
                'policy_no' => 'CB01',
                'policy_name' => 'Cardholders picture/portrait',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => 'CB02',
                'policy_name' => 'Portraits of third parties',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright and civil law',
            ],
            [
                'policy_no' => 'CB03',
                'policy_name' => 'Outside/Inside buildings',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => 'CB04',
                'policy_name' => 'Artworks(paintings, statues, song texts)',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => 'CB05',
                'policy_name' => '(Company) Logos',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright, patent and trademark law',
            ],
            [
                'policy_no' => 'CB06',
                'policy_name' => 'Company names',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright, patent and trademark law',
            ],
            [
                'policy_no' => 'CB07',
                'policy_name' => 'Olympic Marks, logos, designation, or authentication statements',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright, trademark law',
            ],
            [
                'policy_no' => 'CB08',
                'policy_name' => 'Names',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Patent, trademark law, civil law',
            ],
            [
                'policy_no' => 'CB09',
                'policy_name' => 'Text/wording',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'CB10',
                'policy_name' => 'Poems, book text',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => 'CB11',
                'policy_name' => 'Cartoon figures',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => 'CB12',
                'policy_name' => 'Politicians, political symbols, logos of political parties',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'CB13',
                'policy_name' => 'Racist symbols or pictures',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'CB14',
                'policy_name' => 'Flags',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright (banners), member',
            ],
            [
                'policy_no' => 'CB15',
                'policy_name' => 'Cards, motorcycles, vehicles, clothes, advertising, commercials',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Patent, trademark law, civil law, MasterCard, Visa',
            ],
            [
                'policy_no' => 'CB16',
                'policy_name' => 'Personal or company data (address, phone nr., web address)',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => 'CB17',
                'policy_name' => 'Nudity, any sexual related matter',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'CB18',
                'policy_name' => 'Mistreatment, violence',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'CB19',
                'policy_name' => 'Religious pictures/symbols',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'CB20',
                'policy_name' => 'Gambling scenes or places',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'CB21',
                'policy_name' => 'Alcohol, tobacco, drugs, medicines',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'CB22',
                'policy_name' => 'Pictures which might bring confusion (card would look like it has a different function) names',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'CB23',
                'policy_name' => 'Pictures which might bring negative impact to the payment organization brand',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R901',
                'policy_name' => 'Passport or identification photograph',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R902',
                'policy_name' => 'Telephone number',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R903',
                'policy_name' => 'Writing',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R904',
                'policy_name' => 'E-mail or web address',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R905',
                'policy_name' => 'Business card,name,address',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R911',
                'policy_name' => 'Publicly known person',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R921',
                'policy_name' => 'Company logo, company or brand name, trade mark',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R922',
                'policy_name' => 'Artwork not older than 70 years',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R923',
                'policy_name' => 'Ensign or other national symbols, emblems, erbs',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R927',
                'policy_name' => 'Entertainment - movies, games, cartoons and others',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R925',
                'policy_name' => 'Olympic symbols',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R924',
                'policy_name' => 'Political statements, symbols, organizations or parties',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R926',
                'policy_name' => 'Religious statements, symbols, organization or parties',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R931',
                'policy_name' => 'War, weapons, military motives',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R932',
                'policy_name' => 'Force and fear, person with injuries or dead bodies',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R933',
                'policy_name' => 'Racist motives',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R941',
                'policy_name' => 'Unsuitable motive',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R951',
                'policy_name' => 'Unknowable languages',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R961',
                'policy_name' => 'Monochrome design',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R971',
                'policy_name' => 'Design causes unfavourable or hostile perception of KB brand',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R972',
                'policy_name' => 'Design in conflict with the card associations rules',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R973',
                'policy_name' => 'Advertising or promotional material',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R974',
                'policy_name' => 'Required security features of the Card are interfered',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'R975',
                'policy_name' => 'Branded products',
                'policy_source' => '-',
                'policy_regulation' => '-',
            ],
            
        ]);
    }
}
