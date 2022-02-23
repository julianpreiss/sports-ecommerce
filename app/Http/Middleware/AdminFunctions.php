<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminFunctions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->check() && auth()->user()->rol_id === 1){
        return $next($request);
    }
        
        return redirect()
        ->route('auth.loginForm')
        ->with('message_error', 'Necesitás estar autenticado como administrador para ingresar a la sección solicitada');
    }
}
