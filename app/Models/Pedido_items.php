<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido_items extends Model
{
    protected $fillable = [
        'pedido_id', 'producto_id',
        'producto_nombre', 'precio_unitario'
        'cantidad', 'subtotal',
    ];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
