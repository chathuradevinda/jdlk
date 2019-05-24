<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Response;
use Closure;

class TradepersonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    public function handle($request, Closure $next)
    {
        if ($this->auth->getUser()->type !== "3") {
            //abort(403, 'Unauthorized action.');
            return new Response(view('layouts/unauthorized'));
           // return view(‘/layouts/unauthorized’);
        }

        return $next($request);
       
    }
}
