<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\UserInput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InputUserController extends Controller
{
    //
    public function index()
    {
        return view('inputuser');
    }

    public function store(Request $request)
    {
        //        $request->
        $siteName = $request->siteName;
        $description = $request->description;
        $logoUrl = $request->logoUrl;
        $faveIcon = $request->faveIcon;
        $color1 = $request->color1;
        $color2 = $request->color2;
        $color3 = $request->color3;
        $template_id = 6;

        $cloudinaryLogoImage = $request->file('logoUrl')->storeOnCloudinary('logos');
        $logo_url = $cloudinaryLogoImage->getSecurePath();
        $public_logo_id = $cloudinaryLogoImage->getPublicId();

        $cloudinaryIconImage = $request->file('faveIcon')->storeOnCloudinary('icons');
        $icon_url = $cloudinaryIconImage->getSecurePath();
        $public_icon_id = $cloudinaryIconImage->getPublicId();

        Session::put(
            'siteName', $siteName
        );

        UserInput::create([
            'siteName' => $siteName,
            'description' => $description,
            'logoUrl' => $logo_url,
            'faveIcon' => $icon_url,
            'color1' => $color1,
            'color2' => $color2,
            'color3' => $color3,
            'template_id' => $template_id,
        ]);
        return to_route('comp.chose_comp');
    }
}
