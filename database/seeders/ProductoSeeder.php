<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [

            [
                'nombre' => 'Collar Minimalista',
                'descripcion' => 'Collar dorado delicado',
                'precio' => 5500,
                'stock' => 12,
                'categoria' => 'Accesorios',
                'url_imagen' => 'https://picsum.photos/300?1',
                'activo' => true,
            ],

            [
                'nombre' => 'Pulsera de Acero',
                'descripcion' => 'Pulsera moderna unisex',
                'precio' => 4200,
                'stock' => 8,
                'categoria' => 'Accesorios',
                'url_imagen' => 'https://picsum.photos/300?2',
                'activo' => true,
            ],

            [
                'nombre' => 'Buzo Oversize',
                'descripcion' => 'Buzo algodón premium',
                'precio' => 15000,
                'stock' => 5,
                'categoria' => 'Indumentaria',
                'url_imagen' => 'https://picsum.photos/300?3',
                'activo' => true,
            ],

            [
                'nombre' => 'Remera Estampada',
                'descripcion' => 'Remera estética vintage',
                'precio' => 9800,
                'stock' => 10,
                'categoria' => 'Indumentaria',
                'url_imagen' => 'https://picsum.photos/300?4',
                'activo' => true,
            ],

            [
                'nombre' => 'Box Cumpleaños',
                'descripcion' => 'Caja sorpresa completa',
                'precio' => 18000,
                'stock' => 4,
                'categoria' => 'Combos',
                'url_imagen' => 'https://picsum.photos/300?5',
                'activo' => true,
            ],

            [
                'nombre' => 'Combo Relax',
                'descripcion' => 'Vela + taza + chocolates',
                'precio' => 13500,
                'stock' => 6,
                'categoria' => 'Combos',
                'url_imagen' => 'https://picsum.photos/300?6',
                'activo' => true,
            ],

            [
                'nombre' => 'Agenda 2026',
                'descripcion' => 'Agenda semanal pastel',
                'precio' => 7000,
                'stock' => 15,
                'categoria' => 'Papeleria',
                'url_imagen' => 'https://picsum.photos/300?7',
                'activo' => true,
            ],

            [
                'nombre' => 'Set de Resaltadores',
                'descripcion' => 'Pack x6 colores suaves',
                'precio' => 3500,
                'stock' => 20,
                'categoria' => 'Papeleria',
                'url_imagen' => 'https://picsum.photos/300?8',
                'activo' => true,
            ],

            [
                'nombre' => 'Vela Aromática',
                'descripcion' => 'Vela de soja aroma vainilla',
                'precio' => 4800,
                'stock' => 11,
                'categoria' => 'Deco Hogar',
                'url_imagen' => 'https://picsum.photos/300?9',
                'activo' => true,
            ],

            [
                'nombre' => 'Cuadro Decorativo',
                'descripcion' => 'Decoración minimalista moderna',
                'precio' => 9200,
                'stock' => 7,
                'categoria' => 'Deco Hogar',
                'url_imagen' => 'https://picsum.photos/300?10',
                'activo' => true,
            ],

        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}
