<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CustomRememberMe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)//: Response
    {
        // Check if the user is authenticated
        $response = $next($request);

        // If the user is authenticated and the 'remember' checkbox is checked,
        if (Auth::check() && $request->has('remember')) {
           $cookieName = Auth::getRecallerName();
           $cookieValue = Cookie::get($cookieName);
              // If the cookie value is not set, create a new cookie
           if ($cookieValue){
                $customCookie = Cookie::make(
                    $cookieName,
                    $cookieValue,
                    60 * 24 * 3 // 3 days in minutes
                );

                $response->headers->setCookie($customCookie);

           }
        } 


        // If the user is not authenticated or the 'remember' checkbox is not checked,
        return $response;
    }
}
