<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Administrator
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
        //dd(Auth::user()->frole_id);
        if(Auth::user() && Auth::user()->frole_code == 1){
            return $next($request);
        }
        return redirect('/');
    }
}
