<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictByIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Liste des IP autorisées (la tienne par exemple)
        $allowedIps = [
            '123.456.78.90', // ← remplace par ton IP publique
            '::1',           // ← localhost (utile en dev local)
        ];

        if (!in_array($request->ip(), $allowedIps)) {
            abort(403, 'Accès refusé.');
        }
        
        return $next($request);
    }
}
