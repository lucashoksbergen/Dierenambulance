<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class CustomRememberMe
{

    public function handle(Request $request, Closure $next): Response
    {
        $customRememberTime = 24 * 60;
        
        Config::set('session.remember_lifetime', $customRememberTime);

        return $next($request);
    }
}
