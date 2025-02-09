<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTemplateRequest;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\UserInput;
use App\Service\TemplateService;

//class TemplatesController extends Controller
//{
//    //
////    public function index(){
////        return view('templateso');
////    }
//    public function index(){
//        $templateDir = public_path('templateso/original');
//        // Récupération des fichiers (ici vous pouvez filtrer par extension .html par exemple)
//        $templateso = array_filter(scandir($templateDir), function($file) use ($templateDir) {
//            return is_file($templateDir . '/' . $file) && pathinfo($file, PATHINFO_EXTENSION) === 'html';
//        });
//
//        return view('templateso.index', compact('templateso'));
//    }
//
//
//    public function choose(Request $request)
//    {
//        $templateName = $request->input('templateName');
//
//        // Récupérer l'enregistrement de l'utilisateur (ici, à titre d'exemple, par siteName stocké en session)
//        $siteName = session('siteName');
//        $userInput = UserInput::where('siteName', $siteName)->first();
//
//        if (!$userInput) {
//            return redirect()->back()->with('error', 'Aucune information utilisateur trouvée.');
//        }
//
//        // Mettez à jour le champ correspondant, par exemple si vous utilisez un champ 'template' ou 'template_id'
//        $userInput->template_id = $templateName; // ou vous pouvez sauvegarder le nom du fichier
//        $userInput->save();
//
//        return redirect()->route('templateso.preview', ['templateName' => $templateName])
//            ->with('success', 'Template choisi avec succès!');
//    }
//
//
////    public function getUserInputId() {
////        $siteName = Session::get('siteName', 'Default Site Name');
////
////        return UserInput::where('siteName', $siteName)->first()->id;
////    }
//
////    public function choseTemplate(Request $request) {
////        $userInputId = $this->getUserInputId();
////        $templateId = $request->input('name');
////
////        // Update the user input with the selected template ID
////        $userInput = UserInput::find($userInputId);
////        $userInput->template_id = $templateId;
////        $userInput->save();
////
////        return redirect()->route('comp.chose_comp')->with('success', 'Template choisi avec succès!');
////    }
//    protected $templateService;
//
//    public function __construct(TemplateService $templateService)
//    {
//        $this->templateService = $templateService;
//    }
//
//    public function preview($templateName)
//    {
//        $templatePath = $this->templateService->getTemplatePath($templateName);
//        return view('templateso.preview', ['templatePath' => $templatePath]);
//    }
//    public function edit($templateName)
//    {
//        $templatePath = $this->templateService->getTemplatePath($templateName);
//        return view('templateso.editor', ['templatePath' => $templatePath, 'templateName' => $templateName]);
//    }
//
//    public function update(UpdateTemplateRequest $request, $templateName)
//    {
//        $modifiedContent = $request->input('content');
//        $this->templateService->saveModifiedTemplate($templateName, $modifiedContent);
//
//        return redirect()->route('template.preview', ['templateName' => $templateName])
//            ->with('success', 'Template modifié avec succès.');
//    }
//
//    public function download($templateName)
//    {
//        $zipPath = $this->templateService->createZip($templateName);
//        return response()->download($zipPath)->deleteFileAfterSend(true);
//    }
//}
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


    public function edit($id)
    {
        $template = Template::findOrFail($id);
        $templateUrl = route('templateso.content', ['id' => $template->id]);

        return view('templateso.edit', compact('template', 'templateUrl'));
    }




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



    /*public function preview($templateName)
    {
        $templatePath = asset("templatesss/original/$templateName");
//        dd($templatePath);
        return view('templateso.preview', compact('templatePath'));
    }


    public function edit($templateName)
    {
        $templatePath = $this->templateService->getTemplatePath($templateName);
        return view('templateso.editor', ['templatePath' => $templatePath, 'templateName' => $templateName]);
    }*/

    public function update(UpdateTemplateRequest $request, $templateName)
    {
        $modifiedContent = $request->input('content');
        $this->templateService->saveModifiedTemplate($templateName, $modifiedContent);

        return redirect()->route('templateso.preview', ['templateName' => $templateName])
            ->with('success', 'Template modifié avec succès.');
    }

    public function download($templateName)
    {
        $zipPath = $this->templateService->createZip($templateName);
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
