<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware
{
    CONST LOCALES = ['it', 'en', 'es'];
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale') ? session('locale') : $request->getPreferredLanguage(self::LOCALES);
        App::setlocale($locale);
        
        return $next($request);
    }
}
