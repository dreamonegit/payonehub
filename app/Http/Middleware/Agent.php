<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Agent
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
        if (!Auth::check()) {
            return redirect()->route('admin');
        }
        if (Auth::user()->role != 2) {
            return back();
        }
        return $next($request);
    }
}
