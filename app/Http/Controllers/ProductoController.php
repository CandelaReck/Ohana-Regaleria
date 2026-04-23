<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = [

            [
                'nombre' => 'Pijama Print',
                'descripcion' => 'Comodidad con estilo.',
                'precio' => 18500,
                'imagen' => 'pijamaPrint.jpeg'
            ],

            [
                'nombre' => 'Aritos Boutique',
                'descripcion' => 'Detalles delicados para regalar.',
                'precio' => 7900,
                'imagen' => 'aritos.jpeg'
            ],

            [
                'nombre' => 'Peluche Teddy',
                'descripcion' => 'El clásico regalo que enamora.',
                'precio' => 12500,
                'imagen' => 'peluche3.jpeg'
            ]

        ];

        return view('productos', compact('productos'));
    }

    public function accesorios()
    {
        $productos = [

            [
                ['nombre'=>'Pijama Print','descripcion'=>'Comodidad total','precio'=>18500,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Remera Chic','descripcion'=>'Diseño moderno','precio'=>13500,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Bata Soft','descripcion'=>'Suave y elegante','precio'=>22900,'imagen'=>'remera.jpeg'],

        ['nombre'=>'Conjunto Cozy','descripcion'=>'Ideal invierno','precio'=>24500,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Sweater Love','descripcion'=>'Abrigado y lindo','precio'=>19900,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Pijama Satin','descripcion'=>'Elegancia total','precio'=>25900,'imagen'=>'remera.jpeg'],

        ['nombre'=>'Top Casual','descripcion'=>'Uso diario','precio'=>11900,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Buzo Urban','descripcion'=>'Canchero y cómodo','precio'=>21900,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Short Relax','descripcion'=>'Liviano y cómodo','precio'=>9800,'imagen'=>'remera.jpeg'],
            ]

        ];

        return view('accesorios', compact('productos'));
    }

    public function indumentaria()
{
    $productos = [

        ['nombre'=>'Pijama Print','descripcion'=>'Comodidad total','precio'=>18500,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Remera Chic','descripcion'=>'Diseño moderno','precio'=>13500,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Bata Soft','descripcion'=>'Suave y elegante','precio'=>22900,'imagen'=>'remera.jpeg'],

        ['nombre'=>'Conjunto Cozy','descripcion'=>'Ideal invierno','precio'=>24500,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Sweater Love','descripcion'=>'Abrigado y lindo','precio'=>19900,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Pijama Satin','descripcion'=>'Elegancia total','precio'=>25900,'imagen'=>'remera.jpeg'],

        ['nombre'=>'Top Casual','descripcion'=>'Uso diario','precio'=>11900,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Buzo Urban','descripcion'=>'Canchero y cómodo','precio'=>21900,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Short Relax','descripcion'=>'Liviano y cómodo','precio'=>9800,'imagen'=>'remera.jpeg'],

    ];

    return view('indumentaria', compact('productos'));
}

    public function combos()
    {
        $productos = [

            [
                'nombre' => 'Combo Romántico',
                'descripcion' => 'Peluche + chocolates.',
                'precio' => 24900,
                'imagen' => 'combo1.jpeg'
            ],

            [
                'nombre' => 'Combo Relax',
                'descripcion' => 'Vela + taza + té.',
                'precio' => 21500,
                'imagen' => 'combo2.jpeg'
            ],

            [
                'nombre' => 'Combo Premium',
                'descripcion' => 'Regalo completo especial.',
                'precio' => 32900,
                'imagen' => 'combo3.jpeg'
            ]

        ];

        return view('combos', compact('productos'));
    }

    public function papeleria()
    {
        $productos = [

            [
                'nombre' => 'Agenda Floral',
                'descripcion' => 'Organizá tu año con estilo.',
                'precio' => 11900,
                'imagen' => 'agenda.jpeg'
            ],

            [
                'nombre' => 'Cuaderno Pastel',
                'descripcion' => 'Diseño delicado y moderno.',
                'precio' => 7800,
                'imagen' => 'cuaderno.jpeg'
            ],

            [
                'nombre' => 'Set Lapiceras',
                'descripcion' => 'Ideal para estudiar o regalar.',
                'precio' => 5900,
                'imagen' => 'lapiceras.jpeg'
            ]

        ];

        return view('papeleria', compact('productos'));
    }

    public function decoHogar()
    {
        $productos = [

        ['nombre'=>'Pijama Print','descripcion'=>'Comodidad total','precio'=>18500,'imagen'=>'frascoContenedor.jpeg'],
        ['nombre'=>'Remera Chic','descripcion'=>'Diseño moderno','precio'=>13500,'imagen'=>'juegoSabanas.jpeg'],
        ['nombre'=>'Bata Soft','descripcion'=>'Suave y elegante','precio'=>22900,'imagen'=>'cuadroDecorativo.jpeg'],

        ['nombre'=>'Conjunto Cozy','descripcion'=>'Ideal invierno','precio'=>24500,'imagen'=>'espejo.jpeg'],
        ['nombre'=>'Sweater Love','descripcion'=>'Abrigado y lindo','precio'=>19900,'imagen'=>'florero.jpeg'],
        ['nombre'=>'Pijama Satin','descripcion'=>'Elegancia total','precio'=>25900,'imagen'=>'esferaDecorativa.jpeg'],

        ['nombre'=>'Top Casual','descripcion'=>'Uso diario','precio'=>11900,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Buzo Urban','descripcion'=>'Canchero y cómodo','precio'=>21900,'imagen'=>'remera.jpeg'],
        ['nombre'=>'Short Relax','descripcion'=>'Liviano y cómodo','precio'=>9800,'imagen'=>'remera.jpeg'],

    ];

        return view('decoHogar', compact('productos'));
    }
}