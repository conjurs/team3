<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Return the configured application instance
return Application::configure(basePath: dirname(__DIR__)) // Set the base path of the application
    ->withRouting(
        web: __DIR__.'/../routes/web.php', // Specify the web routes file
        commands: __DIR__.'/../routes/console.php', // Specify the console commands routes file
        health: '/up', // Specify the health check endpoint
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Define middleware configuration here
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Define exception handling configuration here
    })->create(); // Create and return the application instance