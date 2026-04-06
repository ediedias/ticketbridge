<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request, Project $project): JsonResponse
    {
        if ($project->user_id !== $request->user()->id) {
            abort(403);
        }

        $tickets = $project->tickets()
            ->latest()
            ->paginate(20);

        return response()->json($tickets);
    }

    public function show(Request $request, Project $project, Ticket $ticket): JsonResponse
    {
        if ($project->user_id !== $request->user()->id) {
            abort(403);
        }

        $ticket->load('conversations');

        return response()->json($ticket);
    }

    public function update(Request $request, Project $project, Ticket $ticket): JsonResponse
    {
        if ($project->user_id !== $request->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'sometimes|in:open,in_progress,closed',
            'priority' => 'sometimes|in:low,medium,high',
        ]);

        $ticket->update($validated);

        return response()->json($ticket);
    }
}
