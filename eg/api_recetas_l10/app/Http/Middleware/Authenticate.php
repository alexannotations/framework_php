<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Para APIs, siempre devuelve null (no redirige)
        return null;
        
        // Además de la API, Si es web (webApp) y existe la ruta login, redirige a login
        // Para API en el Header colocar:  Accept:application/json
        // return $request->expectsJson() ? null : route('login');
    }
}
