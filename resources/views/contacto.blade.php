@extends('layouts.app')

@section('content')

<section id="contacto" class="py-5 contacto-section">
<div class="container">

<h2 class="text-center mb-5" style="color:#4E6252;">Contacto</h2>

<div class="row g-4 justify-content-center">

<!-- INFORMACION -->
<div class="col-md-5">
<div class="card p-4 shadow-sm border-0 h-100" style="border:1px solid #EDE7DD;">
<h4 style="color:#4E6252;">Información</h4>

<ul class="list-unstyled contacto-lista mb-0">

<li class="mb-3">
<i class="bi bi-geo-alt-fill"></i>
Corrientes, Argentina
</li>

<li class="mb-3">
<i class="bi bi-whatsapp"></i>
<a href="https://wa.me/5493794032869" target="_blank">
+54 9 379 403-2869
</a>
</li>

<li class="mb-3">
<i class="bi bi-instagram"></i>
<a href="https://instagram.com/ohanaregalos64" target="_blank">
@ohanaregalos64
</a>
</li>

<li class="mb-3">
<i class="bi bi-facebook"></i>
<a href="https://www.facebook.com/ohana.regaleria64" target="_blank">
Ohana Regalería
</a>
</li>

<li class="mb-3">
<i class="bi bi-megaphone-fill"></i>
Unite a nuestro 
<a href="https://whatsapp.com/channel/0029Vb7Q0PHATRSv7bck7P0N" target="_blank">
canal de WhatsApp
</a>
para enterarte de novedades exclusivas
</li>

<li>
<i class="bi bi-envelope-fill"></i>
ohana.design64@gmail.com
</li>

</ul>
</div>
</div>

<!-- MAPA + HORARIOS -->
<div class="col-md-5">
<div class="card shadow-sm border-0 h-100" style="border:1px solid #EDE7DD;">

<div class="p-3">
<h5 style="color:#4E6252;">Encontranos aquí</h5>
<p style="color:#6F8573; margin-bottom:0;">
Fray José de la Quintana 1800, Corrientes
</p>
</div>

<iframe 
src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1770.0866667727532!2d-58.82779781911692!3d-27.46386259591287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b58e5f3be77%3A0xbf4fd160d02dc912!2sFray%20Jos%C3%A9%20de%20la%20Quintana%201800-1882%2C%20W3402%20Corrientes!5e0!3m2!1ses!2sar!4v1776779209811!5m2!1ses!2sar"
width="100%"
height="260"
style="border:0;"
allowfullscreen=""
loading="lazy">
</iframe>

<div class="p-3">
<h6 style="color:#4E6252;">Horarios</h6>
<p style="color:#6F8573; margin-bottom:0;">Lunes a Sábado</p>
<p style="color:#6F8573; margin-bottom:0;">09:00 a 13:00 hs</p>
<p style="color:#6F8573;">17:00 a 21:00 hs</p>
</div>

</div>
</div>

</div>
</div>
</section>

@endsection