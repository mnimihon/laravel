<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AccessTokenFactory extends Factory
{
    public function definition(): array
    {
        return [
            'token' => Str::random(64),
            'last_used_at' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'expires_at' => $this->faker->dateTimeBetween('+1 month', '+1 year'),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    public function forUser(User $user): self
    {
        return $this->state([
            'user_id' => $user->id,
        ]);
    }
}
