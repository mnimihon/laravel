<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $admin->assignRole('admin');

        $managers = User::factory()->count(3)->create();
        foreach ($managers as $manager) {
            $manager->assignRole('manager');
        }

        $users = User::factory()->count(16)->create();
        foreach ($users as $user) {
            $user->assignRole('user');
        }
    }
}
