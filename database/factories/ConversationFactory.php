<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ConversationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'ticket_id' => Ticket::factory(),
            'project_id' => Project::factory(),
            'session_id' => Str::uuid(),
            'role' => fake()->randomElement(['client', 'assistant']),
            'content' => fake()->paragraph(),
            'is_complete' => false,
        ];
    }
}
