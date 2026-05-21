<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, string $rol)
    {
        // Verifica si el usuario está logueado
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Verifica si el rol del usuario coincide con el requerido
        if (Auth::user()->rol !== $rol) {
            abort(403, 'No tenés permiso para acceder a esta página.');
        }

        // Si todo está bien, deja pasar la petición
        return $next($request);
    }
}
