<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('account');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect to home if successful
            return redirect('/');
        }

        return back()->withErrors([
            'message' => 'Invalid credentials'
        ]);
    }

    // Handle registration
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:50',
            'role' => 'required|string|role|max:20',
            'password' => 'required|string|max:50',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'role' => $validatedData['role'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
