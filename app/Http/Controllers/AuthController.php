<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function mostrarLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        session([
            'usuario' => $request->email
        ]);

        return redirect()->route('home');
    }

    public function logout()
    {
        session()->forget('usuario');

        return redirect()->route('home');
    }

    public function mostrarRegistro()
    {
        return view('registro');
    }

    public function registrar(Request $request)
    {
        session([
            'usuario' => $request->email
        ]);

        return redirect()->route('home');
    }
}