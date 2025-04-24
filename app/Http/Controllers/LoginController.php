<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function show()
    {
        return view('login.show');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = DB::table('users')->where('email', $email)->first();
//        if ($user && Hash::check($password, $user->password)) {
//            Auth::loginUsingId($user->id);
//            dd(true);
//        } else {
//            dd(false);
//        }
        if ($user && Hash::check($password, $user->password)) {
            Auth::loginUsingId($user->id);
            $request->session()->regenerate();
            Session::put('user_id', $user->id);
            Session::put('user_first_name', $user->first_name);
            Session::put('user_last_name', $user->last_name);
            Session::put('subscription', $user->subscribed);

            return to_route('gretting')->with('success', 'Bienvenue sur cette page ' . $user->name . ' .');
        } else {
            return back()->withErrors([
                'email' => 'Login ou mot de passe incorrect'
            ])->onlyInput('email');
        }


    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return to_route('login');
    }
}
