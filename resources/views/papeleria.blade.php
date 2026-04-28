@extends('layouts.app')

@section('content')

<section class="categoria-hero py-5">

<div class="container">

    <!-- TITULO PREMIUM -->
    <div class="text-center mb-5">

        <span class="contact-badge">✨ Colección Ohana</span>

        <h1 class="mt-3">Papelería</h1>

        <p class="categoria-subtitle">
            Agendas, cuadernos y accesorios pensados para organizar,
            estudiar y regalar con estilo.
        </p>

    </div>

    <!-- PRODUCTOS -->
    <div class="row g-4">

        @foreach($productos as $producto)

        <div class="col-6 col-md-4 col-lg-3">

            <div class="card h-100 shadow border-0">

                <img src="{{ asset('img/' . $producto['imagen']) }}"
                     class="card-img-top producto-foto"
                     alt="{{ $producto['nombre'] }}">

                <div class="card-body text-center d-flex flex-column">

                    <h5>{{ $producto['nombre'] }}</h5>

                    <p class="text-muted">
                        {{ $producto['descripcion'] }}
                    </p>

                    <h4 class="text-success mb-3">
                        ${{ number_format($producto['precio'],0,',','.') }}
                    </h4>

                    <a href="#" class="btn btn-dark mt-auto">
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