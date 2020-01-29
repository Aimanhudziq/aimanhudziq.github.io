<?php

namespace App\Http\Middleware;

use Closure;

class Developer
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
        
        //$key2='123';
        
        echo "<script type='text/javascript'>
                var keys = prompt('Enter key for maintenance?', '');
              </script>";

        $key="<script type='text/javascript'>
              document.write(keys);
            </script>";

        if($key == 'ok'){
            return $next($request);
        }
        //echo "<script>window.location.href='/';alert('Only developer can access this site');</script>";
    }

}
