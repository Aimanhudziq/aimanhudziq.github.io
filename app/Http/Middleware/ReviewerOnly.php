<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class ReviewerOnly
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
        //dd(Auth::user()->frole_code);
        if(Auth::user() && Auth::user()->frole_code == 2)  
        {
            return $next($request);
        }
        //dd('tidak boles');
        return redirect('user_dashboard');
    }
}
