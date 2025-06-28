<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa la fachada Auth
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario NO está autenticado
        if (! Auth::check()) {
            // Si el usuario no está autenticado, lo redirecciona a la ruta 'login'.
            // Asegúrate de tener una ruta nombrada 'login' en tu routes/web.php
            return redirect()->route('login');
        }

        // Si el usuario está autenticado, permite que la solicitud continúe
        // hacia el siguiente middleware o al controlador de la ruta.
        return $next($request);
    }
}