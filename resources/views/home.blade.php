@extends('layouts.app')

@section('content')

<!-- HERO OHANA -->
<section class="hero-premium">

<div class="container">

<div class="row align-items-center gy-5">

<!-- TEXTO -->
<div class="col-lg-6">

<span class="hero-badge">
✨ Regalos con amor
</span>

<h1>
Regalos que <br> emocionan 💝
</h1>

<p class="mt-4 mb-4">
Boxes sorpresa, detalles únicos y productos personalizados para momentos especiales.
</p>

<div class="d-flex gap-3 flex-wrap">

<a href="{{ route('productos') }}" class="btn btn-primary btn-lg">
Ver catálogo
</a>

    
<a href="https://wa.me/5493794032869" class="btn btn-outline-light btn-lg hero-whatsapp">
WhatsApp
</a>

</div>

<div class="hero-mini-info mt-5">

<div>
🚚 <span>Envíos a todo el país</span>
</div>

<div>
🎁 <span>Packaging premium</span>
</div>

<div>
💳 <span>Cuotas sin interés</span>
</div>

</div>

</div>

<!-- SLIDER -->
<div class="col-lg-6">

<div id="heroSlider" class="carousel slide hero-slider" data-bs-ride="carousel">

<div class="carousel-inner rounded-4 shadow-lg">

<div class="carousel-item active">
<img src="{{ asset('img/collarOro.jpeg') }}" class="d-block w-100 hero-slider-img">
</div>

<div class="carousel-item">
<img src="{{ asset('img/comboSilk.jpeg') }}" class="d-block w-100 hero-slider-img">
</div>

<div class="carousel-item">
<img src="{{ asset('img/juegoSabanas.jpeg') }}" class="d-block w-100 hero-slider-img">
</div>

</div>

<button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
<span class="slider-btn">‹</span>
</button>

<button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
<span class="slider-btn">›</span>
</button>

</div>

</div>

</div>
</div>
</section>


<!-- DESTACADOS -->
<section class="py-5 bg-light">
<div class="container">

<h2 class="text-center mb-5">
Productos destacados
</h2>

<div class="row g-4">

@php
$productos = [
    [
        'nombre' => 'Pijama Print',
        'precio' => '18.500',
        'imagen' => 'img/pijamaPrint.jpeg'
    ],
    [
        'nombre' => 'Campera Gab',
        'precio' => '22.900',
        'imagen' => 'img/camperaGab.jpeg'
    ],
    [
        'nombre' => 'Pijama Kids',
        'precio' => '13.500',
        'imagen' => 'img/pijamaKid.jpeg'
    ],
];
@endphp

@foreach($productos as $producto)
<div class="col-md-4">
    <div class="card card-premium h-100">

        <img src="{{ asset($producto['imagen']) }}" class="card-img-top">

        <div class="card-body text-center">
            <h5>{{ $producto['nombre'] }}</h5>
            <p>${{ $producto['precio'] }}</p>
            <a href="#" class="btn btn-dark">Comprar</a>
        </div>

    </div>
</div>
@endforeach

</div>
</div>
</section>


<!-- ==========================================
CATEGORIAS SLIDER
========================================== -->

<section class="categorias-premium py-5">

<div class="container">

<h2 class="titulo-seccion">
Explorá nuestras categorías
</h2>

<p class="subtitulo-seccion">
Descubrí regalos únicos para cada ocasión
</p>

<div id="ohanaCategorias"
class="carousel slide carousel-fade"
data-bs-ride="carousel"
data-bs-interval="3500">

<!-- INDICADORES -->
<div class="carousel-indicators">

<button type="button"
data-bs-target="#ohanaCategorias"
data-bs-slide-to="0"
class="active"></button>

<button type="button"
data-bs-target="#ohanaCategorias"
data-bs-slide-to="1"></button>

</div>

<div class="carousel-inner">

<!-- ==========================================
SLIDE 1
========================================== -->
<div class="carousel-item active">

<div class="row g-4">

<!-- CARD -->
<div class="col-lg-4">
<a href="{{ route('decoHogar') }}" class="text-decoration-none">

<div class="categoria-premium-card">

<img src="{{ asset('img/juegoSabanas.jpeg') }}"
class="categoria-premium-img">

<div class="categoria-premium-overlay">

<span class="categoria-tag">
Hogar
</span>

<h3>Deco y Hogar</h3>

<p>
Detalles que transforman espacios.
</p>

<span class="btn-mini">
Ver más →
</span>

</div>
</div>

</a>
</div>

<!-- CARD -->
<div class="col-lg-4">
<a href="{{ route('accesorios') }}" class="text-decoration-none">

<div class="categoria-premium-card">

<img src="{{ asset('img/lentes.jpeg') }}"
class="categoria-premium-img">

<div class="categoria-premium-overlay">

<span class="categoria-tag">
Brillá
</span>

<h3>Bijou</h3>

