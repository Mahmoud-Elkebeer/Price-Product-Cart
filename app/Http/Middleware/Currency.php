<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Symfony\Component\HttpFoundation\Request;

class Currency
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->filled("currency")) {
            Config::set('app.currency', $request->get('currency'));
        }

        return $next($request);
    }
}
