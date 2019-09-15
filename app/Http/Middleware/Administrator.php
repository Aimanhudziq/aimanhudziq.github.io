<?php

namespace App\Http\Middleware;

use Closure;

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
        $user = $request->user();
        //dd($user);
        if($user && $user->username == "mrjasvin"){
            return $next($request);
        }
        abort(404, 'cannot login');
    }
}
