<?php

namespace App\Http\Controllers;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = [

[
'nombre'=>'Indumentaria',
'descripcion'=>'Ropa pensada para impresionar',
'precio'=>18500,
'imagen'=>'pijamaPrint.jpeg'
],

[
'nombre'=>'Aritos Boutique',
'descripcion'=>'Detalles delicados para regalar',
'precio'=>7900,
'imagen'=>'aritos.jpeg'
],

[
'nombre'=>'Peluche Teddy',
'descripcion'=>'El regalo clásico que enamora',
'precio'=>12500,
'imagen'=>'peluche3.jpeg'
]

];

        return view('productos', compact('productos'));
    }
}
