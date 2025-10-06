<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenAiController extends Controller
{
    public function processChat(Request $request)
    {
        set_time_limit(300); // 3 minutes
        ini_set('max_execution_time', 180);

        try {
            $data = $request->validate([
                'messages' => 'required|array',
            ]);

            // Use OpenRouter instead of Azure
            $apiKey = config('services.openrouter.key');
            
            if (empty($apiKey)) {
                return response()->json([
                    'error' => 'API key missing',
                    'message' => 'Add OPENROUTER_API_KEY to .env'
                ], 500);
            }

            $endpoint = 'https://openrouter.ai/api/v1/chat/completions';
            $model = 'deepseek/deepseek-chat-v3.1:free'; 

            $payload = [
                'model' => $model,
                'messages' => $data['messages'],
                'temperature' => 1.0,
                'top_p' => 0.9,
                'max_tokens' => 4000,
            ];

            $response = Http::timeout(300)->withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
                'HTTP-Referer' => config('app.url', 'http://localhost'),
                'X-Title' => config('app.name', 'Laravel'),
            ])->post($endpoint, $payload);

            if ($response->failed()) {
                Log::error('OpenRouter failed', ['response' => $response->body()]);
                return response()->json([
                    'error' => 'API call failed',
                    'details' => $response->json()
                ], $response->status());
            }

            return response()->json($response->json());

        } catch (\Exception $e) {
            Log::error('Chat error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}