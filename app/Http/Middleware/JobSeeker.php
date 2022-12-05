<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JobSeeker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = "job_seekers") {
        if(!auth()->guard($guard)->check()) { dd('sdf00');
            return redirect('/job_seekers/login')->with('error_message', 'You have not access');
        }
        return $next($request);
    }
}
