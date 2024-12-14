<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('register');
    }

    public function store() {
        $validated = request()->validate(
            [
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'phone' => 'required|min:3|max:255',
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:8|',
            ]
            );
        
        User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone' => $validated['phone'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'] ),
        ]);

        return redirect()->route('login.show')
                         ->with('success', 'Registration successful! Please login.');
    }
}
