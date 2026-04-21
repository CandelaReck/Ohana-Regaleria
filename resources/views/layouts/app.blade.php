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

<!-- NAVBAR PREMIUM -->
<nav class="navbar navbar-expand-lg shadow-sm py-3">
<div class="container">

<!-- LOGO -->
<a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">

<img src="{{ asset('img/logo.jpeg') }}"
     class="logo-navbar me-2"
     alt="Logo">

<span>Ohana Regalería</span>

</a>

<!-- MOBILE -->
<button class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#menuNavbar">

<span class="navbar-toggler-icon"></span>

</button>

<!-- MENU -->
<div class="collapse navbar-collapse" id="menuNavbar">

<ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

<li class="nav-item">
<a class="nav-link" href="{{ route('home') }}">
Inicio
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('quienes-somos') }}">
Quiénes somos
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('comercializacion') }}">
Comercialización
</a>
</li>

<!-- MEGA DROPDOWN -->
<li class="nav-item dropdown position-static">

<a class="nav-link dropdown-toggle"
   href="#"
   data-bs-toggle="dropdown">

Productos
</a>

<div class="dropdown-menu mega-menu border-0 shadow p-4">

<div class="row g-4">

<!-- COL 1 -->
<div class="col-md-4">

<h6 class="mega-title">
Categorías
</h6>

<a class="dropdown-item" href="#">
Indumentaria
</a>

<a class="dropdown-item" href="#">
Aritos & Accesorios
</a>

<a class="dropdown-item" href="#">
Peluches
</a>

<a class="dropdown-item" href="#">
Box Sorpresa
</a>

<a class="dropdown-item" href="#">
Mates & Hogar
</a>

</div>


</div>
</div>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('contacto') }}">
Contacto
</a>
</li>

<!-- ICONO -->
<li class="nav-item ms-lg-2">
<a class="nav-link" href="#">
🛒
</a>
</li>

</ul>
</div>
</div>
</nav>

<!-- CONTENIDO VARIABLE -->
<main class="py-5">
@yield('content')
</main>

<!-- FOOTER -->
<footer class="text-center py-4 border-top">
© 2026 Ohana Regalería - Todos los derechos reservados.
Aprenda sobre nuestros <a href="{{ route('terminos') }}" class="btn btn-dark">Términos y Condiciones</a>
</footer>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>