@extends('layouts.app')

@section('content')

<section class="com-hero-pro">

<div class="container">

<div class="row align-items-center g-5">

<!-- TEXTO -->
<div class="col-lg-6">

<span class="hero-badge">
✨ Compra simple y segura
</span>

<h1 class="mt-3">
Comprar regalos <br> nunca fue tan fácil
</h1>

<p class="hero-text mt-4">
Elegí productos únicos, pagá como prefieras y recibí todo listo para sorprender.
</p>

<div class="d-flex gap-3 flex-wrap mt-4">

<a href="{{ route('productos') }}" class="btn btn-primary btn-lg px-4">
Ver catálogo
</a>

<a href="https://wa.me/5493794032869"
class="btn btn-outline-dark btn-lg px-4"
target="_blank">

WhatsApp
</a>

</div>

<div class="hero-features mt-5">

<div><i class="bi bi-truck"></i> Envíos rápidos</div>
<div><i class="bi bi-shield-check"></i> Compra segura</div>
<div><i class="bi bi-gift"></i> Packaging premium</div>

</div>

</div>

<!-- IMAGEN -->
<div class="col-lg-6">

<div class="hero-image-wrap">

<img src="{{ asset('img/entrega.jpeg') }}"
class="img-fluid hero-side-img">

<div class="floating-mini fm1">
💳 Pagos fáciles
</div>

<div class="floating-mini fm2">
🚚 Entrega veloz
</div>

</div>

</div>

</div>
</div>
</section>

<!-- PROCESO -->
<section class="com-process">

<div class="container">

<div class="text-center mb-5">
<h2>¿Cómo funciona?</h2>
<p class="subtitulo-seccion">
Todo pensado para que compres en minutos.
</p>
</div>

<div class="row g-4">

<div class="col-md-4">
<div class="process-card">
<div class="step-number">1</div>
<h4>Elegí productos</h4>
<p>Recorré categorías y agregá tus favoritos.</p>
</div>
</div>

<div class="col-md-4">
<div class="process-card active-step">

<div class="step-number">2</div>

<h4>Completá datos</h4>

<p>
Indicá envío, contacto y método de pago de forma simple.
</p>

</div>
</div>

<div class="col-md-4">
<div class="process-card">
<div class="step-number">3</div>
<h4>Recibí feliz</h4>
<p>Coordinamos envío y seguimiento.</p>
</div>
</div>

</div>

</div>
</section>


<section class="com-disclaimers">

<div class="container">

<div class="text-center mb-5">

<h2>Nuestro compromiso</h2>

<p class="subtitulo-seccion">
Detalles que hacen especial cada compra.
</p>

</div>

<div class="row g-4">

<div class="col-md-4 col-6">
<div class="disclaimer-card">
<div class="disc-icon"><i class="bi bi-flower1"></i></div>
<h5>Productos Veganos</h5>
<p>Opciones seleccionadas libres de origen animal.</p>
</div>
</div>

<div class="col-md-4 col-6">
<div class="disclaimer-card">
<div class="disc-icon"><i class="bi bi-recycle"></i></div>
<h5>Packaging Responsable</h5>
<p>Materiales reutilizables y presentación cuidada.</p>
</div>
</div>

<div class="col-md-4 col-6">
<div class="disclaimer-card">
<div class="disc-icon"><i class="bi bi-chat-heart"></i></div>
<h5>Atención Humana</h5>
<p>Respondemos personalmente cada consulta.</p>
</div>
</div>

<div class="col-md-4 col-6">
<div class="disclaimer-card">
<div class="disc-icon"><i class="bi bi-gift"></i></div>
<h5>Listo para Regalar</h5>
<p>Presentación premium desde el primer momento.</p>
</div>
</div>

<div class="col-md-4 col-6">
<div class="disclaimer-card">
<div class="disc-icon"><i class="bi bi-stars"></i></div>
<h5>Hecho con Amor</h5>
<p>Cada pedido se prepara con dedicación.</p>
</div>
</div>

<div class="col-md-4 col-6">
<div class="disclaimer-card">
<div class="disc-icon"><i class="bi bi-shield-check"></i></div>
<h5>Compra Segura</h5>
<p>Pagos simples y protegidos.</p>
</div>
</div>

</div>

</div>
</section>

<!-- CTA -->
<section class="com-cta-pro">

<div class="container text-center">

<h2>¿Necesitás ayuda?</h2>

<p class="mb-4">
Te asesoramos personalmente por WhatsApp.
</p>

<a href="https://wa.me/5493794032869"
class="btn btn-warning btn-lg px-5"
target="_blank">

<i class="bi bi-whatsapp"></i> Escribinos

</a>

</div>
</section>

@endsection