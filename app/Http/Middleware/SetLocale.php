<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Activate the locale stored in the session for the current request.
     *
     * The session value is always validated against config('app.available_locales')
     * so a tampered session can never activate an arbitrary locale (and therefore
     * can never be used to load files outside the lang directory).
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->session()->get('locale');

        if (is_string($locale) && array_key_exists($locale, config('app.available_locales', []))) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
