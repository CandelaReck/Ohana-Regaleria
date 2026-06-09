@if($items->isEmpty())
    <div class="text-center py-4">
        <div style="font-size:48px">🛍️</div>
        <p class="mt-2">Tu carrito está vacío</p>
        <a href="{{ route('productos') }}" class="btn btn-primary btn-sm">Ver productos</a>
    </div>
@else
    @php
        $esArray = is_array($items->first());
    @endphp

    @foreach($items as $item)
    @php
        $nombre   = $esArray ? ($item['nombre'] ?? 'Producto') : $item->producto->nombre;
        $precio   = $esArray ? $item['precio_unitario'] : $item->precio_unitario;
        $cantidad = $esArray ? $item['cantidad'] : $item->cantidad;
    @endphp
    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
        <div>
            <p class="mb-0 fw-semibold" style="font-size:15px">{{ $nombre }}</p>
            <small style="color:var(--dorado)">${{ number_format($precio, 0, ',', '.') }} x {{ $cantidad }}</small>
        </div>
        <span class="fw-bold" style="color:var(--verde-oscuro)">
            ${{ number_format($precio * $cantidad, 0, ',', '.') }}
        </span>
    </div>
    @endforeach

    <div class="d-flex justify-content-between fw-bold mb-4">
        <span>Total</span>
        <span style="color:var(--dorado); font-size:20px">${{ number_format($total, 0, ',', '.') }}</span>
    </div>

    <a href="{{ route('carrito.index') }}" class="btn btn-primary w-100">
        Ir al carrito
    </a>
@endif