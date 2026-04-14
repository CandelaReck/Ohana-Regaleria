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

<a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">

<img src="{{ asset('img/logo.jpeg') }}"
     alt="Logo Ohana"
     class="logo-navbar me-2">

<span>Ohana Regalería</span>

</a>

<div class="navbar-nav ms-auto">
<a class="nav-link" href="{{ route('home') }}">Inicio</a>
<a class="nav-link" href="{{ route('comercializacion') }}">Comercialización</a>
<a class="nav-link" href="{{ route('quienes-somos') }}">Quiénes somos</a>
<a class="nav-link" href="{{ route('productos') }}">Productos</a>
<a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
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