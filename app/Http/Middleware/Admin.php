<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Admin
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
        if (Auth::user()->role != 1) {
			Auth::logout();
			return redirect(route('login'))->withErrors(['email' => 'These credentials do not match our records.']);
        }
        return $next($request);
    }
}
