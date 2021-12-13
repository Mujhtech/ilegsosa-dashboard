<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Verify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->verified) {

            return redirect()->route('auth.verify');

        } else {

            return $next($request);
            
        }

    }
}
