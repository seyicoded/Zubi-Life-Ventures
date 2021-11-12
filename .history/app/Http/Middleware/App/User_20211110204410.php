<?php

namespace App\Http\Middleware\App;

use Closure;

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
        if(!(isset($_COOKIE[sha1('is_user_signed_in_zubi_venture')]))){
            //echo 'a';
            return redirect(url('sign-in'));
            // echo '1';
            // return $next($request);
        }
        return $next($request);
    }
}
