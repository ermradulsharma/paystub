<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutoSessionTimeout
{
    /**
     * Automatically logout authenticated users after 15 minutes of inactivity.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $maxIdleSeconds = 900; // 15 Minutes
            $lastActivity = session('last_activity_time');

            if ($lastActivity && (time() - $lastActivity > $maxIdleSeconds)) {
                if (class_exists('\App\Http\Controllers\SettingController')) {
                    \App\Http\Controllers\SettingController::logSecurityAudit('IDLE_SESSION_TIMEOUT', 'User logged out automatically due to 15 minutes of inactivity.');
                }

                Auth::logout();
                session()->flush();

                return redirect()->route('login')->with('error', 'Session Expired: You have been logged out due to 15 minutes of inactivity for security protection.');
            }

            session(['last_activity_time' => time()]);
        }

        return $next($request);
    }
}
