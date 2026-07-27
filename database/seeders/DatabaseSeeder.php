<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // RoleSeeder::class,
            // ServiceSeeder::class,
            // BranchSeeder::class,
            // TeamSeeder::class,
            // SettingSeeder::class,
            SlugSeeder::class,
        ]);
    }
}
