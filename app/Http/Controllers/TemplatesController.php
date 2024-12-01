<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\UserInput;
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

      /*  // Créer le nouveau template dans la base de données
        Template::create($validated);*/
        // Créer le nouveau template
        $template = Template::create($validated);

        // Récupérer les informations de la session
        $userInputData = session('userinputtemp');

        if ($userInputData) {
            // Ajouter le template_id et sauvegarder
            $userInputData['template_id'] = $template->id;

            UserInput::create($userInputData);

            // Supprimer les données de la session
            session()->forget('userinputtemp');
        }

        // Retourner une réponse, ou rediriger vers une page de succès
        return redirect()->route('templates')->with('success', 'Template enregistré avec succès!');
    }

}