<p>
Accesorios para cada estilo.
</p>

<span class="btn-mini">
Ver más →
</span>

</div>
</div>

</a>
</div>

<!-- CARD -->
<div class="col-lg-4">
<a href="{{ route('indumentaria') }}" class="text-decoration-none">

<div class="categoria-premium-card">

<img src="{{ asset('img/camperaGab.jpeg') }}"
class="categoria-premium-img">

<div class="categoria-premium-overlay">

<span class="categoria-tag">
Moda
</span>

<h3>Indumentaria</h3>

<p>
Comodidad con personalidad.
</p>

<span class="btn-mini">
Ver más →
</span>

</div>
</div>

</a>
</div>

</div>
</div>

<!-- ==========================================
SLIDE 2
========================================== -->
<div class="carousel-item">

<div class="row g-4">

<div class="col-lg-6">
<a href="{{ route('papeleria') }}" class="text-decoration-none">

<div class="categoria-premium-card">

<img src="{{ asset('img/agenda.jpeg') }}"
class="categoria-premium-img">

<div class="categoria-premium-overlay">

<span class="categoria-tag">
Diseño
</span>

<h3>Papelería</h3>

<p>
Organizá tus días con estilo.
</p>

<span class="btn-mini">
Ver más →
</span>

</div>
</div>

</a>
</div>

<div class="col-lg-6">
<a href="{{ route('combos') }}" class="text-decoration-none">

<div class="categoria-premium-card">

<img src="{{ asset('img/boxRegalo1.jpeg') }}"
class="categoria-premium-img">

<div class="categoria-premium-overlay">

<span class="categoria-tag">
Regalo ideal
</span>

<h3>Boxes y Combos</h3>

<p>
Sorpresas listas para emocionar.
</p>

<span class="btn-mini">
Ver más →
</span>

</div>
</div>

</a>
</div>

</div>
</div>

</div>

<!-- FLECHAS -->
<button class="carousel-control-prev"
type="button"
data-bs-target="#ohanaCategorias"
data-bs-slide="prev">

<span class="slider-arrow">
‹
</span>

</button>

<button class="carousel-control-next"
type="button"
data-bs-target="#ohanaCategorias"
data-bs-slide="next">

<span class="slider-arrow">
›
</span>

</button>

</div>
</div>
</section>


<section class="beneficios-ohana">

<div class="container">

<div class="row g-4 text-center">

<div class="col-md-3 col-6">
<div class="beneficio-box">
<div class="icono-beneficio">🚚</div>
<h4>Envíos rápidos</h4>
<p>
Despachamos a todo el país con seguimiento seguro.
</p>
</div>
</div>

<div class="col-md-3 col-6">
<div class="beneficio-box">
<div class="icono-beneficio">💳</div>
<h4>Pagá en cuotas</h4>
<p>
Hasta 3 cuotas sin interés en productos seleccionados.
</p>
</div>
</div>

<div class="col-md-3 col-6">
<div class="beneficio-box">
<div class="icono-beneficio">🎁</div>
<h4>Packaging premium</h4>
<p>
Presentaciones listas para regalar y emocionar.
</p>
</div>
</div>

<div class="col-md-3 col-6">
<div class="beneficio-box">
<div class="icono-beneficio">💚</div>
<h4>Atención real</h4>
<p>
Te asesoramos por WhatsApp para elegir mejor.
</p>
</div>
</div>

</div>

</div>
</section>



<section class="reseñas-ohana py-5">

<div class="container">

<h2 class="titulo-seccion">
Lo que dicen nuestros clientes
</h2>

<p class="subtitulo-seccion">
Gracias por elegirnos en momentos especiales 💚
</p>

<div class="row g-4 mt-5">

<div class="col-md-4">
<div class="reseña-card">
<div class="stars">★★★★★</div>

<p>
Pedí un box sorpresa para mi mamá y quedó emocionada. Todo hermoso.
</p>

<div class="reseña-footer">
<div class="reseña-avatar">C</div>

<div class="reseña-info">
<h5>Camila R.</h5>
<span>Corrientes</span>
</div>
</div>
</div>
</div>

<div class="col-md-4">
<div class="reseña-card">
<div class="stars">★★★★★</div>

<p>
La atención fue excelente y el regalo llegó perfecto.
</p>

<div class="reseña-footer">
<div class="reseña-avatar">L</div>

<div class="reseña-info">
<h5>Lucía M.</h5>
<span>Resistencia</span>
</div>
</div>
</div>
</div>

<div class="col-md-4">
<div class="reseña-card">
<div class="stars">★★★★★</div>

<p>
Compré bijou y superó mis expectativas.
</p>

<div class="reseña-footer">
<div class="reseña-avatar">F</div>

<div class="reseña-info">
<h5>Florencia G.</h5>
<span>Chaco</span>
</div>
</div>
</div>
</div>

</div>
</div>
</section>

@endsection

