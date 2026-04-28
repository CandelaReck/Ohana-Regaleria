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
                    <img src="{{ asset('img/' . $producto['imagen']) }}"
                         class="producto-img"
                         alt="{{ $producto['nombre'] }}">
                </div>

                <!-- INFO -->
                <div class="producto-info">

                    <span class="producto-mini-tag">
                        Combo Especial
                    </span>

                    <h4>{{ $producto['nombre'] }}</h4>

                    <p>
                        {{ $producto['descripcion'] }}
                    </p>

                    <div class="precio mb-3">
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
