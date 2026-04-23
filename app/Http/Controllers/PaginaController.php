<?php

namespace App\Http\Controllers;

class PaginaController extends Controller
{
    public function contacto()
    {
        return view('contacto');
    }

    public function quienesSomos()
    {
        return view('quienes-somos');
    }

    public function comercializacion()
    {
        return view('comercializacion');
    }
}
