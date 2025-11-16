<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('ru_RU');

        $conversations = DB::table('conversations')->get();

        $messages = [];

        foreach ($conversations as $conversation) {
            $messageCount = rand(5, 50);
            $lastCreatedAt = $conversation->created_at;

            for ($i = 0; $i < $messageCount; $i++) {
                $sender_id = rand(0, 1) ? $conversation->user1_id : $conversation->user2_id;

                $createdAt = $faker->dateTimeBetween($lastCreatedAt, 'now');
                $lastCreatedAt = $createdAt;

                $isRead = $i < ($messageCount * 0.8) ? true : false;

                $messages[] = [
                    'conversation_id' => $conversation->id,
                    'sender_id' => $sender_id,
                    'message' => $faker->text(rand(10, 200)),
                    'is_read' => $isRead,
                    'created_at' => $createdAt,
                ];

                DB::table('conversations')
                    ->where('id', $conversation->id);
            }
        }

        foreach (array_chunk($messages, 100) as $chunk) {
            DB::table('messages')->insert($chunk);
        }
    }
}
