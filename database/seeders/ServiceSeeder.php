<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name_km' => 'អ៉ីនធឺណិតលំនៅដ្ឋាន (Household)',
                'name_en' => 'Residential Internet (Household)',
                'description_km' => 'សេវា FTTH និង FTTR ខ្សែកាបអុបទិកដល់ផ្ទះ សម្រាប់ទស្សនាវីដេអូ 4K, ការលេងហ្គេមអនឡាញ និងការប្រើប្រាស់ក្នុងគ្រួសារដោយគ្មានការរអាក់រអួល។',
                'name_en' => 'Residential Internet (Household)',
                'description_en' => 'FTTH & FTTR fiber-to-the-home services for 4K video streaming, online gaming, and seamless family usage.',
                'icon' => 'fa-solid fa-house-signal',
                'badge_km' => 'FTTH & FTTR',
                'badge_en' => 'FTTH & FTTR',
                'color' => 'green',
                'sort_order' => 1,
            ],
            [
                'name_km' => 'អ៉ីនធឺណិតអាជីវកម្ម (Business)',
                'name_en' => 'Business Internet (SME)',
                'description_km' => 'ដំណោះស្រាយសម្រាប់អាជីវកម្មខ្នាតតូច និងមធ្យម (SME) អគារការិយាល័យ ជាមួយនឹងល្បឿនថេរ និងការគាំទ្របច្ចេកទេសរហ័ស។',
                'description_en' => 'Solutions for Small & Medium Enterprises (SME) and office buildings with guaranteed speed and fast technical support.',
                'icon' => 'fa-solid fa-briefcase',
                'badge_km' => 'FTTB & FTTO',
                'badge_en' => 'FTTB & FTTO',
                'color' => 'orange',
                'sort_order' => 2,
            ],
            [
                'name_km' => 'អ៉ីនធឺណិតសហគ្រាស (Enterprise)',
                'name_en' => 'Enterprise Internet (Dedicated)',
                'description_km' => 'បណ្តាញ Dedicated Internet Access (DIA) ល្បឿនលឿនកម្រិតខ្ពស់ ធានា SLA ៩៥%+ សម្រាប់ក្រុមហ៊ុនធំៗ និងស្ថាប័នរដ្ឋ។',
                'description_en' => 'High-speed Dedicated Internet Access (DIA) with SLA ≥95% for large enterprises and government institutions.',
                'icon' => 'fa-solid fa-building',
                'badge_km' => 'FTTX Enterprise',
                'badge_en' => 'FTTX Enterprise',
                'color' => 'green',
                'sort_order' => 3,
            ],
            [
                'name_km' => 'មណ្ឌលទិន្នន័យ (IDC Center)',
                'name_en' => 'Data Center (IDC)',
                'description_km' => 'សេវាទិន្នន័យ ការរក្សាទុកទិន្នន័យ សេវា Colocation និង Hosting ប្រកបដោយសុវត្ថិភាពខ្ពស់ ក្នុងមណ្ឌលទិន្នន័យស្តង់ដារ។',
                'description_en' => 'Secure data storage, Colocation & Hosting services in a standard-compliant Data Center.',
                'icon' => 'fa-solid fa-server',
                'badge_km' => 'IDC & Data',
                'badge_en' => 'IDC & Data',
                'color' => 'orange',
                'sort_order' => 4,
            ],
            [
                'name_km' => 'ដំណោះស្រាយ និងគម្រោង ICT',
                'name_en' => 'ICT Solutions & Projects',
                'description_km' => 'ការរចនា និងអនុវត្តគម្រោងបណ្តាញ Network, Managed Wi-Fi, Security, និងហេដ្ឋារចនាសម្ព័ន្ធព័ត៌មានវិទ្យាគ្រប់ប្រភេទ។',
                'description_en' => 'Design and deploy Network projects, Managed Wi-Fi, Security, and all types of IT infrastructure.',
                'icon' => 'fa-solid fa-diagram-project',
                'badge_km' => 'ICT Solutions',
                'badge_en' => 'ICT Solutions',
                'color' => 'green',
                'sort_order' => 5,
            ],
            [
                'name_km' => 'សេវា OLT & Fiber Core',
                'name_en' => 'OLT & Fiber Core Services',
                'description_km' => 'ហេដ្ឋារចនាសម្ព័ន្ធបណ្តាញខ្សែកាបអុបទិកស្នូល GPON/EPON គ្របដណ្តប់ទីក្រុង និងខេត្តសំខាន់ៗ សម្រាប់ការភ្ជាប់ទិន្នន័យ។',
                'description_en' => 'Core GPON/EPON fiber optic network infrastructure covering major cities and provinces for data connectivity.',
                'icon' => 'fa-solid fa-cable-car',
                'badge_km' => 'OLT Infrastructure',
                'badge_en' => 'OLT Infrastructure',
                'color' => 'orange',
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(['name_km' => $service['name_km']], $service);
        }
    }
}
