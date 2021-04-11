<?php

namespace App\Http\Middleware;

use Closure;

class ApplyAPILocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = 'ar';
        if ($request->route('language')) {
            $lang = $request->route('language');
            // and remove the language parameter so we dont have to include it in all controller methods.
            $request->route()->forgetParameter('language');
        }
        app()->setLocale($lang);

        return $next($request);
    }
}
