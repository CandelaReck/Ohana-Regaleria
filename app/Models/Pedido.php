<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cliente_nombre', 'cliente_email',
        'cliente_telefono', 'cliente_direccion',
        'estado', 'metodo_pago', 'estado_pago',
        'subtotal', 'descuento', 'total', 'notas',
    ];
    public function items(){
        return $this->hashMany(PedidoItem::class);
    }
}
