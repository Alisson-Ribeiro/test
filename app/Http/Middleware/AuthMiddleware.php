<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Manipula uma solicitação recebida.
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se a sessão do usuário existe
        if (!session()->has('user')) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para acessar esta página.');
        }

        return $next($request);
    }
}