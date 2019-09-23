<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
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
        if(Auth::user() && (Auth::user()->frole_code == 2 || Auth::user()->frole_code == 3))  
        {
            return $next($request);
        }
        return redirect('/');
    }
}
