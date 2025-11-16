<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class AccessTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $users = DB::table('users')->pluck('id')->toArray();

        $tokens = [];

        foreach ($users as $userId) {
            $createdAt = $faker->dateTimeBetween('-6 months', 'now');
            $isExpired = $faker->boolean(30);

            $tokens[] = [
                'user_id' => $userId,
                'token' => \Illuminate\Support\Str::random(64),
                'last_used_at' => $faker->boolean(80) ? $faker->dateTimeBetween($createdAt, 'now') : null,
                'expires_at' => $isExpired
                    ? $faker->dateTimeBetween('-1 month', '-1 day')
                    : ($faker->boolean(50)
                        ? $faker->dateTimeBetween('+1 week', '+1 year')
                        : null),
                'created_at' => $createdAt,
            ];
        }

        foreach (array_chunk($tokens, 100) as $chunk) {
            DB::table('access_tokens')->insert($chunk);
        }
    }
}
