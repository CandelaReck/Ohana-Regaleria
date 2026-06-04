<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Http\Requests\ContactoRequest;

class ContactoController extends Controller
{
    public function enviar(ContactoRequest $request)
{
    Consulta::create([
        'nombre'   => $request->nombre,
        'email'    => $request->email,
        'whatsapp' => $request->telefono,
        'consulta' => $request->mensaje,
    ]);

    return redirect()->back()->with(
        'success_message',
        'Tu consulta ha sido enviada correctamente.'
    );
}
}

