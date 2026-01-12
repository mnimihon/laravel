<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'view_users',
            'edit_users',
            'delete_users',
            'view_messages',
            'edit_messages',
            'delete_messages'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        Role::firstOrCreate(['name' => 'user']);

        $admin->syncPermissions($permissions);

        $manager->syncPermissions([
            'view_users',
            'view_messages',
            'edit_messages'
        ]);
    }
}
