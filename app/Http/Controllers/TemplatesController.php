<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTemplateRequest;
use App\Models\Template;
use App\Models\TempTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\UserInput;
use App\Service\TemplateService;


class TemplatesController extends Controller
{
    protected $templateService;

    public function __construct(TemplateService $templateService)
    {
        $this->templateService = $templateService;
    }
    public function index()
    {
        // Récupérer tous les templates depuis la base de données
        $templates = Template::all();
        /*()->map(function ($template) {
            return [
                'name' => $template->name, // Supposons que 'nom' contient le nom du fichier
                'content' => $template->filepath // Le contenu HTML stocké dans la BD
            ];
        });*/
//        dd($templates);
        return view('templateso.index', compact('templates'));
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

    // Afficher le contenu du template temporaire
    public function tempContent($id)
    {
        $tempTemplate = TempTemplate::findOrFail($id);
        return response($tempTemplate->content)->header('Content-Type', 'text/html');
    }

    // Sauvegarder les modifications temporaires
    public function saveDraft(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required',
            'templateId' => 'required|exists:templates,id'
        ]);

        // Mettre à jour ou créer le template temporaire
        TempTemplate::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'original_id' => $validated['templateId']
            ],
            ['content' => $validated['content']]
        );

        return response()->json(['success' => true]);
    }

    //test

    // Récupérer le contenu original du template
    public function original($id)
    {
        $template = Template::findOrFail($id);
        return response()->json([
            'content' => $template->filePath
        ]);
    }


/*    public function deploySite(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'templateId' => 'required|exists:templates,id'
        ]);

        // Créer un répertoire temporaire
        $tempDir = storage_path('app/public/temp-' . uniqid());
        mkdir($tempDir);

        // Sauvegarder le contenu HTML
        file_put_contents("$tempDir/index.html", $request->input('content'));

        // Créer un dépôt GitHub
        $repoName = 'site-' . uniqid();
        $githubToken = config('services.github.token'); // À configurer dans .env

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $githubToken,
            'Accept' => 'application/vnd.github.v3+json'
        ])->post('https://api.github.com/user/repos', [
            'name' => $repoName,
            'private' => false
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Erreur lors de la création du dépôt GitHub'], 500);
        }

        $repoUrl = $response->json()['html_url'];
        $cloneUrl = $response->json()['clone_url'];

        // Pousser le site sur GitHub
        exec("cd $tempDir && git init && git add . && git commit -m 'Initial commit' && git branch -M main && git remote add origin $cloneUrl && git push -u origin main");

        // Activer GitHub Pages
        $pagesResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $githubToken,
            'Accept' => 'application/vnd.github.v3+json'
        ])->post("https://api.github.com/repos/{$response->json()['owner']['login']}/$repoName/pages", [
            'source' => [
                'branch' => 'main',
                'path' => '/'
            ]
        ]);

        if ($pagesResponse->failed()) {
            return response()->json(['error' => 'Erreur lors de l\'activation de GitHub Pages'], 500);
        }

        // Nettoyer le répertoire temporaire
        Storage::deleteDirectory($tempDir);

        return response()->json([
            'url' => "https://{$response->json()['owner']['login']}.github.io/$repoName"
        ]);
    }*/
}
