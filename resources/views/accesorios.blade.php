@extends('layouts.app')

@section('content')

<div class="row g-4">

    @foreach($productos as $producto)

        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow border-0">

                <img src="{{ asset('img/' . $producto['imagen']) }}"
                     class="card-img-top producto-foto">

                <div class="card-body text-center d-flex flex-column">

                    <h5>{{ $producto['nombre'] }}</h5>

                    <p class="text-muted">
                        {{ $producto['descripcion'] }}
                    </p>

                    <h4 class="text-success mb-3">
                        ${{ number_format($producto['precio'], 0, ',', '.') }}
                    </h4>

                    <a href="#" class="btn btn-dark mt-auto">
                        Comprar
                    </a>

                </div>
            </div>
        </div>

    @endforeach

</div>

@endsection
