<?php

namespace App\Http\Controllers;

use App\Models\UserInput;
use Illuminate\Http\Request;

class InputUserController extends Controller
{
    //
    public function index(){
        return view('inputUser');
    }
    public function store(Request $request){
//        $request->
        $siteName = $request->siteName;
        $description = $request->description;
        $logoUrl = $request->logoUrl;
        $faveIcon = $request->faveIcon;
        $color1 = $request->color1;
        $color2 = $request->color2;
        $color3 = $request->color3;
        $template_id = 1;
        UserInput::create( [
            'siteName'=> $siteName,
            'description' => $description,
            'logoUrl' => $logoUrl,
            'faveIcon' => $faveIcon,
            'color1' => $color1,
            'color2' => $color2,
            'color3' => $color3,
            'template_id' => $template_id,
        ]);
    }
}
