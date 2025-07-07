<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function LoginForm()
    {
        return view('auth.login');
    }
    public function Login(Request $request)
    {
        $request->validate(
            [
                "email" => "required|email",
                "contrasenia" => "required"
            ]
        );
        $credentials = [
            "email" => $request->input("email"),
            "password" => $request->input("contrasenia")
        ];

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Credenciales incorrectas']);
        }

        $request->session()->regenerate(); // Protege contra session fixation

        return redirect()->route('dashboard');
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginForm');
    }
}
