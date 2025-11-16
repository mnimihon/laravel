<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $users = DB::table('users')->pluck('id')->toArray();

        $conversations = [];
        $conversationCount = rand(15, 30);
        $allPossiblePairs = [];
        for ($i = 0; $i < count($users); $i++) {
            for ($j = $i + 1; $j < count($users); $j++) {
                $allPossiblePairs[] = [$users[$i], $users[$j]];
            }
        }

        shuffle($allPossiblePairs);

        $selectedPairs = array_slice($allPossiblePairs, 0, min($conversationCount, count($allPossiblePairs)));

        foreach ($selectedPairs as $pair) {
            $createdAt = $faker->dateTimeBetween('-1 year', 'now');

            $conversations[] = [
                'user1_id' => $pair[0],
                'user2_id' => $pair[1],
                'created_at' => $createdAt,
                'updated_at' => $faker->dateTimeBetween($createdAt, 'now'),
            ];
        }

        DB::table('conversations')->insert($conversations);
    }
}
