<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware; // <-- أضف هذا الاستيراد
use App\Http\Middleware\RoleMiddleware; // <-- أضف هذا الاستيراد


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // سجّل الـ middleware المخصص هنا
        $middleware->alias([
            'admin' => AdminMiddleware::class, // <-- هذا السطر مهم
            'role' => RoleMiddleware::class, // <-- هذا السطر مهم
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();