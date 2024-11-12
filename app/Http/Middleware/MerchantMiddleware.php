<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MerchantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('merchant')->check() && Auth::guard('merchant')->user()) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman login atau halaman lain
        return redirect()->route('login')->withErrors(['message' => 'You are not authorized to access this page']);
    }
}
