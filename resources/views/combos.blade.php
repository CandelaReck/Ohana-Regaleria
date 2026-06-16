@extends('layouts.app')

@section('content')

<section class="productos-premium py-5">

<div class="container">

    <!-- ENCABEZADO -->
    <div class="text-center mb-5">
        <span class="categoria-badge">✨ Regalos exclusivos</span>
        <h1 class="mt-3">Boxes y Combos</h1>
        <p class="categoria-subtitle">
            Opciones listas para sorprender con estilo, amor y detalles únicos.
        </p>
    </div>

    <!-- GRID PRODUCTOS -->
    <div class="row g-4">

        @foreach($productos as $producto)

<div class="col-6 col-md-4 col-lg-3">
    <div class="producto-box h-100">

        <!-- FOTO -->
        <div class="producto-img-box">
            <img src="{{ $producto->url_imagen ?? asset('img/placeholder.jpg') }}"
     class="card-img-top producto-foto"
     alt="{{ $producto->nombre }}"
     style="height: 250px; object-fit: cover;">
        </div>

        <!-- INFO -->
<div class="producto-info">
    <span class="producto-mini-tag">Combo Especial</span>

    <h4>{{ $producto->nombre }}</h4>
    <p>{{ $producto->descripcion }}</p>

    <div class="precio mb-3">
        ${{ number_format($producto->precio, 0, ',', '.') }}
    </div>

    {{-- STOCK --}}
    <p class="small mb-2 
        {{ $producto->stock == 0 ? 'text-danger fw-bold' : ($producto->stock <= 3 ? 'text-warning fw-bold' : 'text-muted') }}">
        @if($producto->stock == 0)
            🚫 Próximamente disponible
        @elseif($producto->stock <= 3)
            ⚠️ ¡Últimas {{ $producto->stock }} unidades!
        @else
            Stock: {{ $producto->stock }} unidades
        @endif
    </p>

    <form method="POST" action="{{ route('carrito.agregar') }}">
        @csrf
        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
        <input type="hidden" name="cantidad" value="1">
        <input type="hidden" name="precio_unitario" value="{{ $producto->precio }}">
        <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
        <button type="submit" class="btn btn-dark w-100 mt-auto"
            {{ $producto->stock <= 0 ? 'disabled' : '' }}>
            {{ $producto->stock <= 0 ? 'Sin stock' : 'Agregar al carrito' }}
        </button>
    </form>
</div>

    </div>
</div>

@endforeach

    </div>

</div>

</section>

@endsection
