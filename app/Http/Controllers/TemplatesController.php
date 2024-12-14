<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    //
    public function index(){
        return view('templates');
    }
    public function store(Request $request)
    {
        // Valider les données envoyées
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'filePath' => 'required|string|max:255',
        ]);

        // Créer le nouveau template dans la base de données
        Template::create($validated);

        // Retourner une réponse, ou rediriger vers une page de succès
        return redirect()->route('templates')->with('success', 'Template enregistré avec succès!');
    }

}
