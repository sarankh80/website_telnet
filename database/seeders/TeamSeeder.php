<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name_km' => 'លោក ណេត សុគន្ធធារ៉ក់',
                'name_en' => 'Mr. Neth Sokunthearak',
                'position_km' => 'អគ្គនាយក (Chief Executive Officer)',
                'position_en' => 'Chief Executive Officer (CEO)',
                'phone' => '012 675 775',
                'email' => 'nethsokunthearak@telnet.com.kh',
                'telegram' => '@ceo_thearak',
                'is_ceo' => true,
                'sort_order' => 1,
            ],
            [
                'name_km' => 'លោក ណេត សុគន្ធធារិទ្ធ',
                'name_en' => 'Mr. Neth Sokunthearith',
                'position_km' => 'អគ្គនាយករង & ប្រធានហិរញ្ញវត្ថុ',
                'position_en' => 'Deputy CEO & Chief Financial Officer',
                'phone' => '081 687 697',
                'email' => 'neth.sokunthearith@telnet.com.kh',
                'sort_order' => 2,
            ],
            [
                'name_km' => 'លោកស្រី ណេត សូនេតា',
                'name_en' => 'Ms. Neth Soneta',
                'position_km' => 'ប្រធានផ្នែកប្រតិបត្តិការអាជីវកម្ម',
                'position_en' => 'Head of Business Operations',
                'sort_order' => 3,
            ],
            [
                'name_km' => 'លោក នី សាវណ្ណ',
                'name_en' => 'Mr. Ny Savann',
                'position_km' => 'ប្រធានផ្នែក NOC & IT',
                'position_en' => 'Head of NOC & IT Department',
                'phone' => '088 891 6667',
                'email' => 'ny.savann@telnet.com.kh',
                'sort_order' => 4,
            ],
            [
                'name_km' => 'លោកស្រី គឹម ផល្លិកា',
                'name_en' => 'Ms. Kim Phallika',
                'position_km' => 'ប្រធានផ្នែកលក់ និងទីផ្សារ',
                'position_en' => 'Head of Sales & Marketing',
                'sort_order' => 5,
            ],
            [
                'name_km' => 'លោកស្រី ម៉ុល សុភ័ស្ត្រ',
                'name_en' => 'Ms. Mol Sophastr',
                'position_km' => 'ប្រធានផ្នែកធនធានមនុស្ស',
                'position_en' => 'Head of Human Resources',
                'sort_order' => 6,
            ],
            [
                'name_km' => 'លោក ឈៀង ពេជ្រ',
                'name_en' => 'Mr. Chheang Pich',
                'position_km' => 'អ្នកជំនាញ ICT & Enterprise Solutions',
                'position_en' => 'ICT & Enterprise Solutions Specialist',
                'sort_order' => 7,
            ],
        ];

        foreach ($members as $member) {
            Team::firstOrCreate(['name_km' => $member['name_km']], $member);
        }
    }
}
