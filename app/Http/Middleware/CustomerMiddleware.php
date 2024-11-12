<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user() instanceof \App\Models\Customer) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman login atau halaman lain
        return redirect()->route('login')->withErrors(['message' => 'You are not authorized to access this page']);
    }
}
