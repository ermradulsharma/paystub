<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeadersMiddleware
{
    /**
     * Handle an incoming request and attach enterprise security headers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 1. Block Cross-Site Tracing (XST) Attacks via TRACE/TRACK HTTP methods
        if (in_array(strtoupper($request->getMethod()), ['TRACE', 'TRACK'])) {
            return response()->view('errors.403', ['exception' => new \Exception('Security Block: HTTP TRACE/TRACK methods disallowed.')], 403);
        }

        $response = $next($request);

        if (method_exists($response, 'header')) {
            $response->header('X-Frame-Options', 'SAMEORIGIN');
            $response->header('X-Content-Type-Options', 'nosniff');
            $response->header('X-XSS-Protection', '1; mode=block');
            $response->header('Referrer-Policy', 'strict-origin-when-cross-origin');
            $response->header('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
            $response->header('Content-Security-Policy', "default-src 'self' 'unsafe-inline' 'unsafe-eval' https: data: blob:;");
        }

        return $response;
    }
}
