<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionSecurityCheck
{
    /**
     * Bind authenticated session strictly to client IP address & User-Agent fingerprint.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $currentIp = $request->ip();
            $currentFingerprint = md5($request->userAgent());

            if (!session()->has('user_ip')) {
                session(['user_ip' => $currentIp, 'user_fingerprint' => $currentFingerprint]);
            } else {
                $sessionIp = session('user_ip');
                $sessionFingerprint = session('user_fingerprint');

                if ($sessionIp !== $currentIp || $sessionFingerprint !== $currentFingerprint) {
                    if (class_exists('\App\Http\Controllers\SettingController')) {
                        \App\Http\Controllers\SettingController::logSecurityAudit('SESSION_HIJACK_BLOCKED', 'Session invalidated due to IP / Fingerprint mismatch from IP: ' . $currentIp);
                    }

                    Auth::logout();
                    session()->flush();

                    return redirect()->route('login')->with('error', 'Security Alert: Session invalidated due to IP address or browser device fingerprint change.');
                }
            }
        }

        return $next($request);
    }
}
