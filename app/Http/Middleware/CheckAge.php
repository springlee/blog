<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$test1,$test2)
    {
//        echo  $test1;
//        echo  $test2;exit;
        if ($request->id <= 200) {
            return redirect('home');
        }else{
            $response =$next($request);
        }

        return $response ;
    }

    public function terminate($request, $response)
    {
        file_put_contents('1.txt','hello');
    }
}
