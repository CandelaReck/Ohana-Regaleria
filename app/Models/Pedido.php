<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PedidoItem;

class Pedido extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'cliente_nombre', 'cliente_email',
        'cliente_telefono', 'cliente_direccion',
        'estado', 'metodo_pago', 'estado_pago',
        'subtotal', 'descuento', 'total', 'notas',
    ];
    public function items(){
        return $this->hasMany(PedidoItem::class);
    }
}
