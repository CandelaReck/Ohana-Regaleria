<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /* ==========================================
       VISTA GENERAL - TODOS LOS PRODUCTOS
    ========================================== */
    public function index()
    {
        $productos = [

            /* INDUMENTARIA */
            ['nombre'=>'Pijama Print','descripcion'=>'Comodidad con estilo','precio'=>18500,'imagen'=>'pijamaPrint.jpeg'],
            ['nombre'=>'Pijama Kids','descripcion'=>'Diseño cómodo infantil','precio'=>13500,'imagen'=>'pijamaKid.jpeg'],
            ['nombre'=>'Campera Gab','descripcion'=>'Abrigo moderno premium','precio'=>22900,'imagen'=>'camperaGab.jpeg'],
            ['nombre'=>'Camiseta Rayas','descripcion'=>'Look casual boutique','precio'=>24500,'imagen'=>'camisetaRayas.jpeg'],
            ['nombre'=>'Conjunto Confy','descripcion'=>'Máxima comodidad diaria','precio'=>19900,'imagen'=>'conjuntoConfy.jpeg'],
            ['nombre'=>'Pollera Chic','descripcion'=>'Elegante y moderna','precio'=>25900,'imagen'=>'pollera.jpeg'],

            /* ACCESORIOS */
            ['nombre'=>'Reloj Mary','descripcion'=>'Elegancia diaria','precio'=>18500,'imagen'=>'reloj.jpeg'],
            ['nombre'=>'Pañuelo Boho','descripcion'=>'Diseño moderno','precio'=>13500,'imagen'=>'pañuelo.jpeg'],
            ['nombre'=>'Set Marilyn','descripcion'=>'Accesorios delicados','precio'=>22900,'imagen'=>'hebillas.jpeg'],
            ['nombre'=>'Collar Sydney','descripcion'=>'Ideal para regalar','precio'=>24500,'imagen'=>'collar.jpeg'],
            ['nombre'=>'Aritos Shine','descripcion'=>'Brillo sutil','precio'=>19900,'imagen'=>'aritos.jpeg'],
            ['nombre'=>'Collar Gold','descripcion'=>'Minimalista premium','precio'=>15900,'imagen'=>'collarOro.jpeg'],

            /* COMBOS */
            ['nombre'=>'Combo Picada','descripcion'=>'Cerveza + snacks','precio'=>35800,'imagen'=>'picada.jpeg'],
            ['nombre'=>'Combo Organizador','descripcion'=>'Orden de escritorio','precio'=>21500,'imagen'=>'comboOrg.jpeg'],
            ['nombre'=>'Combo Silky','descripcion'=>'Cuidado del cabello','precio'=>32900,'imagen'=>'comboSilk.jpeg'],
            ['nombre'=>'Combo Dulce','descripcion'=>'Taza + chocolates','precio'=>12000,'imagen'=>'taza + golosinas.jpeg'],

            /* PAPELERIA */
            ['nombre'=>'Agenda Jane','descripcion'=>'Organizá tu año','precio'=>11900,'imagen'=>'agenda.jpeg'],
            ['nombre'=>'Cuaderno Blue','descripcion'=>'Diseño delicado','precio'=>7800,'imagen'=>'cuaderno.jpeg'],
            ['nombre'=>'Lapicera Heart','descripcion'=>'4 colores disponibles','precio'=>6000,'imagen'=>'lapicera.jpeg'],
            ['nombre'=>'Sobre Universitario','descripcion'=>'Para apuntes','precio'=>8000,'imagen'=>'sobre.jpeg'],

            /* DECO */
            ['nombre'=>'Frasco Contenedor','descripcion'=>'Orden con estilo','precio'=>18500,'imagen'=>'frascoContenedor.jpeg'],
            ['nombre'=>'Juego de Sábanas','descripcion'=>'Confort total','precio'=>13500,'imagen'=>'juegoSabanas.jpeg'],
            ['nombre'=>'Cuadro Decorativo','descripcion'=>'Diseño moderno','precio'=>22900,'imagen'=>'cuadroDecorativo.jpeg'],
            ['nombre'=>'Espejo Premium','descripcion'=>'Elegancia visual','precio'=>24500,'imagen'=>'espejo.jpeg'],
            ['nombre'=>'Florero Boutique','descripcion'=>'Detalles únicos','precio'=>19900,'imagen'=>'florero.jpeg'],
            ['nombre'=>'Esfera Decorativa','descripcion'=>'Toque sofisticado','precio'=>25900,'imagen'=>'esferaDecorativa.jpeg'],

        ];

        return view('productos', compact('productos'));
    }

    /* ==========================================
       ACCESORIOS
    ========================================== */
    public function accesorios()
    {
        $productos = [

            ['nombre'=>'Reloj Mary','descripcion'=>'Elegancia diaria','precio'=>18500,'imagen'=>'reloj.jpeg'],
            ['nombre'=>'Pañuelo Boho','descripcion'=>'Diseño moderno','precio'=>13500,'imagen'=>'pañuelo.jpeg'],
            ['nombre'=>'Set Marilyn','descripcion'=>'Accesorios delicados','precio'=>22900,'imagen'=>'hebillas.jpeg'],
            ['nombre'=>'Collar Sydney','descripcion'=>'Ideal para regalar','precio'=>24500,'imagen'=>'collar.jpeg'],
            ['nombre'=>'Aritos Shine','descripcion'=>'Brillo sutil','precio'=>19900,'imagen'=>'aritos.jpeg'],
            ['nombre'=>'Collar Gold','descripcion'=>'Minimalista premium','precio'=>15900,'imagen'=>'collarOro.jpeg'],

        ];

        return view('accesorios', compact('productos'));
    }

    /* ==========================================
       INDUMENTARIA
    ========================================== */
    public function indumentaria()
    {
        $productos = [

            ['nombre'=>'Pijama Print','descripcion'=>'Comodidad con estilo','precio'=>18500,'imagen'=>'pijamaPrint.jpeg'],
            ['nombre'=>'Pijama Kids','descripcion'=>'Diseño cómodo infantil','precio'=>13500,'imagen'=>'pijamaKid.jpeg'],
            ['nombre'=>'Campera Gab','descripcion'=>'Abrigo moderno premium','precio'=>22900,'imagen'=>'camperaGab.jpeg'],
            ['nombre'=>'Camiseta Rayas','descripcion'=>'Look casual boutique','precio'=>24500,'imagen'=>'camisetaRayas.jpeg'],
            ['nombre'=>'Conjunto Confy','descripcion'=>'Máxima comodidad diaria','precio'=>19900,'imagen'=>'conjuntoConfy.jpeg'],
            ['nombre'=>'Pollera Chic','descripcion'=>'Elegante y moderna','precio'=>25900,'imagen'=>'pollera.jpeg'],

        ];

        return view('indumentaria', compact('productos'));
    }

    /* ==========================================
       COMBOS
    ========================================== */
    public function combos()
    {
        $productos = [

            ['nombre'=>'Combo Picada','descripcion'=>'Cerveza + snacks','precio'=>35800,'imagen'=>'picada.jpeg'],
            ['nombre'=>'Combo Organizador','descripcion'=>'Orden de escritorio','precio'=>21500,'imagen'=>'comboOrg.jpeg'],
            ['nombre'=>'Combo Silky','descripcion'=>'Cuidado del cabello','precio'=>32900,'imagen'=>'comboSilk.jpeg'],
            ['nombre'=>'Combo Dulce','descripcion'=>'Taza + chocolates','precio'=>12000,'imagen'=>'taza + golosinas.jpeg'],

        ];

        return view('combos', compact('productos'));
    }

    /* ==========================================
       PAPELERIA
    ========================================== */
    public function papeleria()
    {
        $productos = [

            ['nombre'=>'Agenda Jane','descripcion'=>'Organizá tu año','precio'=>11900,'imagen'=>'agenda.jpeg'],
            ['nombre'=>'Cuaderno Blue','descripcion'=>'Diseño delicado','precio'=>7800,'imagen'=>'cuaderno.jpeg'],
            ['nombre'=>'Lapicera Heart','descripcion'=>'4 colores disponibles','precio'=>6000,'imagen'=>'lapicera.jpeg'],
            ['nombre'=>'Sobre Universitario','descripcion'=>'Para apuntes','precio'=>8000,'imagen'=>'sobre.jpeg'],

        ];

        return view('papeleria', compact('productos'));
    }

    /* ==========================================
       DECO Y HOGAR
    ========================================== */
    public function decoHogar()
    {
        $productos = [

            ['nombre'=>'Frasco Contenedor','descripcion'=>'Orden con estilo','precio'=>18500,'imagen'=>'frascoContenedor.jpeg'],
            ['nombre'=>'Juego de Sábanas','descripcion'=>'Confort total','precio'=>13500,'imagen'=>'juegoSabanas.jpeg'],
            ['nombre'=>'Cuadro Decorativo','descripcion'=>'Diseño moderno','precio'=>22900,'imagen'=>'cuadroDecorativo.jpeg'],
            ['nombre'=>'Espejo Premium','descripcion'=>'Elegancia visual','precio'=>24500,'imagen'=>'espejo.jpeg'],
            ['nombre'=>'Florero Boutique','descripcion'=>'Detalles únicos','precio'=>19900,'imagen'=>'florero.jpeg'],
            ['nombre'=>'Esfera Decorativa','descripcion'=>'Toque sofisticado','precio'=>25900,'imagen'=>'esferaDecorativa.jpeg'],

        ];

        return view('decoHogar', compact('productos'));
    }
}