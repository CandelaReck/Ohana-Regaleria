@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="about-hero">

<div class="container">

<div class="row align-items-center g-5">

<div class="col-lg-6">

<span class="hero-badge">
💚 Nuestra esencia
</span>

<h1 class="mt-3">
Más que regalos, <br> momentos especiales
</h1>

<p class="mt-4">
Ohana nació con una idea simple y poderosa: celebrar a cada persona importante en tu vida.
</p>

<p>
Nuestro nombre significa familia, y representa el amor, la cercanía y los detalles que unen.
</p>

<a href="{{ route('productos') }}" class="btn btn-primary mt-3">
Ver productos
</a>

</div>

<div class="col-lg-6">

<img src="{{ asset('img/imagenFamilia.png') }}"
class="img-fluid rounded-4 shadow-lg">

</div>

</div>
</div>
</section>

<!-- NUESTROS VALORES -->
<section class="valores-ohana">
<div class="container">

<h2 class="text-center mb-5">Nuestros Valores</h2>

<div class="row g-4 text-center">

<div class="col-md-4">
<div class="process-card">
<div class="step-number">🎁</div>
<h4>Calidad</h4>
<p>
Seleccionamos productos con dedicación para que cada regalo sea especial y memorable.
</p>
</div>
</div>

<div class="col-md-4">
<div class="process-card">
<div class="step-number">💬</div>
<h4>Atención Personalizada</h4>
<p>
Acompañamos cada compra brindando cercanía, ayuda y asesoramiento real.
</p>
</div>
</div>

<div class="col-md-4">
<div class="process-card">
<div class="step-number">📈</div>
<h4>Mejora Continua</h4>
<p>
Buscamos innovar constantemente para ofrecer una mejor experiencia.
</p>
</div>
</div>

</div>

</div>
</section>

<!-- TRAYECTORIA -->
<section class="about-history">

<div class="container">

<div class="row align-items-center g-5">

<div class="col-lg-6">
<img src="{{ asset('img/trayectoria.png') }}"
class="img-fluid rounded-4 shadow-lg">
</div>

<div class="col-lg-6">

<h2>Nuestra Trayectoria</h2>

<p>
Comenzamos como un pequeño emprendimiento lleno de ilusión.
</p>

<p>
Con el tiempo incorporamos nuevos productos, mejores procesos y más formas de acompañarte.
</p>

<p>
Hoy seguimos creciendo con la misma esencia del primer día.
</p>

</div>

</div>
</div>
</section>


<!-- ==========================================
TIMELINE WOW OHANA
Historia premium con animación
Pegalo en quienes-somos.blade.php
========================================== -->

<section class="timeline-wow">
<div class="container">

<div class="text-center mb-5">
    <h2 class="titulo-seccion">Nuestra Historia</h2>
    <p class="subtitulo-seccion">
        Un camino construido con amor, detalles y sueños compartidos.
    </p>
</div>

<div class="timeline-luxury">

    <!-- ITEM 1 -->
    <div class="timeline-row left wow-show">
        <div class="timeline-dot">2022</div>

        <div class="timeline-box">
            <img src="{{ asset('img/logo.jpeg') }}" class="timeline-img">

            <div class="timeline-content">
                <span class="timeline-tag">Inicio</span>
                <h3>Nace Ohana</h3>
                <p>
                    Comenzamos como un pequeño emprendimiento familiar,
                    creando regalos personalizados llenos de cariño.
                </p>
            </div>
        </div>
    </div>

    <!-- ITEM 2 -->
    <div class="timeline-row right wow-show">
        <div class="timeline-dot">2023</div>

        <div class="timeline-box">
            <img src="{{ asset('img/boxRegalo1.jpeg') }}" class="timeline-img">

            <div class="timeline-content">
                <span class="timeline-tag">Expansión</span>
                <h3>Llegan los Boxes</h3>
                <p>
                    Incorporamos cajas sorpresa y regalos premium
                    para momentos especiales.
                </p>
            </div>
        </div>
    </div>

    <!-- ITEM 3 -->
    <div class="timeline-row left wow-show">
        <div class="timeline-dot">2024</div>

        <div class="timeline-box">
            <img src="{{ asset('img/aritos.jpeg') }}" class="timeline-img">

            <div class="timeline-content">
                <span class="timeline-tag">Crecimiento</span>
                <h3>Nuevas Categorías</h3>
                <p>
                    Sumamos deco hogar, papelería,
                    accesorios e indumentaria.
                </p>
            </div>
        </div>
    </div>

    <!-- ITEM 4 -->
    <div class="timeline-row right wow-show">
        <div class="timeline-dot">2026</div>

        <div class="timeline-box">
            <img src="{{ asset('img/boxRegalo.jpeg') }}" class="timeline-img">

            <div class="timeline-content">
                <span class="timeline-tag">Nueva Etapa</span>
                <h3>Tienda Online</h3>
                <p>
                    Lanzamos nuestra web para llegar más lejos
                    y seguir creciendo con vos.
                </p>
            </div>
        </div>
    </div>

