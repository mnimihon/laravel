<?php

namespace Database\Factories;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConversationFactory extends Factory
{
    public function definition(): array
    {

        return [
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    public function setUserID1(User $user): self
    {
        return $this->state([
            'user1_id' => $user->id,
        ]);
    }

    public function setUserID2(User $user): self
    {
        return $this->state([
            'user2_id' => $user->id,
        ]);
    }
}
