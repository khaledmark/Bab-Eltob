<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle( $request, Closure $next, $guard = null ) {

        if ( Auth::check() && Auth::user()->user_type == 'admin' ) {

            if ( !Auth::user()->status ) {

                Auth::logout();
                return redirect()->route('admin.get.login')->with('warning', trans('messages.notApproved'));
            }
            return $next($request);
        }

        Auth::logout();
        return redirect()->route('admin.get.login');
    }
}

