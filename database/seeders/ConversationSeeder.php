<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Database\Seeder;

class ConversationSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $usedPairs = [];

        for ($i = 0; $i < 30; $i++) {
            $user1 = $users->random();
            $user2 = $users->random();

            if ($user1->id === $user2->id) continue;
            $pair = [$user1->id, $user2->id];
            if (in_array($pair, $usedPairs)) continue;

            $usedPairs[] = $pair;
            Conversation::factory()
                ->setUserID1($user1)
                ->setUserID2($user2)
                ->create();
        }
    }
}
