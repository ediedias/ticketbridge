<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class WidgetController extends Controller
{
    /**
     * Start a new bug report conversation
     */
    public function startConversation(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'api_key' => 'required|uuid',
                'message' => 'required|string|min:10|max:5000',
                'client_info' => 'nullable|array',
                'client_info.browser' => 'nullable|string|max:100',
                'client_info.device' => 'nullable|string|max:100',
                'client_info.url' => 'nullable|url|max:500',
            ]);

            $project = Project::where('api_key', $validated['api_key'])->first();
            
            if (!$project) {
                return response()->json([
                    'error' => 'Invalid API key'
                ], 401);
            }

            $sessionId = Str::uuid()->toString();

            // Store initial client message
            Conversation::create([
                'project_id' => $project->id,
                'session_id' => $sessionId,
                'role' => 'client',
                'content' => $validated['message'],
                'metadata' => $validated['client_info'] ?? null,
            ]);

            // Generate intelligent follow-up questions based on the initial message
            $followUpQuestions = $this->generateFollowUpQuestions($validated['message']);

            $assistantMessage = "Thank you for reporting this issue! To help our development team resolve this quickly, please provide a few more details:\n\n" . $followUpQuestions;

            Conversation::create([
                'project_id' => $project->id,
                'session_id' => $sessionId,
                'role' => 'assistant',
                'content' => $assistantMessage,
            ]);

            return response()->json([
                'success' => true,
                'session_id' => $sessionId,
                'message' => $assistantMessage,
                'questions_remaining' => 2,
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'details' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while processing your report'
            ], 500);
        }
    }

    /**
     * Handle replies in bug report conversation
     */
    public function reply(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'api_key' => 'required|uuid',
                'session_id' => 'required|uuid',
                'message' => 'required|string|min:1|max:5000',
            ]);

            $project = Project::where('api_key', $validated['api_key'])->first();
            
            if (!$project) {
                return response()->json([
                    'error' => 'Invalid API key'
                ], 401);
            }

            $conversations = Conversation::where('project_id', $project->id)
                ->where('session_id', $validated['session_id'])
                ->orderBy('created_at')
                ->get();

            if ($conversations->isEmpty()) {
                return response()->json([
                    'error' => 'Conversation not found'
                ], 404);
            }

            // Add client reply
            Conversation::create([
                'project_id' => $project->id,
                'session_id' => $validated['session_id'],
                'role' => 'client',
                'content' => $validated['message'],
            ]);

            $clientMessageCount = $conversations->where('role', 'client')->count() + 1;

            // After 3 client messages, generate the structured ticket
            if ($clientMessageCount >= 3) {
                $ticket = $this->generateStructuredTicket($project, $conversations, $validated['session_id']);
                
                return response()->json([
                    'success' => true,
                    'complete' => true,
                    'ticket_id' => $ticket->id,
                    'message' => "Perfect! Your bug report has been submitted successfully. We've created ticket #{$ticket->id} and will investigate this issue. Thank you for the detailed information!",
                ]);
            }

            // Generate next follow-up question
            $nextQuestion = $this->getNextFollowUpQuestion($conversations, $clientMessageCount);
            
            Conversation::create([
                'project_id' => $project->id,
                'session_id' => $validated['session_id'],
                'role' => 'assistant',
                'content' => $nextQuestion,
            ]);

            return response()->json([
                'success' => true,
                'complete' => false,
                'message' => $nextQuestion,
                'questions_remaining' => 3 - $clientMessageCount,
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'details' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while processing your reply'
            ], 500);
        }
    }

    /**
     * Generate follow-up questions based on initial message
     */
    private function generateFollowUpQuestions(string $message): string
    {
        // TODO: This will be enhanced with Claude API integration
        // For now, provide smart default questions based on keywords
        
        $message = strtolower($message);
        $questions = [];

        if (str_contains($message, 'error') || str_contains($message, 'crash') || str_contains($message, 'broke')) {
            $questions[] = "1. What specific error message did you see (if any)?";
            $questions[] = "2. What were you trying to do just before this happened?";
        } elseif (str_contains($message, 'slow') || str_contains($message, 'loading')) {
            $questions[] = "1. How long does it take to load/respond?";
            $questions[] = "2. Does this happen every time or only sometimes?";
        } elseif (str_contains($message, 'login') || str_contains($message, 'password')) {
            $questions[] = "1. At what step in the login process does this occur?";
            $questions[] = "2. Are you seeing any specific error messages?";
        } else {
            $questions[] = "1. What were you expecting to happen instead?";
            $questions[] = "2. Can you describe the exact steps you took?";
        }

        $questions[] = "3. What browser and device are you using?";

        return implode("\n", $questions);
    }

    /**
     * Get next follow-up question based on conversation history
     */
    private function getNextFollowUpQuestion($conversations, int $clientMessageCount): string
    {
        // TODO: This will be enhanced with Claude API integration
        
        $questions = [
            2 => "Thanks for those details! One more question: Can you tell me what you expected to happen instead of what actually occurred?",
            3 => "Great! Last question: What browser, device, and operating system are you using?"
        ];

        return $questions[$clientMessageCount] ?? "Thank you for the additional information!";
    }

    /**
     * Generate structured ticket from conversation
     */
    private function generateStructuredTicket($project, $conversations, string $sessionId)
    {
        // TODO: This will be enhanced with Claude API integration
        
        $clientMessages = $conversations->where('role', 'client')->pluck('content')->toArray();
        
        // Get the most recent client message for this session
        $latestMessage = Conversation::where('project_id', $project->id)
            ->where('session_id', $sessionId)
            ->where('role', 'client')
            ->latest()
            ->first();
            
        if ($latestMessage) {
            $clientMessages[] = $latestMessage->content;
        }

        $allContent = implode("\n\n", $clientMessages);
        
        // Basic parsing to extract structured information
        $title = $this->extractTitle($clientMessages[0]);
        $priority = $this->determinePriority($allContent);
        $complexity = $this->determineComplexity($allContent);

        $ticket = $project->tickets()->create([
            'title' => $title,
            'description' => $allContent,
            'steps_to_reproduce' => $this->extractStepsToReproduce($clientMessages),
            'expected_behavior' => $this->extractExpectedBehavior($clientMessages),
            'actual_behavior' => $this->extractActualBehavior($clientMessages),
            'priority' => $priority,
            'complexity' => $complexity,
            'status' => 'open',
        ]);

        // Link all conversations to this ticket
        Conversation::where('project_id', $project->id)
            ->where('session_id', $sessionId)
            ->update(['ticket_id' => $ticket->id, 'is_complete' => true]);

        return $ticket;
    }

    private function extractTitle(string $firstMessage): string
    {
        $title = trim(explode("\n", $firstMessage)[0]);
        return strlen($title) > 100 ? substr($title, 0, 97) . '...' : $title;
    }

    private function determinePriority(string $content): string
    {
        $content = strtolower($content);
        
        if (str_contains($content, 'urgent') || str_contains($content, 'critical') || str_contains($content, 'crash')) {
            return 'high';
        } elseif (str_contains($content, 'minor') || str_contains($content, 'cosmetic')) {
            return 'low';
        }
        
        return 'medium';
    }

    private function determineComplexity(string $content): string
    {
        $content = strtolower($content);
        
        if (str_contains($content, 'database') || str_contains($content, 'integration') || str_contains($content, 'security')) {
            return 'complex';
        } elseif (str_contains($content, 'typo') || str_contains($content, 'color') || str_contains($content, 'text')) {
            return 'simple';
        }
        
        return 'medium';
    }

    private function extractStepsToReproduce(array $messages): ?string
    {
        foreach ($messages as $message) {
            if (preg_match('/step|follow|reproduce|do/i', $message)) {
                return $message;
            }
        }
        return null;
    }

    private function extractExpectedBehavior(array $messages): ?string
    {
        foreach ($messages as $message) {
            if (preg_match('/expect|should|supposed|want/i', $message)) {
                return $message;
            }
        }
        return null;
    }

    private function extractActualBehavior(array $messages): ?string
    {
        foreach ($messages as $message) {
            if (preg_match('/instead|actually|but|error|wrong/i', $message)) {
                return $message;
            }
        }
        return $messages[0] ?? null;
    }
}