</div>

<div class="text-center mt-5">
    <a href="{{ route('productos') }}" class="btn btn-primary btn-lg px-5">
        Descubrir Ohana
    </a>
</div>

</div>
</section>

<!-- STAFF WOW PREMIUM OHANA -->
<section class="staff-ohana py-5">
<div class="container">

<div class="text-center mb-5">
<h2 class="titulo-seccion">Nuestro Equipo</h2>
<p class="subtitulo-seccion">
Personas que hacen posible cada detalle con dedicación y cariño.
</p>
</div>

<div class="row g-4">

<!-- CARD 1 -->
<div class="col-md-4">
<div class="staff-card">

<div class="staff-img-box">
<img src="{{ asset('img/Atencion al cliente.jpg') }}" class="staff-img">
</div>

<div class="staff-body">
<div class="staff-icon">
<i class="bi bi-chat-heart-fill"></i>
</div>

<h4>Belén</h4>
<span>Atención al cliente</span>

<p>
Te acompaña en cada compra, responde consultas y ayuda a elegir el regalo ideal.
</p>

<div class="staff-social">
<a href="#"><i class="bi bi-whatsapp"></i></a>
<a href="#"><i class="bi bi-instagram"></i></a>
</div>

</div>
</div>
</div>

<!-- CARD 2 -->
<div class="col-md-4">
<div class="staff-card">

<div class="staff-img-box">
<img src="{{ asset('img/ArmadoPedido.jpg') }}" class="staff-img">
</div>

<div class="staff-body">
<div class="staff-icon">
<i class="bi bi-gift-fill"></i>
</div>

<h4>Carla</h4>
<span>Armado de pedidos</span>

<p>
Prepara cada box y presentación cuidando cada detalle para sorprender.
</p>

<div class="staff-social">
<a href="#"><i class="bi bi-whatsapp"></i></a>
<a href="#"><i class="bi bi-instagram"></i></a>
</div>

</div>
</div>
</div>

<!-- CARD 3 -->
<div class="col-md-4">
<div class="staff-card">

<div class="staff-img-box">
<img src="{{ asset('img/DiseñoPersonalizacion.jpg') }}" class="staff-img">
</div>

<div class="staff-body">
<div class="staff-icon">
<i class="bi bi-stars"></i>
</div>

<h4>Axel</h4>
<span>Diseño y personalización</span>

<p>
Convierte ideas en regalos únicos con creatividad y estilo Ohana.
</p>

<div class="staff-social">
<a href="#"><i class="bi bi-whatsapp"></i></a>
<a href="#"><i class="bi bi-instagram"></i></a>
</div>

</div>
</div>
</div>

</div>
</div>
</section>


<!-- CTA -->
<section class="about-cta">

<div class="container text-center">

<h2>Gracias por elegir Ohana</h2>

<p class="mb-4">
Cada compra es una oportunidad de crear alegría.
</p>

<a href="{{ route('productos') }}" class="btn btn-warning btn-lg px-5">
Ver catálogo
</a>

</div>
</section>

@endsection