<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Component;
use App\Models\ComponentContent;
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

    public function getUserInputId()
    {
        $siteName = Session::get('siteName', 'Default Site Name');


        //return UserInput::where('siteName', $siteName)->first()->id;
        return 16; // For testing purposes, return a static ID
    }

    public function saveContent(Request $request)
    {


        try {

            $user_input_id = $this->getUserInputId();
            $component_id = $request->component_id;

            $cloudinaryHeroImage = $request->file('hero_img')->storeOnCloudinary('hero');
            $hero_url = $cloudinaryHeroImage->getSecurePath();
            $public_hero_id = $cloudinaryHeroImage->getPublicId();

            // Get all request data
            $requestData = $request->all();

            $requestData['hero_img'] = $hero_url;
            unset($requestData['component_id'], $requestData['_token']);

            $json_data = json_encode($requestData);

            // Create a new ComponentContent record
            $componentContent = ComponentContent::create([
                'content' => $json_data,
                'component_id' => $component_id,
                'userInput_id' =>  $user_input_id,
            ]);

            return redirect()->back()->with('success', 'Content saved successfully!');
        } catch (\Exception $e) {
            Log::error('Component Content Save Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Error saving component content');
        }
    }
}
