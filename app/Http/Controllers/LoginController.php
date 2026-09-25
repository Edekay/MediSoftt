<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credenciales)) {

            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()->with('error', 'El correo o la contraseña son incorrectos.');
    }
}