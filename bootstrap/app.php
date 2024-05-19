<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo('/login');
        // Using a closure...
        $middleware->redirectGuestsTo(fn (Request $request) => route('app.login'));
        // Route::middleware('web')->group(function (Router $router) {
        //     $router->impersonate();
        // });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
