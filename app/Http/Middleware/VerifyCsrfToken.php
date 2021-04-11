<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

//     //add an array of Routes to skip CSRF check
// private $exceptUrls = ['controller/route1', 'controller/route2'];
// //modify this function
// public function handle($request, Closure $next) {
// //add this condition foreach($this->exceptUrls as $route) {
// if ($request->is($route)) {
//  return $next($request);
// }
// }
// return parent::handle($request, $next);
// }

}
