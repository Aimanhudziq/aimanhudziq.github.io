<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfICExist
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
        $check_client = ClientDetail::where('ic_no', $request->input('ic_no'))->get();
        if(count($check_client) > 0){
            return response(400);
        }else{
            return $next($request);
        }
    }
}
