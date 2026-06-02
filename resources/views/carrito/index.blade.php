@extends('layouts.app')

@section('title', 'Mi Carrito')

@section('content')
<section class="carrito-section py-5">
<div class="container">

    <div class="text-center mb-5">
        <h2>Mi Carrito</h2>
    </div>

    @if($items->isEmpty())
    <div class="carrito-vacio text-center py-5">
        <div class="carrito-vacio-icono">🛍️</div>
        <h3>Tu carrito está vacío</h3>
        <p>Todavía no agregaste ningún producto.</p>
        <a href="{{ route('productos') }}" class="btn btn-primary mt-3">Ver productos</a>
    </div>
    @else

    <div class="row g-4">

        {{-- TABLA DE PRODUCTOS --}}
        <div class="col-lg-8">
            <div class="carrito-card">
                @foreach($items as $item)

                @php
                    $esArray  = is_array($item);
                    $itemId   = $esArray ? $item['producto_id'] : $item->id;
                    $nombre   = $esArray ? ($item['nombre'] ?? 'Producto') : $item->producto->nombre;
                    $precio   = $esArray ? $item['precio_unitario'] : $item->precio_unitario;
                    $cantidad = $esArray ? $item['cantidad'] : $item->cantidad;
                @endphp

                <div class="carrito-item">
                    <div class="carrito-item-info">
                        <h5>{{ $nombre }}</h5>
                        <span class="carrito-precio">${{ number_format($precio, 0, ',', '.') }}</span>
                    </div>
                    <div class="carrito-item-acciones">
                        <form method="POST" action="{{ route('carrito.actualizar', $itemId) }}" class="d-flex align-items-center gap-2">
                            @csrf
                            @method('PUT')
                            <input type="number" name="cantidad"
                                   value="{{ $cantidad }}"
                                   min="1" class="form-control carrito-cantidad">
                            <button class="btn btn-sm btn-outline-secondary">Actualizar</button>
                        </form>
                        <div class="carrito-subtotal">
                            ${{ number_format($precio * $cantidad, 0, ',', '.') }}
                        </div>
                        <form method="POST" action="{{ route('carrito.eliminar', $itemId) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn-eliminar">✕</button>
                        </form>
                    </div>
                </div>
                @if(!$loop->last)<hr class="carrito-divider">@endif
                @endforeach

                <div class="carrito-footer-card">
                    <form method="POST" action="{{ route('carrito.vaciar') }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm">Vaciar carrito</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- RESUMEN Y FORMULARIO --}}
        <div class="col-lg-4">
            <div class="carrito-resumen">
                <h4>Resumen del pedido</h4>
                <div class="resumen-total">
                    <span>Total</span>
                    <span class="resumen-monto">${{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <hr>

                @auth
                <form method="POST" action="{{ route('pedidos.store') }}">
                    @csrf
                    <h5 class="mb-3">Datos de envío</h5>
                    <div class="mb-3">
                        <label class="form-label">Nombre completo *</label>
                        <input type="text" name="cliente_nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="cliente_email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="cliente_telefono" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección de envío</label>
                        <textarea name="cliente_direccion" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Método de pago *</label>
                        <select name="metodo_pago" class="form-select" required>
                            <option value="">Seleccioná uno</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="transferencia">Transferencia</option>
                            <option value="tarjeta_debito">Tarjeta de Débito</option>
                            <option value="tarjeta_credito">Tarjeta de Crédito</option>
                            <option value="mercado_pago">Mercado Pago</option>
                        </select>
                    </div>
                    <button class="btn btn-primary w-100">Confirmar compra</button>
                </form>

                @else
                <div class="text-center py-3">
                    <p class="mb-3">Para confirmar tu compra necesitás iniciar sesión.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-2">
                        Iniciar sesión
                    </a>
                    <a href="{{ route('registro') }}" class="btn btn-outline-secondary w-100">
                        Crear cuenta
                    </a>
                    <p class="text-muted mt-3" style="font-size:13px">
                        Tu carrito se guardará al iniciar sesión 🛍️
                    </p>
                </div>
                @endauth

            </div>
        </div>

    </div>
    @endif

</div>
</section>

<style>
.carrito-section { background: var(--crema); }

.carrito-badge {
    background: #f4ead8;
    color: var(--verde-oscuro);
    padding: 8px 16px;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    display: inline-block;
}

.carrito-vacio-icono { font-size: 64px; margin-bottom: 16px; }

.carrito-card {
    background: white;
    border-radius: 22px;
    padding: 28px;
    box-shadow: 0 10px 24px rgba(0,0,0,.06);
}

.carrito-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    padding: 12px 0;
    flex-wrap: wrap;
}

.carrito-item-info h5 {
    font-size: 20px;
    margin-bottom: 4px;
}

.carrito-precio {
    color: var(--dorado);
    font-weight: 600;
    font-size: 16px;
}

.carrito-item-acciones {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

.carrito-cantidad {
    width: 70px !important;
    text-align: center;
    border-radius: 12px !important;
}

.carrito-subtotal {
    font-weight: 700;
    font-size: 18px;
    color: var(--verde-oscuro);
    min-width: 80px;
    text-align: right;
}

.btn-eliminar {
    background: none;
    border: none;
    color: #c0392b;
    font-size: 18px;
    cursor: pointer;
    padding: 4px 8px;
    border-radius: 8px;
    transition: .2s;
}

.btn-eliminar:hover { background: #fdecea; }

.carrito-divider { border-color: #f0e8dc; margin: 4px 0; }

.carrito-footer-card {
    margin-top: 16px;
    padding-top: 16px;
    border-top: 1px solid #f0e8dc;
}

.carrito-resumen {
    background: white;
    border-radius: 22px;
    padding: 28px;
    box-shadow: 0 10px 24px rgba(0,0,0,.06);
    position: sticky;
    top: 100px;
}

.carrito-resumen h4 {
    font-size: 26px;
    margin-bottom: 16px;
}

.carrito-resumen h5 {
    font-size: 20px;
}

.resumen-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 18px;
    font-weight: 600;
}

.resumen-monto {
    font-size: 28px;
    font-weight: 700;
    color: var(--dorado);
}
</style>

@endsection