<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->company() . ' ' . fake()->randomElement(['App', 'Website', 'Portal', 'Dashboard']),
            'description' => fake()->sentence(),
            'api_key' => Str::uuid(),
        ];
    }
}
