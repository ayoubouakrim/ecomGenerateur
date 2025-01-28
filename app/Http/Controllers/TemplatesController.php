<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\UserInput;

class TemplatesController extends Controller
{
    //
    public function index(){
        return view('templates');
    }
    

    public function getUserInputId() {
        $siteName = Session::get('siteName', 'Default Site Name');
        
        return UserInput::where('siteName', $siteName)->first()->id;
    }

    public function choseTemplate(Request $request) {
        $userInputId = $this->getUserInputId();
        $templateId = $request->input('name');

        // Update the user input with the selected template ID
        $userInput = UserInput::find($userInputId);
        $userInput->template_id = $templateId;
        $userInput->save();

        return redirect()->route('comp.chose_comp')->with('success', 'Template choisi avec succès!');
    }

}
