<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // تحقق من أن المستخدم مسجل دخول ومسؤول
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Access denied. Admins only.');
        }
        
        return $next($request);
    }
}