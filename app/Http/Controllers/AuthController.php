<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'unique_code' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('unique_code', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'unique_code' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
}
