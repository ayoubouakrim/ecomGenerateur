<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeployController extends Controller
{
    public function deploySite(Request $request)
    {
        // Valider que le contenu HTML est fourni
        $data = $request->validate([
            'content' => 'required|string',
        ]);

        // Récupérer les informations GitHub depuis la config
        $token  = config('services.github.token');
        $owner  = config('services.github.owner');
        $repo   = config('services.github.repo');
        $branch = config('services.github.branch');
        $filePath = 'index.html'; // Chemin du fichier dans le dépôt

        // Encodage du contenu en base64
        $contentEncoded = base64_encode($data['content']);

        // Vérifier si le fichier existe déjà (pour récupérer son SHA)
        $getResponse = Http::withHeaders([
            'Authorization' => "token $token",
            'Accept'        => 'application/vnd.github.v3+json',
        ])->get("https://api.github.com/repos/$owner/$repo/contents/$filePath", [
            'ref' => $branch,
        ]);

        $sha = null;
        if ($getResponse->ok()) {
            $fileData = $getResponse->json();
            $sha = $fileData['sha'] ?? null;
        }

        // Préparation de la charge utile pour la création ou la mise à jour
        $commitMessage = "Déploiement du site mis à jour " . now();
        $payload = [
            'message' => $commitMessage,
            'content' => $contentEncoded,
            'branch'  => $branch,
        ];
        if ($sha) {
            $payload['sha'] = $sha;
        }

        // Appel à l'API GitHub pour créer ou mettre à jour le fichier
        $commitResponse = Http::withHeaders([
            'Authorization' => "token $token",
            'Accept'        => 'application/vnd.github.v3+json',
        ])->put("https://api.github.com/repos/$owner/$repo/contents/$filePath", $payload);

        if ($commitResponse->failed()) {
            return response()->json([
                'error'   => 'Échec du déploiement sur GitHub Pages.',
                'details' => $commitResponse->json(),
            ], $commitResponse->status());
        }

        // L'URL du site GitHub Pages (format standard)
        $siteUrl = "https://$owner.github.io/$repo/";

        return response()->json(['siteUrl' => $siteUrl]);
    }
}
