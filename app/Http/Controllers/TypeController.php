<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Component;
use App\Models\ComponentContent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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


    public function saveComponentContent(Request $request)
    {
        try {
            // Validate the incoming request
            $validatedData = $request->validate([
                'component_id' => 'required|numeric|exists:component,id',
                'content' => 'required|array'
            ]);

            // Create a new ComponentContent record
            $componentContent = ComponentContent::create([
                'content' => json_encode($validatedData['content']),
                'component_id' => $validatedData['component_id'],
                'userInput_id' => auth()->id() ?? 1 ,
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
