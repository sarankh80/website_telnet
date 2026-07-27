<?php

namespace Database\Seeders;

use App\Models\Slugs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slugs = [
            [
                "name" => "INTENET SERVICE",
                "name_km" => "សេវាកម្មអ៊ីនធឺណេត",
                "desc" => "INTERNET SERVICE SLUGS",
                "desc_km" => "មិនច្បាស់លាស់",
                "created_at" => now(),
                "updated_at"
            ],
            [
                "name" => "FTTH & OLT Services",
                "name_km" => "រចនាសម្ព័ន្ធបណ្តុំសៀវគ្វីទៅសៀវគ្វីទំនើប",
                "desc" => "NETWORK TO NETWORK INTER-CONNECTIVITY",
                "desc_km" => "រចនាសម្ព័ន្ធបណ្តុំសៀវគ្វីទៅសៀវគ្វីទំនើប",
                "created_at" => now(),
                "updated_at"
            ],
            [
                "name" => "DATA & IDC SERVICE",
                "name_km" => "សេវាទិន្នន័យនិងជួលបន្ទប់ចែកចាយអ៊ីនធឺណេត",
                "desc" => "DATA & IDC SERVICE",
                "desc_km" => "សេវាទិន្នន័យនិងជួលបន្ទប់ចែកចាយអ៊ីនធឺណេត",
                "created_at" => now(),
                "updated_at"
            ],
            [
                "name" => "NETWORK CONNECTIVITY",
                "name_km" => "សេវាកម្មភ្ជាប់ហេដ្ឋារចនាបណ្តាញ",
                "desc" => "NETWORK CONNECTIVITY",
                "desc_km" => "សេវាកម្មភ្ជាប់ហេដ្ឋារចនាបណ្តាញ",
                "created_at" => now(),
                "updated_at"
            ],
            [
                "name" => "ICT SOLUTION & PROJECTS",
                "name_km" => "ដំណោះស្រាយផ្នែកបច្ចេកទេសនិងគម្រោង",
                "desc" => "ICT SOLUTION & PROJECTS",
                "desc_km" => "ដំណោះស្រាយផ្នែកបច្ចេកទេសនិងគម្រោង",
                "created_at" => now(),
                "updated_at"
            ],
        ];
        foreach ($slugs as $s) {
            Slugs::create([
                "name" => $s["name"],
                "name_km" => $s["name_km"],
                "desc" => $s["desc"],
                "desc_km" => $s["desc_km"],
                "created_at" => $s["created_at"],
            ]);
        }
    }
}
