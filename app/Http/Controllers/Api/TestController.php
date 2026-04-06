<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    /**
     * Simple health check endpoint
     */
    public function health(): JsonResponse
    {
        return response()->json([
            'status' => 'ok',
            'message' => 'TicketBridge API is running',
            'timestamp' => now()->toISOString(),
            'version' => '0.1.0'
        ]);
    }

    /**
     * Test database connectivity
     */
    public function database(): JsonResponse
    {
        try {
            \DB::connection()->getPdo();
            return response()->json([
                'database' => 'connected',
                'driver' => config('database.default'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'database' => 'error',
                'message' => 'Could not connect to database'
            ], 500);
        }
    }
}