<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


if (!function_exists('admin_route')) {
    function admin_route($route)
    {
        // $currentUrl = Request::url();
        // $guardNames = array_keys(config('auth.guards'));
        // Auth::guard('')
        $guardsArray = ['admin', 'web', 'doctor', 'receptionist', 'labortarist'];
        foreach ($guardsArray as $guard) {
            if (Auth::guard($guard)->check()) {
                // Check if the current guard is 'web'
                if ($guard === 'web') {
                    $guard = 'patient';
                }
                return $guard . '.' . $route;
            }
        }
    }
}
// helper responsible for making prefixes on auth basis only admin and receptionist
if (!function_exists('getRoutePrefix')) {
    function getRoutePrefix()
    {
        if (Auth::guard('admin')->check()) {
            return 'admin';
        } elseif (auth('receptionist')->check()) {
            return 'receptionist';
        } elseif (auth('doctor')->check()) {
            return 'doctor';
        } elseif (auth('web')->check()) {
            // dd('ss');
            return 'patient';
        }
    }
}
