<?php

namespace Database\Seeders;

use App\Models\AccessToken;
use App\Models\User;
use Illuminate\Database\Seeder;

class AccessTokenSeeder extends Seeder
{
    public function run(): void
    {
        /** @var AccessToken $factory */
        $factory = AccessToken::factory();
        $users = User::all();
        foreach ($users as $user){
            $factory->count(1)
                ->forUser($user)
                ->create();
        }
    }
}
