<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {},
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
            'admin' => App\Http\Middleware\SuperAdmin::class,
            'admindoctor' => App\Http\Middleware\AdminDoctor::class,
            // 'admin' => App\Http\Middleware\AdminMiddleware::class,
            'loggedInUser' => App\Http\Middleware\CheckLoggedInUserGuard::class,
            'doctor' => App\Http\Middleware\DoctorMiddleware::class,
            'setPrefix' => App\Http\Middleware\SetPrefixAuthGuardMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //]
    })->create();
