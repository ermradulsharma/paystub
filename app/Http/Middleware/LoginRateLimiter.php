<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class LoginRateLimiter
{
    /**
     * Handle brute-force login attempts (Max 5 failed login attempts per minute per IP).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $key = 'login_attempts:' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return redirect()->back()->with('error', "Security Lockout: Too many failed login attempts. Please try again in {$seconds} seconds.");
        }

        RateLimiter::hit($key, 60);

        return $next($request);
    }
}
