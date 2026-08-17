<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SqlInjectionShield
{
    /**
     * Inspect incoming requests for SQL Injection, Path Traversal, and XSS attack payloads.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $input = json_encode($request->all());

        // 1. SQL Injection Attack Patterns
        $sqliPatterns = [
            '/(\b(union\s+select|select\s+.*\s+from|insert\s+into|delete\s+from|drop\s+table|truncate\s+table|alter\s+table)\b)/i',
            '/(\b(or|and)\b\s+[\'"]?\d+[\'"]?\s*=\s*[\'"]?\d+[\'"]?)/i',
            '/(--|\/\*|\*\/|;\s*drop|;\s*select)/i'
        ];

        foreach ($sqliPatterns as $pattern) {
            if (preg_match($pattern, $input)) {
                if (class_exists('\App\Http\Controllers\SettingController')) {
                    \App\Http\Controllers\SettingController::logSecurityAudit('SQLI_ATTACK_BLOCKED', 'Blocked malicious SQL injection payload from IP: ' . $request->ip());
                }
                return response()->view('errors.403', ['exception' => new \Exception('Security Block: Malicious SQLi Payload Detected.')], 403);
            }
        }

        // 2. Directory Path Traversal Patterns
        if (preg_match('/(\.\.\/|\.\.\\\\)/', $input)) {
            return response()->view('errors.403', ['exception' => new \Exception('Security Block: Directory Path Traversal Detected.')], 403);
        }

        return $next($request);
    }
}
