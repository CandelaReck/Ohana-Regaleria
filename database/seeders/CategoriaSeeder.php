<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::create(['nombre' => 'Accesorios',   'descripcion' => 'Bijouterie y accesorios de moda']);
        Categoria::create(['nombre' => 'Indumentaria', 'descripcion' => 'Ropa y prendas de vestir']);
        Categoria::create(['nombre' => 'Combos',       'descripcion' => 'Combos y sets de regalo']);
        Categoria::create(['nombre' => 'Papeleria',    'descripcion' => 'Artículos de papelería y escritorio']);
        Categoria::create(['nombre' => 'Deco Hogar',   'descripcion' => 'Decoración y artículos para el hogar']);
    }
}
