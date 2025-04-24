<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenAiController extends Controller
{
    /**
     * Traite la requête vers l'API Azure OpenAI de manière sécurisée.
     */
    public function processChat(Request $request)
    {

        // Valider la requête, on attend un tableau "messages"
        $data = $request->validate([
            'messages' => 'required|array',
        ]);

        // Récupérer la clé API depuis la config (.env)
        $apiKey = config('services.openai.key');

        // Configuration Azure OpenAI (adaptée à votre modèle)
        $azureEndpoint = 'https://models.inference.ai.azure.com/chat/completions';
//        $model = 'gpt-4o-mini';
        $model = 'gpt-4o';
        $temperature = 1.0;
        $top_p = 0.9;
        $max_tokens = 4000;

        // Préparez la charge utile pour l'API
        $payload = [
            'model' => $model,
            'messages' => $data['messages'],
            'temperature' => $temperature,
            'top_p' => $top_p,
            'max_tokens' => $max_tokens,
            'presence_penalty' => 0.3,
        ];
//dd($payload);

        // Appel à l'API Azure OpenAI
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        'Authorization' => 'Bearer '.$apiKey,
        ])->post($azureEndpoint, $payload);

        if ($response->failed()) {
            return response()->json([
                'error' => 'La requête à l’API Azure OpenAI a échoué.',
                'details' => $response->json(),
            ], $response->status());
        }

        return response()->json($response->json());
    }
}


