<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Project;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $projects = Project::factory(2)->create(['user_id' => $user->id]);

        foreach ($projects as $project) {
            $tickets = Ticket::factory(5)->create(['project_id' => $project->id]);

            foreach ($tickets as $ticket) {
                $sessionId = Str::uuid();

                Conversation::factory()->create([
                    'project_id' => $project->id,
                    'ticket_id' => $ticket->id,
                    'session_id' => $sessionId,
                    'role' => 'client',
                    'content' => 'The login button does not work when I click it.',
                ]);

                Conversation::factory()->create([
                    'project_id' => $project->id,
                    'ticket_id' => $ticket->id,
                    'session_id' => $sessionId,
                    'role' => 'assistant',
                    'content' => 'Can you tell me which browser you are using and whether you see any error message?',
                ]);

                Conversation::factory()->create([
                    'project_id' => $project->id,
                    'ticket_id' => $ticket->id,
                    'session_id' => $sessionId,
                    'role' => 'client',
                    'content' => 'I am using Chrome and I see a "Network Error" popup.',
                    'is_complete' => true,
                ]);
            }
        }
    }
}
