@extends('layouts.app')

@section('content')

<section class="categoria-hero py-5">

<div class="container">

    <!-- TITULO PREMIUM -->
    <div class="text-center mb-5">

        <span class="contact-badge">✨ Colección Ohana</span>

        <h1 class="mt-3">Accesorios</h1>

        <p class="categoria-subtitle">
            Detalles delicados, modernos y especiales para complementar tu estilo
            o sorprender con un regalo único.
        </p>

    </div>

    <!-- PRODUCTOS -->
    <div class="row g-4">

        @foreach($productos as $producto)

        <div class="col-6 col-md-4 col-lg-3">

            <div class="card h-100 shadow border-0">

                <img src="{{ $producto->url_imagen ?? asset('img/placeholder.jpg') }}"
     class="card-img-top producto-foto"
     alt="{{ $producto->nombre }}"
     style="height: 250px; object-fit: cover;">

<div class="card-body text-center d-flex flex-column">
    <h5>{{ $producto->nombre }}</h5>
    <p class="text-muted">{{ $producto->descripcion }}</p>
    <h4 class="text-success mb-3">
        ${{ number_format($producto->precio, 0, ',', '.') }}
    </h4>

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
