@extends('layouts.app')

@section('content')

<section class="productos-premium py-5">

<div class="container">

    <!-- ENCABEZADO -->
    <div class="text-center mb-5">
        <span class="categoria-badge">✨ Colección Ohana</span>

        <h1 class="mt-3">
            Nuestros Productos
        </h1>

        <p class="categoria-subtitle">
            Regalos únicos, detalles especiales y productos pensados
            para sorprender en cada ocasión.
        </p>
    </div>

    <!-- GRID -->
    <div class="row g-4">

        @foreach($productos as $producto)

        <div class="col-6 col-md-4 col-lg-3">

            <div class="producto-box h-100">

                <!-- FOTO -->
                <div class="producto-img-box">
                    <img
                        src="{{ asset('img/' . $producto['imagen']) }}"
                        class="producto-img"
                        alt="{{ $producto['nombre'] }}">
                </div>

                <!-- INFO -->
                <div class="producto-info">

                    <span class="producto-mini-tag">
                        Destacado
                    </span>

                    <h4>
                        {{ $producto['nombre'] }}
                    </h4>

                    <p>
                        {{ $producto['descripcion'] }}
                    </p>

                    <div class="precio-producto">
                        ${{ number_format($producto['precio'],0,',','.') }}
                    </div>

                    <a href="#" class="btn btn-dark w-100 mt-auto">
                        Comprar
                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

</section>

@endsection