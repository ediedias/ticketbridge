<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BugReportController extends Controller
{
    /**
     * Get bug report status by session ID (for client to check progress)
     */
    public function status(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'api_key' => 'required|uuid',
            'session_id' => 'required|uuid',
        ]);

        $project = Project::where('api_key', $validated['api_key'])->first();
        
        if (!$project) {
            return response()->json([
                'error' => 'Invalid API key'
            ], 401);
        }

        $conversations = $project->conversations()
            ->where('session_id', $validated['session_id'])
            ->with('ticket')
            ->orderBy('created_at')
            ->get();

        if ($conversations->isEmpty()) {
            return response()->json([
                'error' => 'Session not found'
            ], 404);
        }

        $ticket = $conversations->first()->ticket;
        $clientMessages = $conversations->where('role', 'client');

        return response()->json([
            'session_id' => $validated['session_id'],
            'is_complete' => $conversations->first()->is_complete,
            'messages_count' => $clientMessages->count(),
            'ticket' => $ticket ? [
                'id' => $ticket->id,
                'title' => $ticket->title,
                'status' => $ticket->status,
                'priority' => $ticket->priority,
                'created_at' => $ticket->created_at,
            ] : null,
            'conversations' => $conversations->map(function ($conv) {
                return [
                    'role' => $conv->role,
                    'content' => $conv->content,
                    'created_at' => $conv->created_at,
                ];
            })
        ]);
    }

    /**
     * Get project's bug report statistics (for project owners)
     */
    public function stats(Request $request, Project $project): JsonResponse
    {
        if ($project->user_id !== $request->user()->id) {
            abort(403);
        }

        $stats = [
            'total_reports' => $project->tickets()->count(),
            'open_tickets' => $project->tickets()->where('status', 'open')->count(),
            'in_progress_tickets' => $project->tickets()->where('status', 'in_progress')->count(),
            'closed_tickets' => $project->tickets()->where('status', 'closed')->count(),
            'high_priority' => $project->tickets()->where('priority', 'high')->count(),
            'recent_reports' => $project->tickets()
                ->with('conversations')
                ->latest()
                ->take(5)
                ->get()
                ->map(function ($ticket) {
                    return [
                        'id' => $ticket->id,
                        'title' => $ticket->title,
                        'priority' => $ticket->priority,
                        'status' => $ticket->status,
                        'created_at' => $ticket->created_at,
                    ];
                }),
        ];

        return response()->json($stats);
    }

    /**
     * Get widget embed code for project
     */
    public function embedCode(Request $request, Project $project): JsonResponse
    {
        if ($project->user_id !== $request->user()->id) {
            abort(403);
        }

        $baseUrl = config('app.url');
        $embedCode = <<<HTML
<!-- TicketBridge Bug Report Widget -->
<div id="ticketbridge-widget"></div>
<script>
  window.ticketBridgeConfig = {
    apiKey: '{$project->api_key}',
    apiUrl: '{$baseUrl}/api/widget',
    projectName: '{$project->name}'
  };
</script>
<script src="{$baseUrl}/widget.js"></script>
HTML;

        return response()->json([
            'embed_code' => $embedCode,
            'api_key' => $project->api_key,
            'widget_url' => "{$baseUrl}/widget.js",
        ]);
    }
}