<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTemplateRequest;
use App\Models\Template;
use App\Models\TempTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\UserInput;
use App\Service\TemplateService;
use Illuminate\Validation\Rule;


class TemplatesController extends Controller
{

    public function drafts()
    {
//        $userTemplates = TempTemplate::where('user_id', auth()->id())->get();
        $tempTemplates = TempTemplate::all();
//        dd($tempTemplates);
        return view('templateso.index', compact('tempTemplates'));
    }

    protected $templateService;

    public function __construct(TemplateService $templateService)
    {
        $this->templateService = $templateService;
    }
    public function index()
    {
        // Récupérer tous les templates depuis la base de données
        $templates = Template::all();
        $tempTemplates = TempTemplate::all();

        /*()->map(function ($template) {
            return [
                'name' => $template->name, // Supposons que 'nom' contient le nom du fichier
                'content' => $template->filepath // Le contenu HTML stocké dans la BD
            ];
        });*/
//        dd($templates);
        return view('templateso.index', compact(['templates','tempTemplates']));
    }
    public function getTemplateContent($id)
    {
        $template = Template::find($id);

        if (!$template) {
            abort(404, 'Template not found');
        }

        return response($template->filePath)
            ->header('Content-Type', 'text/html');
    }
    public function gettempTemplateContent($id)
    {
        $temptemplate = TempTemplate::find($id);

        if (!$temptemplate) {
            abort(404, 'TempTemplate not found');
        }

        return response($temptemplate->content)
            ->header('Content-Type', 'text/html');
    }


  /*  public function edit($id)
    {
        $template = Template::findOrFail($id);
        $templateUrl = route('templateso.content', ['id' => $template->id]);

        return view('templateso.edit', compact('template', 'templateUrl'));
    }*/




    public function choose(Request $request)
    {
        // Vérifier si un template a bien été sélectionné
        $templateName = $request->input('templateName');
        if (!$templateName) {
            return redirect()->back()->with('error', 'Veuillez sélectionner un template.');
        }

        // Récupérer le nom du site depuis la session
        $siteName = session('siteName');
        if (!$siteName) {
            return redirect()->back()->with('error', 'Aucun site en session.');
        }

        // Trouver l'entrée UserInput correspondant au site
        $userInput = UserInput::where('siteName', $siteName)->first();
        if (!$userInput) {
            return redirect()->back()->with('error', 'Aucune information utilisateur trouvée.');
        }

        // Enregistrer le template sélectionné
        $userInput->template_id = $templateName;
//        $userInput->save();
        // Rediriger vers la prévisualisation du bon template
        return redirect()->route('templateso.preview', ['templateName' => $templateName])
            ->with('success', 'Template choisi avec succès!');
    }


    public function preview($templateName)
    {
        // Récupérer le template correspondant depuis la base de données
        $template = Template::where('name', $templateName)->first();

        if (!$template) {
            return redirect()->route('templateso.index')->with('error', 'Template non trouvé.');
        }

        return view('templateso.preview', ['templateContent' => $template->filepath]);
    }


    // Afficher l'éditeur avec le template temporaire
    public function edit($id)
    {
        $template = Template::findOrFail($id);

        // Récupérer ou créer un template temporaire
        $tempTemplate = TempTemplate::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'original_id' => $id
            ],
            ['content' => $template->filePath] // Contenu initial = template original
        );

        return view('templateso.edit', [
            'templateUrl' => route('templateso.tempContent', $tempTemplate->id),
            'templateId' => $id
        ]);
    }
    /*public function edittemp($id)
    {
        $template = TempTemplate::findOrFail($id);


        return view('templateso.edit', [
            'templateUrl' => route('templateso.tempContent', $tempTemplate->id),
            'templateId' => $id
        ]);
    }*/

    // Afficher le contenu du template temporaire
    public function tempContent($id)
    {
        $tempTemplate = TempTemplate::findOrFail($id);
        return response($tempTemplate->content)->header('Content-Type', 'text/html');
    }

    public function saveDraft(Request $request)
    {
        $hello = "test";
        dd($hello);
/*
        // Validation renforcée
        $validated = $request->validate([
            'content' => 'required|string',
            'templateId' => [
                'required',
                'integer',
                Rule::exists('template', 'id')->where(function ($query) {
                    $query->where('is_active', true); // Exemple de condition supplémentaire
                })
            ]
        ]);

        // Convertir le templateId en entier, au cas où ce ne serait pas déjà un entier
        $templateId = (int) $validated['templateId'];

        // Vérifier si l'utilisateur a déjà un brouillon pour ce template
        $existingDraft = TempTemplate::where('user_id', auth()->id())->where('original_id', $templateId)->first();



        if ($existingDraft) {
            // Si un brouillon existe, on met à jour le contenu seulement
            $existingDraft->update([
                'content' => $validated['content'],
                'updated_at' => now() // Mettre à jour le champ updated_at
            ]);
        } else {
            // Sinon, créer un nouveau brouillon
            TempTemplate::create([
                'user_id' => auth()->id(),
                'original_id' => $templateId,
                'content' => $validated['content'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json([
            'success' => true,
        ]);*/
    }


    /*    public function saveDraft(Request $request)
        {
            // Validation renforcée
            $validated = $request->validate([
                'content' => 'required|string',
                'templateId' => [
                    'required',
                    'integer',
                    Rule::exists('template', 'id')->where(function ($query) {
                        $query->where('is_active', true); // Exemple de condition supplémentaire
                    })
                ]
            ]);

            // Vérifier si l'utilisateur a déjà un brouillon pour ce template
            $existingDraft = TempTemplate::where('user_id', auth()->id())
                ->where('original_id', $validated['templateId'])
                ->first();

            if ($existingDraft) {
                // Si un brouillon existe, on met à jour le contenu seulement
                $existingDraft->update([
                    'content' => $validated['content'],
                    'updated_at' => now() // Mettre à jour le champ updated_at
                ]);
            } else {
                // Sinon, créer un nouveau brouillon
                TempTemplate::create([
                    'user_id' => auth()->id(),
                    'original_id' => $validated['templateId'],
                    'content' => $validated['content'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return response()->json([
                'success' => true,
            ]);
        }*/

    /* public function saveDraft(Request $request)
     {
         // Validation renforcée
         $validated = $request->validate([
             'content' => 'required|string',
             'templateId' => [
                 'required',
                 'integer',
                 Rule::exists('template', 'id')->where(function ($query) {
                     $query->where('is_active', true); // Exemple de condition supplémentaire
                 })
             ]
         ]);


         TempTemplate::updateOrCreate(
             ['user_id' => auth()->id(), 'original_id' => $validated['templateId']],
             [
                 'content' => $validated['content'],
                 'updated_at' => now() // Ajoute ici la mise à jour de `updated_at`
             ]
         );

         return response()->json([
             'success' => true,
         ]);
     }*/





    //test

    // Récupérer le contenu original du template
    public function original($id)
    {
        $template = Template::findOrFail($id);
        return response()->json([
            'content' => $template->filePath
        ]);
    }



}
