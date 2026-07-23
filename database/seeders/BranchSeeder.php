<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $branches = [
            [
                'name_km' => '១. ការិយាល័យកណ្តាល (ភ្នំពេញ)',
                'name_en' => '1. Head Office (Phnom Penh)',
                'type' => 'hq',
                'address_km' => 'រាជធានីភ្នំពេញ, ព្រះរាជាណាចក្រកម្ពុជា',
                'address_en' => 'Phnom Penh, Kingdom of Cambodia',
                'province_km' => 'រាជធានីភ្នំពេញ',
                'province_en' => 'Phnom Penh',
                'phone' => '012 675 775 / 097 513 5135',
                'email' => 'nethsokunthearak@telnet.com.kh',
                'sort_order' => 1,
            ],
            [
                'name_km' => '២. សាខាស្វាយរៀង',
                'name_en' => '2. Svay Rieng Branch',
                'type' => 'branch',
                'province_km' => 'ខេត្តស្វាយរៀង',
                'province_en' => 'Svay Rieng Province',
                'sort_order' => 2,
            ],
            [
                'name_km' => '៣. សាខាកណ្តាល',
                'name_en' => '3. Kandal Branch',
                'type' => 'branch',
                'province_km' => 'ខេត្តកណ្តាល',
                'province_en' => 'Kandal Province',
                'sort_order' => 3,
            ],
            [
                'name_km' => '៤. សាខាបាត់ដំបង',
                'name_en' => '4. Battambang Branch',
                'type' => 'branch',
                'province_km' => 'ខេត្តបាត់ដំបង',
                'province_en' => 'Battambang Province',
                'sort_order' => 4,
            ],
            [
                'name_km' => '៥. សាខាបន្ទាយមានជ័យ',
                'name_en' => '5. Banteay Meanchey Branch',
                'type' => 'branch',
                'province_km' => 'ខេត្តបន្ទាយមានជ័យ',
                'province_en' => 'Banteay Meanchey Province',
                'sort_order' => 5,
            ],
            [
                'name_km' => '៦. សាខាប៉ៃលិន',
                'name_en' => '6. Pailin Branch',
                'type' => 'branch',
                'province_km' => 'ខេត្តប៉ៃលិន',
                'province_en' => 'Pailin Province',
                'sort_order' => 6,
            ],
        ];

        foreach ($branches as $branch) {
            Branch::firstOrCreate(['name_km' => $branch['name_km']], $branch);
        }
    }
}
