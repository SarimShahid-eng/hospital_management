<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetPrefixAuthGuardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Determine the route prefix based on the authenticated guard
        if (auth('admin')->check()) {
            session(['routePrefix' => 'admin']);
        } elseif (auth('receptionist')->check()) {
            session(['routePrefix' => 'receptionist']);
        }
        // dd(session('routePrefix'));
        return $next($request);
    }
}
