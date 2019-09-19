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
        if(Auth::user() && Auth::user()->frole_id == 2)  
        {
            return $next($request);
        }
        return redirect('user_dashboard');
    }
}
