<?php

namespace App\Http\Controllers;

use App\Models\UserInput;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class GreetingController extends Controller
{
    public function getSites() {
        $user_id = session('user_id');

        $sites = UserInput::where('user_id', $user_id)->get();

        return view('greeting', [
            'sites' => $sites,
        ]);
    }
}
