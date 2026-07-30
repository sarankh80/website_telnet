<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'view banners', 'manage banners',
            'view services', 'manage services',
            'view branches', 'manage branches',
            'view teams', 'manage teams',
            'view settings', 'manage settings',
            'view contact messages', 'manage contact messages',
            'view service requests', 'manage service requests',
            'manage users',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);

        $superAdmin->givePermissionTo(Permission::all());
        $admin->givePermissionTo(array_filter($permissions, fn($p) => !str_contains($p, 'manage users')));

        $user = User::firstOrCreate(
            ['email' => 'admin@telnet.com.kh'],
            ['name' => 'TELNET Admin', 'password' => bcrypt('Telnet@2026!')]
        );
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            ['name' => 'TELNET Admin', 'password' => bcrypt('admin@gmail.com')]
        );
        $user->assignRole('super-admin');
    }
}
