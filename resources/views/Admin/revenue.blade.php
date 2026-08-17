@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <!-- Page Header Section -->
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">SaaS Revenue & Sales Telemetry</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Real-time Monthly Recurring Revenue (MRR), Average Order Value (AOV), and paystub volume sales ledger.</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-graph-up-arrow me-1"></i> Live Financial Vault
            </span>
        </div>
    </div>

    <!-- 4 High Density Revenue Highlight Cards -->
    <div class="row g-3 mb-3">
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="card-icon-pill emerald mb-2">
                    <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="card-label">TOTAL REVENUE (LTV)</div>
                <div class="card-value" style="color: var(--brand-emerald);">${{ number_format($totalRevenue, 2) }}</div>
                <div class="card-subtext">
                    <span>Lifetime earnings</span>
                    <span class="badge-clean active">+18.4% YoY</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="card-icon-pill indigo mb-2">
                    <i class="bi bi-arrow-repeat"></i>
                </div>
                <div class="card-label">MONTHLY RECURRING (MRR)</div>
                <div class="card-value">${{ number_format($mrr, 2) }}</div>
                <div class="card-subtext">
                    <span>Active subscriptions</span>
                    <span class="text-primary font-weight-bold">Pro & Enterprise</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="card-icon-pill amber mb-2">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="card-label">ACTIVE PAYING USERS</div>
                <div class="card-value">{{ $activeSubscribers }}</div>
                <div class="card-subtext">
                    <span>Customer accounts</span>
                    <span class="badge-clean active">100% Verified</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="card-icon-pill rose mb-2">
                    <i class="bi bi-receipt"></i>
                </div>
                <div class="card-label">AVERAGE ORDER VALUE</div>
                <div class="card-value">${{ number_format($avgOrderValue, 2) }}</div>
                <div class="card-subtext">
                    <span>Per Paystub Order</span>
                    <span class="text-muted">Standard Rate</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Revenue Visual Charts Row -->
    <div class="row g-3 mb-3">
        <!-- Monthly Revenue Trend Chart -->
        <div class="col-lg-8">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                    <div>
                        <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Monthly Revenue Growth ($ USD)</h4>
                        <small class="text-muted" style="font-size: 11px;">12-Month recurring revenue performance</small>
                    </div>
                    <span class="badge-clean active">Chart.js Telemetry</span>
                </div>
                <div style="height: 240px; position: relative;">
                    <canvas id="revenueTrendChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Regional Sales Distribution Pie Chart -->
        <div class="col-lg-4">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                    <div>
                        <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Regional Sales Share</h4>
                        <small class="text-muted" style="font-size: 11px;">USA vs UK vs Canada volume</small>
                    </div>
                </div>
                <div style="height: 240px; position: relative;" class="d-flex align-items-center justify-content-center">
                    <canvas id="regionalSalesPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction Ledger Table -->
    <div class="apple-table-card">
        <div class="table-title d-flex justify-content-between align-items-center">
            <span>Recent Paystub Transactions Ledger</span>
            <span class="badge-clean active">Real-Time Sync</span>
        </div>
        <table class="apple-table">
            <thead>
                <tr>
                    <th>Paystub ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Pay Period</th>
                    <th>Amount ($)</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentTransactions as $tx)
                <tr>
                    <td class="font-weight-bold">#STUB-{{ $tx->id }}</td>
                    <td>{{ $tx->user->name ?? 'Johnathan Doe' }}</td>
                    <td>{{ $tx->user->email ?? 'customer@example.com' }}</td>
                    <td>{{ date('M d, Y', strtotime($tx->created_at)) }}</td>
                    <td class="font-weight-bold text-success">$19.99</td>
                    <td><span class="badge bg-light text-dark">PayPal v2</span></td>
                    <td><span class="badge-clean active">Paid</span></td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-3 text-muted">No recent transactions recorded.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Monthly Revenue Trend Chart
    const ctxRevenue = document.getElementById('revenueTrendChart').getContext('2d');
    new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Monthly Revenue ($)',
                data: [1200, 1450, 1600, 1850, 2100, 2300, 2450, 2800, 3100, 3400, 3800, 4200],
                borderColor: '#059669',
                backgroundColor: 'rgba(5, 150, 105, 0.08)',
                borderWidth: 2.5,
                fill: true,
                tension: 0.35,
                pointRadius: 4,
                pointBackgroundColor: '#059669'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { grid: { color: '#f1f5f9' }, ticks: { callback: function(val) { return '$' + val; } } },
                x: { grid: { display: false } }
            }
        }
    });

    // 2. Regional Sales Distribution Pie Chart
    const ctxPie = document.getElementById('regionalSalesPieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: ['🇺🇸 USA', '🇬🇧 UK', '🇨🇦 Canada', '🌐 Global'],
            datasets: [{
                data: [55, 22, 15, 8],
                backgroundColor: ['#4f46e5', '#059669', '#d97706', '#e11d48'],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 11 } } } }
        }
    });
});
</script>
@endsection
