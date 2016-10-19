<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::User()->role != "0") {
            abort(403, 'Unauthorized action.');
            //return redirect('/unauthorized');
        }
        return $next($request);
    }
}
