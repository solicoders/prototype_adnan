<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
 
    public function handle(Request $request, Closure $next)
{

    app()->setLocale(session('localization', config('app.locale')));

    return $next($request);
}

}

