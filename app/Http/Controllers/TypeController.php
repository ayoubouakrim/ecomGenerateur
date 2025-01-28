<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Component;
use App\Models\ComponentContent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\UserInput;

class TypeController extends Controller
{
    public function index()
    {
        
        $allComponents = Component::all();
        $types = Type::all(); 

        return view('comp.chose_comp', compact(
         'allComponents',
         'types'
    ));
    }

    public function getUserInputId() {
        $siteName = Session::get('siteName', 'Default Site Name');
        
        return UserInput::where('siteName', $siteName)->first()->id;
    }


    public function saveComponentContent(Request $request)
    {
        try {

            $user_input_id = $this->getUserInputId();
            
            // Validate the incoming request
            $validatedData = $request->validate([
                'component_id' => 'required|numeric|exists:component,id',
                'content' => 'required|array'
            ]);

            // Create a new ComponentContent record
            $componentContent = ComponentContent::create([
                'content' => json_encode($validatedData['content']),
                'component_id' => $validatedData['component_id'],
                'userInput_id' =>  $user_input_id,
            ]);

            return response()->json([
                'message' => 'Component content saved successfully',
                'id' => $componentContent->id
            ], 200);

        } catch (\Exception $e) {
            Log::error('Component Content Save Error: ' . $e->getMessage());

            return response()->json([
                'message' => 'Error saving component content',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
