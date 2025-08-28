<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // If not logged in → send to Breeze login
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        // If logged in but not admin → send to Breeze dashboard
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard');
        }

        // Otherwise → allow access
        return $next($request);
    }
}
