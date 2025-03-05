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
        $top_p = 1.0;
        $max_tokens = 6000;

        // Préparez la charge utile pour l'API
        $payload = [
            'model' => $model,
            'messages' => $data['messages'],
            'temperature' => $temperature,
            'top_p' => $top_p,
            'max_tokens' => $max_tokens,
        ];
//dd($payload);

        // Appel à l'API Azure OpenAI
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . $apiKey,
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

///*
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Http;
//
//class OpenAiController extends Controller
//{
//    /**
//     * Traite la requête vers l'API ChatGPT (gpt-3.5-turbo) de manière sécurisée.
//     */
//    public function processChat(Request $request)
//    {
//        // Valider la requête (ici on attend un tableau "messages")
//        $data = $request->validate([
//            'messages' => 'required|array',
//        ]);
//
//        // Récupérer la clé API depuis la config (qui pointe vers l'env)
//        $apiKey = config('services.openai.key');
//
//        // Appel à l'API ChatGPT avec la librairie HTTP de Laravel
//        $response = Http::withHeaders([
//            'Content-Type'  => 'application/json',
//            'Authorization' => 'Bearer ' . $apiKey,
//        ])->post('https://models.inference.ai.azure.com/chat/completions', [
//            'model'    => 'gpt-4o-mini',
//            "temperature" => 1.0,
//        "top_p" => 1.0,
//        "max_tokens"=> 10000,
//            'messages' => $data['messages'],
//        ]);
//
//        if ($response->failed()) {
//            // Logguez l'erreur si besoin, et retournez une réponse d'erreur
//            return response()->json([
//                'error' => 'La requête à l’API OpenAI a échoué.',
//                'details' => $response->json(),
//            ], $response->status());
//        }
//
//        // Retourner la réponse de l'API au client
//        return response()->json($response->json());
//    }
//}*/
