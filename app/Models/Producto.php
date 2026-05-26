<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'categoria_id',
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'url_imagen',
        'activo',
    ];

    protected $casts = [
        'precio'  => 'decimal:2',
        'stock'   => 'integer',
        'activo'  => 'boolean',
    ];

    // Un producto pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
