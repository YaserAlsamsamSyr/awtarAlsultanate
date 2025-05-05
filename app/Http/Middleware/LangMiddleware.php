<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class LangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale='en';
        if (session()->has('lang')) {
            $locale=session('lang', 'en');   
        } else 
            $request->session()->put('lang', $locale);
        App::setLocale($locale);
        return $next($request);
    }
}
