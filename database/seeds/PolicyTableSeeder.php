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
                'policy_no' => '101',
                'policy_name' => 'Cardholders picture/portrait',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => '102',
                'policy_name' => 'Portraits of third parties',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright and civil law',
            ],
            [
                'policy_no' => '103',
                'policy_name' => 'Outside/Inside buildings',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => '104',
                'policy_name' => 'Artworks(paintings, statues, song texts)',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => '105',
                'policy_name' => '(Company) Logos',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright, patent and trademark law',
            ],
            [
                'policy_no' => '106',
                'policy_name' => 'Company names',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright, patent and trademark law',
            ],
            [
                'policy_no' => '107',
                'policy_name' => 'Olympic Marks, logos, designation, or authentication statements',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright, trademark law',
            ],
            [
                'policy_no' => '108',
                'policy_name' => 'Names',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Patent, trademark law, civil law',
            ],
            [
                'policy_no' => '109',
                'policy_name' => 'Text/wording',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => '110',
                'policy_name' => 'Poems, book text',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => '111',
                'policy_name' => 'Cartoon figures',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => '112',
                'policy_name' => 'Politicians, political symbols, logos of political parties',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => '113',
                'policy_name' => 'Racist symbols or pictures',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => '114',
                'policy_name' => 'Flags',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright (banners), member',
            ],
            [
                'policy_no' => '115',
                'policy_name' => 'Cards, motorcycles, vehicles, clothes, advertising, commercials',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Patent, trademark law, civil law, MasterCard, Visa',
            ],
            [
                'policy_no' => '116',
                'policy_name' => 'Personal or company data (address, phone nr., web address)',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'Copyright',
            ],
            [
                'policy_no' => '117',
                'policy_name' => 'Nudity, any sexual related matter',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => '118',
                'policy_name' => 'Mistreatment, violence',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => '119',
                'policy_name' => 'Religious pictures/symbols',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => '120',
                'policy_name' => 'Gambling scenes or places',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => '121',
                'policy_name' => 'Alcohol, tobacco, drugs, medicines',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => 'MasterCard, Visa',
            ],
            [
                'policy_no' => '122',
                'policy_name' => 'Pictures which might bring confusion (card would look like it has a different function) names',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => '-',
            ],
            [
                'policy_no' => '123',
                'policy_name' => 'Pictures which might bring negative impact to the payment organization brand',
                'policy_source' => 'MC/Visa',
                'policy_regulation' => '-',
            ],
            
        ]);
    }
}
