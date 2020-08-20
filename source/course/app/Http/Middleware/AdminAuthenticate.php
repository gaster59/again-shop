<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = '')
    {
        $guard = 'admin';
        $auth = \Auth::guard($guard)->user();
        if (is_null($auth)) {
            return redirect(route('admin.login.index'));
        }
        return $next($request);
    }
}
