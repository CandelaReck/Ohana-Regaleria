<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ $title ?? 'Ohana Regalería' }}</title>

<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow-sm">
<div class="container">

<!-- LOGO -->
<a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">

<img src="{{ asset('img/logo.jpeg') }}"
     alt="Logo Ohana"
     class="logo-navbar me-2">

<span>Ohana Regalería</span>

</a>

<!-- BOTON MOBILE -->
<button class="navbar-toggler" type="button"
        data-bs-toggle="collapse"
        data-bs-target="#menuNavbar">

<span class="navbar-toggler-icon"></span>

</button>

<!-- MENU -->
<div class="collapse navbar-collapse" id="menuNavbar">

<div class="navbar-nav ms-auto align-items-lg-center">

<a class="nav-link" href="{{ route('home') }}">
Inicio
</a>

<a class="nav-link" href="{{ route('comercializacion') }}">
Comercialización
</a>

<a class="nav-link" href="{{ route('quienes-somos') }}">
Quiénes somos
</a>

<!-- DROPDOWN PRODUCTOS -->
<div class="nav-item dropdown">

<a class="nav-link dropdown-toggle"
   href="#"
   role="button"
   data-bs-toggle="dropdown">

Productos
</a>

<ul class="dropdown-menu shadow border-0">

<li>
<a class="dropdown-item" href="{{ route('indumentaria') }}">
Indumentaria
</a>
</li>

<li>
<a class="dropdown-item" href="{{ route('accesorios') }}">
Accesorios y Bijou
</a>
</li>

<li>
<a class="dropdown-item" href="{{ route('decoHogar') }}">
Deco y Hogar
</a>
</li>

<li>
<a class="dropdown-item" href="{{ route('papeleria') }}">
Papelería
</a>
</li>

<li>
<a class="dropdown-item" href="{{ route('combos') }}">
Boxes y Combos
</a>
</li>

<li><hr class="dropdown-divider"></li>

<li>
<a class="dropdown-item" href="{{ route('productos') }}">
Ver todos
</a>
</li>

</ul>
</div>

<a class="nav-link" href="{{ route('contacto') }}">
Contacto
</a> 

<!-- CARRITO -->
<li class="nav-item ms-lg-2">
    <a class="nav-link" href="#">
        🛒
    </a>
</li>

@if(session('usuario'))

<!-- Usuario logueado -->

<li class="nav-item dropdown">

<a class="nav-link dropdown-toggle"
href="#"
data-bs-toggle="dropdown">

👤

</a>

<ul class="dropdown-menu">

<li>
<form method="POST" action="{{ route('logout') }}">
@csrf
<button class="dropdown-item">
Cerrar sesión
</button>
</form>
</li>

</ul>

</li>

@else

<!-- No logueado -->

<li class="nav-item dropdown">

<a class="nav-link dropdown-toggle"
href="#"
data-bs-toggle="dropdown">

👤

</a>

<ul class="dropdown-menu">

<li>
<a class="dropdown-item" href="{{ route('login') }}">
Ingresar a mi cuenta
</a>
</li>

</ul>

</li>

@endif
</div>
</nav>
<!-- CONTENIDO VARIABLE -->
<main class="py-5">
@yield('content')
</main>

<!-- FOOTER -->
<footer class="footer-ohana">

<div class="container">

<!-- REDES -->
<div class="footer-social text-center mb-4">

<a href="https://www.instagram.com/ohanaregalos64?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="bi bi-instagram"></i></a>


<a href="https://wa.me/5493794032869"><i class="bi bi-whatsapp"></i></a>

</div>

<!-- COLUMNAS -->
<div class="row g-4 align-items-start">

<!-- MARCA -->
<div class="col-lg-4">
<h3>Ohana Regalería</h3>

<p>
Detalles únicos pensados para sorprender, emocionar y acompañar momentos especiales.
</p>
</div>

<!-- LINKS -->
<div class="col-lg-4">
<h5>Accesos rápidos</h5>

<ul class="footer-links">
<li><a href="{{ route('home') }}">Inicio</a></li>
<li><a href="{{ route('productos') }}">Productos</a></li>
<li><a href="{{ route('contacto') }}">Contacto</a></li>
<li><a href="{{ route('quienes-somos') }}">Quiénes somos</a></li>
</ul>
</div>

<!-- LEGAL -->
<div class="col-lg-4">
<h5>Información</h5>

<p class="mb-3">
Conocé nuestras políticas de compra, cambios y condiciones generales.
</p>

<a href="{{ route('terminos') }}" class="btn btn-footer">
Términos y Condiciones
</a>
</div>

</div>

<!-- MEDIOS DE PAGO -->
<div class="footer-pagos text-center mt-5">

<h5 class="mb-3">Medios de pago</h5>

<div class="pagos-grid">

<span>💳 Visa</span>
<span>💳 MasterCard</span>
<span>💳 Naranja</span>
<span>💳 Cabal</span>
<span>💳 Mercado Pago</span>
<span>🏦 Transferencia</span>

</div>

</div>

<hr>

<div class="footer-copy text-center">
© 2026 Ohana Regalería · Todos los derechos reservados.
</div>

</div>
</footer>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>