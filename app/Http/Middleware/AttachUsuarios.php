<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AttachUsuarios
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $usuario = null;
        if (session()->has('usuario_id')) {
            $usuario = \App\Models\Usuarios::find(session('usuario_id'));
        }

        view()->share('usuario', $usuario);

        return $next($request);
    }
}
