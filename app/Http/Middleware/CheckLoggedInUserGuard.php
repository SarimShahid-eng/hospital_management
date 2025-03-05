<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLoggedInUserGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard): Response
    {
        if (Auth::guard($guard)->check()) {
            if ($guard === 'users' && Auth::check()) {
                dd('users');
                if ($request->is('admin/*')) {
                    return abort(404);
                }
            }
            if ($guard === 'labortarist' && Auth::check()) {
                dd('lab');
                if ($request->is('admin/*')) {
                    return abort(404);
                }
            }
            if ($guard === 'doctors' && Auth::check()) {
                dd('ss');
                // if ($request->is('admin/*')) {
                //     return abort(404);
                // }
            }
            // if ($guard === 'receptionists' && Auth::check()) {
            //     if ($request->is('admin/*')) {
            //         return abort(404);
            //     }
            // }
            dd('ss');
        }
        return $next($request);
    }
}
