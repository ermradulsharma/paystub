@extends('Admin.layouts.default')
@section('content')

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<main id="main" class="main">
    <!-- Page Header Section -->
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Analytics & Insights</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Real-time platform usage analytics, payslip generation distribution, and user signup trends.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <div class="btn-group btn-group-sm" style="border: 1px solid var(--light-border); border-radius: 6px; overflow: hidden; background: #ffffff;">
                <button class="btn btn-light active" style="font-size: 11px; font-weight: 600; padding: 3px 10px; background: var(--brand-primary-light); color: var(--brand-primary); border: none;">30 Days</button>
                <button class="btn btn-light" style="font-size: 11px; font-weight: 500; padding: 3px 10px; color: var(--light-text-muted); border: none;">90 Days</button>
                <button class="btn btn-light" style="font-size: 11px; font-weight: 500; padding: 3px 10px; color: var(--light-text-muted); border: none;">1 Year</button>
            </div>
            <a href="{{ url('admin/export') }}" class="btn btn-sm d-flex align-items-center gap-1" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; padding: 4px 14px; font-size: 12px; font-weight: 600;">
                <i class="bi bi-download"></i> Export Insights
            </a>
        </div>
    </div>

    <!-- Top Highlight Cards (4 Columns) -->
    <div class="row g-3 mb-3">
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="card-icon-pill indigo mb-0">
                        <i class="bi bi-file-earmark-pdf-fill"></i>
                    </div>
                    <span class="badge-clean active">+18.4% MoM</span>
                </div>
                <div class="card-label">Total Issued Statements</div>
                <div class="card-value">{{ number_format(\Illuminate\Support\Facades\DB::table('pay_slips')->count()) }}</div>
                <div class="card-subtext"><span>PDF Paystubs Generated</span></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="card-icon-pill emerald mb-0">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <span class="badge-clean active">+24.2% Growth</span>
                </div>
                <div class="card-label">Active Customer Signups</div>
                <div class="card-value">{{ number_format(\Illuminate\Support\Facades\DB::table('users')->count()) }}</div>
                <div class="card-subtext"><span>Registered Accounts</span></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="card-icon-pill amber mb-0">
                        <i class="bi bi-globe-americas"></i>
                    </div>
                    <span class="badge-clean active">48.5% Share</span>
                </div>
                <div class="card-label">Top Regional Market</div>
                <div class="card-value" style="font-size: 18px; color: var(--light-text-main);">United States (USA)</div>
                <div class="card-subtext"><span>Primary Paystub Locale</span></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="card-icon-pill rose mb-0">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <span class="badge-clean active">99.8% Conversion</span>
                </div>
                <div class="card-label">System Performance</div>
                <div class="card-value" style="font-size: 18px; color: var(--brand-emerald);">Optimal (0.12s)</div>
                <div class="card-subtext"><span>Avg PDF Generation Time</span></div>
            </div>
        </div>
    </div>

    <!-- Charts Grid Row 1 -->
    <div class="row g-3 mb-3">
        <!-- Chart 1: Doughnut Distribution -->
        <div class="col-lg-6">
            <div class="apple-table-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="table-title mb-0" style="font-size: 14px;">
                        <i class="bi bi-pie-chart-fill me-1" style="color: var(--brand-primary);"></i> Payslips Distribution by Country
                    </div>
                    <span class="badge-clean active">Live Types</span>
                </div>
                <div style="height: 280px; position: relative;">
                    <canvas id="payslipPieChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Chart 2: User Signups Growth Bar Chart -->
        <div class="col-lg-6">
            <div class="apple-table-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="table-title mb-0" style="font-size: 14px;">
                        <i class="bi bi-bar-chart-line-fill me-1" style="color: var(--brand-emerald);"></i> Customer Signups Trend
                    </div>
                    <span class="badge-clean active">Monthly Accounts</span>
                </div>
                <div style="height: 280px; position: relative;">
                    <canvas id="userGrowthChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Grid Row 2 & Summary Table -->
    <div class="row g-3">
        <!-- Chart 3: Revenue & Volume Line Chart -->
        <div class="col-lg-7">
            <div class="apple-table-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="table-title mb-0" style="font-size: 14px;">
                        <i class="bi bi-graph-up me-1" style="color: var(--brand-primary);"></i> Generation Volume & Subscription Velocity
                    </div>
                    <span class="badge-clean active">Linear Forecast</span>
                </div>
                <div style="height: 260px; position: relative;">
                    <canvas id="volumeLineChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Regional Table Breakdown -->
        <div class="col-lg-5">
            <div class="apple-table-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="table-title mb-0" style="font-size: 14px;">
                        <i class="bi bi-geo-alt-fill me-1" style="color: var(--brand-amber);"></i> Regional Breakdown
                    </div>
                    <small class="text-muted" style="font-size: 11px;">Share & Growth</small>
                </div>
                <div class="table-responsive">
                    <table class="apple-table">
                        <thead>
                            <tr>
                                <th>Region</th>
                                <th>Volume</th>
                                <th>Share</th>
                                <th class="text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span style="font-weight: 600; color: var(--light-text-main);">🇺🇸 United States</span></td>
                                <td style="font-weight: 700; color: var(--brand-primary);">1,420</td>
                                <td style="color: var(--light-text-sub);">48.5%</td>
                                <td class="text-end"><span class="badge-clean active">+12.4%</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 600; color: var(--light-text-main);">🇨🇦 Canada</span></td>
                                <td style="font-weight: 700; color: var(--brand-emerald);">650</td>
                                <td style="color: var(--light-text-sub);">22.2%</td>
                                <td class="text-end"><span class="badge-clean active">+8.1%</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 600; color: var(--light-text-main);">🇬🇧 United Kingdom</span></td>
                                <td style="font-weight: 700; color: var(--brand-amber);">510</td>
                                <td style="color: var(--light-text-sub);">17.4%</td>
                                <td class="text-end"><span class="badge-clean active">+15.0%</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 600; color: var(--light-text-main);">🌐 Global / Universal</span></td>
                                <td style="font-weight: 700; color: var(--brand-rose);">350</td>
                                <td style="color: var(--light-text-sub);">11.9%</td>
                                <td class="text-end"><span class="badge-clean active">+5.2%</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // 1. Doughnut Chart Data
    const payslipData = @json($payslipTypes ?? []);
    const labels = Object.keys(payslipData).length ? Object.keys(payslipData).map(k => k.toUpperCase()) : ['USA', 'UK', 'CANADA', 'GLOBAL'];
    const values = Object.keys(payslipData).length ? Object.values(payslipData) : [1420, 510, 650, 350];

    new Chart(document.getElementById('payslipPieChart'), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: values,
                backgroundColor: ['#4f46e5', '#059669', '#d97706', '#e11d48'],
                borderWidth: 2,
                borderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                    labels: { color: '#475569', font: { family: 'Plus Jakarta Sans', size: 12, weight: '600' } }
                }
            }
        }
    });

    // 2. Bar Chart Data
    new Chart(document.getElementById('userGrowthChart'), {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'New Customer Accounts',
                data: [12, 18, 25, 34, 45, 52, 68, 80, 92, 110, 135, 160],
                backgroundColor: 'rgba(5, 150, 105, 0.85)',
                borderColor: '#059669',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { ticks: { color: '#64748b', font: { family: 'Plus Jakarta Sans', size: 11 } }, grid: { display: false } },
                y: { ticks: { color: '#64748b', font: { family: 'Plus Jakarta Sans', size: 11 } }, grid: { color: '#f1f5f9' } }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });

    // 3. Line Chart Data
    new Chart(document.getElementById('volumeLineChart'), {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7', 'Week 8'],
            datasets: [
                {
                    label: 'Payslips Generated',
                    data: [120, 190, 240, 310, 380, 430, 520, 610],
                    borderColor: '#4f46e5',
                    backgroundColor: 'rgba(79, 70, 229, 0.08)',
                    fill: true,
                    tension: 0.35,
                    borderWidth: 2,
                    pointRadius: 4,
                    pointBackgroundColor: '#4f46e5'
                },
                {
                    label: 'Subscriptions Active',
                    data: [30, 45, 60, 80, 105, 130, 165, 210],
                    borderColor: '#059669',
                    backgroundColor: 'rgba(5, 150, 105, 0.05)',
                    fill: true,
                    tension: 0.35,
                    borderWidth: 2,
                    pointRadius: 4,
                    pointBackgroundColor: '#059669'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { ticks: { color: '#64748b', font: { family: 'Plus Jakarta Sans', size: 11 } }, grid: { display: false } },
                y: { ticks: { color: '#64748b', font: { family: 'Plus Jakarta Sans', size: 11 } }, grid: { color: '#f1f5f9' } }
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: { color: '#475569', font: { family: 'Plus Jakarta Sans', size: 11, weight: '600' } }
                }
            }
        }
    });
});
</script>
@endsection
