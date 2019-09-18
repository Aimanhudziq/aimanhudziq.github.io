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
                'policy_no' => 'P101',
                'policy_name' => 'Cardholders picture/portrait',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => 'P102',
                'policy_name' => 'Portraits of third parties',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright and civil law',
            ],
            [
                'policy_no' => 'P103',
                'policy_name' => 'Outside/Inside buildings',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => 'P104',
                'policy_name' => 'Artworks(paintings, statues, song texts)',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => 'P105',
                'policy_name' => '(Company) Logos',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright, patent and trademark law',
            ],
            [
                'policy_no' => 'P106',
                'policy_name' => 'Company names',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright, patent and trademark law',
            ],
            [
                'policy_no' => 'P107',
                'policy_name' => 'Olympic Marks, logos, designation, or authentication statements',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright, trademark law',
            ],
            [
                'policy_no' => 'P108',
                'policy_name' => 'Names',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Patent, trademark law, civil law',
            ],
            [
                'policy_no' => 'P109',
                'policy_name' => 'Text/wording',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'P1010',
                'policy_name' => 'Poems, book text',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => 'P1011',
                'policy_name' => 'Cartoon figures',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => 'P1012',
                'policy_name' => 'Politicians, political symbols, logos of political parties',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'P1013',
                'policy_name' => 'Racist symbols or pictures',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'P1014',
                'policy_name' => 'Flags',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright (banners), member',
            ],
            [
                'policy_no' => 'P1015',
                'policy_name' => 'Cards, motorcycles, vehicles, clothes, advertising, commercials',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Patent, trademark law, civil law, MasterCard, Visa',
            ],
            [
                'policy_no' => 'P1016',
                'policy_name' => 'Personal or company data (address, phone nr., web address)',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => 'P1017',
                'policy_name' => 'Nudity, any sexual related matter',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'P1018',
                'policy_name' => 'Mistreatment, violence',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'P1019',
                'policy_name' => 'Religious pictures/symbols',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'P1020',
                'policy_name' => 'Gambling scenes or places',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'P1021',
                'policy_name' => 'Alcohol, tobacco, drugs, medicines',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => 'P1022',
                'policy_name' => 'Pictures which might bring confusion (card would look like it has a different function) names',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => 'P1023',
                'policy_name' => 'Pictures which might bring negative impact to the payment organization brand',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => '-',
            ],
            
        ]);
    }
}
