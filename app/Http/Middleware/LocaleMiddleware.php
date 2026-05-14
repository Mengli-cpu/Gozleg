<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $availableLocales = ['tm', 'ru', 'en'];
        $sessionLocale = Session::get('locale');

        if ($sessionLocale && in_array($sessionLocale, $availableLocales)) {
            App::setLocale($sessionLocale);
        } else {
            App::setLocale(config('app.locale', 'en'));
        }

        return $next($request);
    }
}