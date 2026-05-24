<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        //vérifier si l'utilisateur est connecté et est admin
        if (!auth()->check() || !auth()->user()->is_admin) {
            return redirect('/')->with('error', 'Accès refusé. Vous n\'êtes pas administrateur.');
        }
        return $next($request);
    }
}
