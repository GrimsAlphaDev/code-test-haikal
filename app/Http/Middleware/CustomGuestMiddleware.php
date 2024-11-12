<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('merchant')->check() && !Auth::guard('customer')->check()) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman dashboard merchant atau customer
        if (Auth::guard('merchant')->check()) {
            return redirect()->route('merchant.dashboard');
        }  else {
            return redirect()->route('customer.dashboard');
        }

        return redirect()->route('login')->withErrors(['message' => 'You are not authorized to access this page']);
    
    }
}
