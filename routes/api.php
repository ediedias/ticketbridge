<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BugReportController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\WidgetController;
use Illuminate\Support\Facades\Route;

// Health check endpoints
Route::get('health', [TestController::class, 'health']);
Route::get('test/database', [TestController::class, 'database']);

// Authentication endpoints (public)
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('me', [AuthController::class, 'me']);
    });
});

// Authenticated API routes (dev dashboard)
Route::middleware('auth:sanctum')->group(function () {
    // Projects
    Route::apiResource('projects', ProjectController::class);
    
    // Tickets
    Route::get('projects/{project}/tickets', [TicketController::class, 'index']);
    Route::get('projects/{project}/tickets/{ticket}', [TicketController::class, 'show']);
    Route::patch('projects/{project}/tickets/{ticket}', [TicketController::class, 'update']);
    
    // Bug report management
    Route::get('projects/{project}/bug-reports/stats', [BugReportController::class, 'stats']);
    Route::get('projects/{project}/embed-code', [BugReportController::class, 'embedCode']);
});

// Public widget endpoints (authenticated via api_key in request body)
Route::prefix('widget')->group(function () {
    // Bug report conversation
    Route::post('conversations/start', [WidgetController::class, 'startConversation']);
    Route::post('conversations/reply', [WidgetController::class, 'reply']);
    
    // Check report status (public endpoint for clients)
    Route::post('status', [BugReportController::class, 'status']);
});