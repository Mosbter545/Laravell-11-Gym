<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('panel');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas. Verifica tu usuario y contraseña.',
        ])->withInput();
    }

    public function panel()
    {
        return view('panel');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}

