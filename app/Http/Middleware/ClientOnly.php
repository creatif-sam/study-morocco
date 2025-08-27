<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientOnly
{
    public function handle(Request $request, Closure $next)
    {
        if (! auth()->check() || ! auth()->user()->hasRole('client')) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
