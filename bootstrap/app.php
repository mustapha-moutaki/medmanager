<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware; // Import the middleware

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => RoleMiddleware::class, // Register the middleware alias
        ]);
    })


   
    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
 $app->routeMiddleware([
        'role' => App\Http\Middleware\RoleMiddleware::class,
    ]);
// use Illuminate\Foundation\Application;
// use Illuminate\Foundation\Configuration\Exceptions;
// use Illuminate\Foundation\Configuration\Middleware;
// use App\Http\Middleware\RoleMiddleware;
// return Application::configure(basePath: dirname(__DIR__))
//     ->withRouting(
//         web: __DIR__.'/../routes/web.php',
//         commands: __DIR__.'/../routes/console.php',
//         health: '/up',
//     )
//     ->withMiddleware(function (Middleware $middleware) {
            
//     })
//     ->withExceptions(function (Exceptions $exceptions) {
//         //
//     })->create();

//     $app->routeMiddleware([
//         'role' => App\Http\Middleware\RoleMiddleware::class,
//     ]);


  

    