<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    private const SUPPORTED = ['km', 'en'];
    private const DEFAULT_LOCALE = 'km';

    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale', self::DEFAULT_LOCALE);

        if (!in_array($locale, self::SUPPORTED, true)) {
            $locale = self::DEFAULT_LOCALE;
        }

        App::setLocale($locale);

        return $next($request);
    }
}
