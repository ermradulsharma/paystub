<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\PaySlip;
use App\Models\Setting;
use App\Models\StateTax;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminSettingService
{
    /**
     * Get system settings list.
     *
     * @return array
     */
    public function getSettingsData(): array
    {
        $settingObj = Setting::first();
        $settings = $settingObj['settings'] ?? [];

        $smtp = json_decode(Setting::where('name', 'smtp')->value('value') ?? '[]', true);
        $app = json_decode(Setting::where('name', 'app')->value('value') ?? '[]', true);
        $notification = json_decode(Setting::where('name', 'push_notification_server_key')->value('value') ?? '[]', true);
        $currencyData = json_decode(Setting::where('name', 'paypal_configuration')->value('value') ?? '[]', true);
        $siteInfo = json_decode(Setting::where('name', 'site_info')->value('value') ?? '[]', true);
        $taxEngine = json_decode(Setting::where('name', 'tax_engine')->value('value') ?? '[]', true);
        $securityConfig = json_decode(Setting::where('name', 'security_config')->value('value') ?? '[]', true);
        $pdfEngine = json_decode(Setting::where('name', 'pdf_engine')->value('value') ?? '[]', true);

        return compact('settings', 'smtp', 'app', 'notification', 'currencyData', 'siteInfo', 'taxEngine', 'securityConfig', 'pdfEngine');
    }

    /**
     * Save or update state tax record.
     *
     * @param array $data
     * @return StateTax
     */
    public function saveStateTax(array $data): StateTax
    {
        if (!empty($data['tax_id'])) {
            $tax = StateTax::find($data['tax_id']) ?? new StateTax();
        } else {
            $tax = new StateTax();
        }

        $tax->state = $data['state'];
        $tax->state_code = strtoupper($data['state_code'] ?? substr($data['state'], 0, 2));
        $tax->country_code = strtoupper($data['country_code'] ?? 'USA');
        $tax->state_tax = $data['state_tax'];
        $tax->save();

        return $tax;
    }

    /**
     * Compute authentic revenue metrics.
     *
     * @return array
     */
    public function getRevenueMetrics(): array
    {
        $paymentSum = Payment::where('status', 'completed')->sum('amount');
        $payslipCount = PaySlip::count();
        $totalRevenue = (float)$paymentSum;

        $activeSubscriptionsCount = Subscription::where('expiry_date', '>=', Carbon::now())->count();
        $mrr = $activeSubscriptionsCount > 0 ? (float) Payment::where('status', 'completed')->where('created_at', '>=', Carbon::now()->subMonth())->sum('amount') : 0.00;

        $activeSubscribers = User::where('role_id', '!=', 1)->count();
        $avgOrderValue = $payslipCount > 0 ? round($totalRevenue / $payslipCount, 2) : 0.00;

        $recentTransactions = PaySlip::with('user')->latest()->take(10)->get();

        return compact('totalRevenue', 'mrr', 'activeSubscribers', 'avgOrderValue', 'recentTransactions');
    }

    /**
     * Get system health and telemetry metrics.
     *
     * @return array
     */
    public function getTelemetryData(): array
    {
        $dbPath = database_path('database.sqlite');
        $dbSize = file_exists($dbPath) ? round(filesize($dbPath) / 1024 / 1024, 2) : 0.5;
        $memoryUsage = round(memory_get_usage(true) / 1024 / 1024, 2);
        $peakMemory = round(memory_get_peak_usage(true) / 1024 / 1024, 2);
        $phpVersion = PHP_VERSION;
        $laravelVersion = app()->version();

        return compact('dbSize', 'memoryUsage', 'peakMemory', 'phpVersion', 'laravelVersion');
    }

    /**
     * Log administrative security audit event.
     *
     * @param string $action
     * @param string $details
     * @return void
     */
    public function logSecurityAudit(string $action, string $details): void
    {
        $logs = json_decode(Setting::where('name', 'security_audit_logs')->value('value') ?? '[]', true);

        $newEntry = [
            'id' => 'LOG-' . rand(1000, 9999),
            'user' => Auth::user()->email ?? 'System Admin',
            'action' => strtoupper($action),
            'details' => $details,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        array_unshift($logs, $newEntry);

        Setting::updateOrCreate(
            ['name' => 'security_audit_logs'],
            [
                'value' => json_encode($logs),
                'description' => 'Real-Time Admin Security Activity Audit Trail'
            ]
        );
    }
}
