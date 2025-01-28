<?php

namespace App\Http\Controllers;

use App\Models\UserInput;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class InputUserController extends Controller
{
    //
    public function index(){
        return view('inputuser');
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
//        $template_id = 1;
        if ($request->hasFile('logoUrl')) {
            // Envoi de l'image à Cloudinary
            $uploadedFileUrl = Cloudinary::upload($request->file('logoUrl')->getRealPath(), [
                'folder' => 'logos', // Optionnel : Nom du dossier
            ])->getSecurePath();
        }
        UserInput::create( [
            'siteName'=> $siteName,
            'description' => $description,
            'logoUrl' => $uploadedFileUrl,
            'faveIcon' => $faveIcon,
            'color1' => $color1,
            'color2' => $color2,
            'color3' => $color3,
//            'template_id' => $template_id,
        ]);
        return to_route('templates');
    }

}
