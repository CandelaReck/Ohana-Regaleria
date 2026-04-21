@extends('layouts.app')

@section('content')

<section id="inicio" class="hero-premium py-5">
<div class="container">

<div class="row align-items-center gy-5">

    <!-- COLUMNA IZQUIERDA -->
    <div class="col-lg-7">

        <div id="hero" class="carousel slide hero-box shadow-lg rounded-4 overflow-hidden" data-bs-ride="carousel">

            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="{{ asset('img/toallonCapy.jpeg') }}" class="d-block w-100 hero-img" alt="Toallón">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('img/aritos.jpeg') }}" class="d-block w-100 hero-img" alt="Aritos">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('img/boxRegalo1.jpeg') }}" class="d-block w-100 hero-img" alt="Box regalo">
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#hero" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#hero" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

    </div>

    <!-- COLUMNA DERECHA -->
    <div class="col-lg-5">

        <span class="badge rounded-pill px-3 py-2 mb-3 hero-badge">
            ✨ Regalos con amor
        </span>

        <h1 class="display-4 mb-3">
            Ohana <br> Regalería
        </h1>

        <p class="lead mb-4">
            Detalles únicos, productos personalizados y sorpresas pensadas para emocionar.
        </p>

        <p class="mb-4 text-muted">
            Boxes, accesorios, regalos especiales y mucho más para cada ocasión.
        </p>

        <div class="d-flex gap-3 flex-wrap">
            <a href="#" class="btn btn-primary btn-lg px-4">
                Ver catálogo
            </a>

            <a href="#" class="btn btn-outline-secondary btn-lg px-4">
                WhatsApp
            </a>
        </div>

    </div>

</div>
</div>
</section>
<section id="productos" class="py-5">
<div class="container">

<h2 class="text-center mb-4">Destacados</h2>

<div class="row g-4">

<!-- CARD 1 -->
<div class="col-md-4">
<div class="card category-card h-100">
<img src="{{ asset('img/pijamaPrint.jpeg') }}" class="card-img-top">

<div class="card-body">
<h5>Indumentaria</h5>
<p>Ropa pensada para impresionar.</p>
<a href="#" class="btn btn-dark">Ver más</a>
</div>

</div>
</div>

<!-- CARD 2 -->
<div class="col-md-4">
<div class="card category-card h-100">
<img src="{{ asset('img/boxRegalo1.jpeg') }}" class="card-img-top">

<div class="card-body">
<h5>Box Sorpresa</h5>
<p>Ideal para cumpleaños.</p>
<a href="#" class="btn btn-dark">Ver más</a>
</div>

</div>
</div>

<!-- CARD 3 -->
<div class="col-md-4">
<div class="card category-card h-100">
<img src="{{ asset('img/peluche1.jpeg') }}" class="card-img-top">

<div class="card-body">
<h5>Peluches</h5>
<p>El regalo clásico que nunca falla.</p>
<a href="#" class="btn btn-dark">Ver más</a>
</div>

</div>
</div>

</div>
</div>
</section>

<!-- FRANJA BENEFICIOS -->
<section class="beneficios-ohana py-5">

<div class="container">

<div class="row text-center g-4">

<!-- ITEM -->
<div class="col-6 col-lg-3">

<div class="beneficio-box">

<div class="icono-beneficio">🚚</div>

<h4>Envíos a todo el país</h4>

<p>Gratis superando $100.000</p>

</div>
</div>

<!-- ITEM -->
<div class="col-6 col-lg-3">

<div class="beneficio-box">

<div class="icono-beneficio">💳</div>

<h4>Hasta 3 cuotas sin interés</h4>

<p>Con tarjetas seleccionadas</p>

</div>
</div>

<!-- ITEM -->
<div class="col-6 col-lg-3">

<div class="beneficio-box">

<div class="icono-beneficio">💸</div>

<h4>15% OFF en efectivo</h4>

<p>10% OFF por transferencia</p>

</div>
</div>

<!-- ITEM -->
<div class="col-6 col-lg-3">

<div class="beneficio-box">

<div class="icono-beneficio">💚</div>

<h4>Atención personalizada</h4>

<p>Pedidos por WhatsApp</p>

</div>
</div>

</div>
</div>
</section>

<section id="contacto" class="bg-light py-5">
<div class="container">
<div class="row">
<div class="col-lg-6 mx-auto">
<h2 class="text-center mb-4">Contactanos</h2>
<form>
<div class="mb-3"><input class="form-control" placeholder="Nombre"></div>
<div class="mb-3"><input class="form-control" placeholder="Email"></div>
<div class="mb-3"><textarea class="form-control" rows="4" placeholder="Mensaje"></textarea></div>
<button class="btn btn-dark w-100">Enviar</button>
</form>
</div>
</div>
</div>

@endsection

