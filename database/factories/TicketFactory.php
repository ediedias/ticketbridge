<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    public function definition(): array
    {
        return [
            'project_id' => Project::factory(),
            'title' => fake()->sentence(6),
            'description' => fake()->paragraph(3),
            'steps_to_reproduce' => "1. " . fake()->sentence() . "\n2. " . fake()->sentence() . "\n3. " . fake()->sentence(),
            'expected_behavior' => fake()->sentence(),
            'actual_behavior' => fake()->sentence(),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'complexity' => fake()->randomElement(['simple', 'medium', 'complex']),
            'status' => fake()->randomElement(['open', 'in_progress', 'closed']),
        ];
    }
}
