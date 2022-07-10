<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('estudante')->check() || auth('professor')->check()) {
            return $next($request);
        }
        abort(403, 'Você não tem permissão para acessar está página.');
    }
}
