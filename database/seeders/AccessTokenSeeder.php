<?php

namespace Database\Seeders;

use App\Models\AccessToken;
use App\Models\User;
use Illuminate\Database\Seeder;

class AccessTokenSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        AccessToken::factory()
            ->count($users->count())
            ->recycle($users)
            ->create();
    }
}
