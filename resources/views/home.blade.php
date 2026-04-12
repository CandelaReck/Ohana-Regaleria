<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $title }}</title>

  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">

      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="{{ asset('img/Logo.jpeg') }}" 
           width="48"
            class="me-2 rounded-circle">

        Ohana Regalería
      </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Productos</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
      </ul>
    </div>

  </div>
</nav>

<section id="inicio" class="hero-premium py-5">
<div class="container">

<div class="row align-items-center gy-5">

    <!-- COLUMNA IZQUIERDA -->
    <div class="col-lg-7">

        <div id="hero" class="carousel slide hero-box shadow-lg rounded-4 overflow-hidden" data-bs-ride="carousel">

            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="{{ asset('img/toallon.jpeg') }}" class="d-block w-100 hero-img" alt="Toallón">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('img/aritos.jpeg') }}" class="d-block w-100 hero-img" alt="Aritos">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('img/box.jpeg') }}" class="d-block w-100 hero-img" alt="Box regalo">
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
<div class="col-md-4"><div class="card category-card h-100"><img src="https://images.unsplash.com/photo-1513885535751-8b9238bd345a?q=80&w=800&auto=format&fit=crop"><div class="card-body"><h5>Tazas Personalizadas</h5><p>Diseños tiernos y únicos.</p><a href="#" class="btn btn-dark">Ver más</a></div></div></div>
<div class="col-md-4"><div class="card category-card h-100"><img src="https://images.unsplash.com/photo-1549465220-1a8b9238cd48?q=80&w=800&auto=format&fit=crop"><div class="card-body"><h5>Box Sorpresa</h5><p>Ideal para cumpleaños.</p><a href="#" class="btn btn-dark">Ver más</a></div></div></div>
<div class="col-md-4"><div class="card category-card h-100"><img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?q=80&w=800&auto=format&fit=crop"><div class="card-body"><h5>Peluches</h5><p>El regalo clásico que nunca falla.</p><a href="#" class="btn btn-dark">Ver más</a></div></div></div>
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
</section>

<footer class="py-4 text-center border-top">© 2026 Ohana Regalería</footer>
<a href="#" class="btn btn-success rounded-pill whatsapp">WhatsApp</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>