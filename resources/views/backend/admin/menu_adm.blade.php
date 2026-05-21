<!DOCTYPE html>
<html>
<head>
    <title>Panel Admin</title>
</head>
<body>
    <h1>Panel de Administración</h1>
    <p>Bienvenido, {{ Auth::user()->name }}</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>