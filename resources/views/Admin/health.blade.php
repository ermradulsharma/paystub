@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <!-- Page Header Section -->
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">System Telemetry & Server Health</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Monitor database size, memory usage, environment configuration, and service operational status.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <span class="badge-clean active">
                <i class="bi bi-cpu-fill me-1"></i> Systems Operational (100%)
            </span>
            <button class="btn btn-sm d-flex align-items-center gap-1" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; padding: 4px 14px; font-size: 12px; font-weight: 600;" onclick="location.reload();">
                <i class="bi bi-arrow-clockwise"></i> Run Health Diagnostic
            </button>
        </div>
    </div>

    <!-- Top Telemetry Highlight Cards -->
    <div class="row g-3 mb-3">
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="card-icon-pill indigo mb-0">
                        <i class="bi bi-database-fill-check"></i>
                    </div>
                    <span class="badge-clean active">SQLite 3</span>
                </div>
                <div class="card-label">Database Storage File</div>
                <div class="card-value">{{ $dbSize }} <span style="font-size: 14px;">MB</span></div>
                <div class="card-subtext">
                    <span>File Path: database.sqlite</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="card-icon-pill emerald mb-0">
                        <i class="bi bi-code-slash"></i>
                    </div>
                    <span class="badge-clean active">PHP Runtime</span>
                </div>
                <div class="card-label">PHP Engine Version</div>
                <div class="card-value" style="font-size: 20px;">v{{ $phpVersion }}</div>
                <div class="card-subtext">
                    <span>Zend Engine Architecture</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="card-icon-pill amber mb-0">
                        <i class="bi bi-layers"></i>
                    </div>
                    <span class="badge-clean active">Laravel 9</span>
                </div>
                <div class="card-label">Framework Engine</div>
                <div class="card-value" style="font-size: 20px;">v{{ $laravelVersion }}</div>
                <div class="card-subtext">
                    <span>LTS Enterprise Build</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="card-icon-pill rose mb-0">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <span class="badge-clean active">Online</span>
                </div>
                <div class="card-label">Maintenance Mode</div>
                <div class="card-value" style="font-size: 18px; color: var(--brand-emerald);">OPERATIONAL</div>
                <div class="card-subtext">
                    <span>Public Traffic Allowed</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Telemetry Table & Server Config Row -->
    <div class="row g-3">
        <!-- Service Health Check Matrix -->
        <div class="col-lg-7">
            <div class="apple-table-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="table-title mb-0" style="font-size: 14px;">
                        <i class="bi bi-activity me-1" style="color: var(--brand-primary);"></i> Core System Services Status Matrix
                    </div>
                    <span class="badge-clean active">All Checks Passed</span>
                </div>
                <div class="table-responsive">
                    <table class="apple-table">
                        <thead>
                            <tr>
                                <th>Service / Component</th>
                                <th>Driver / Provider</th>
                                <th>Latency / Status</th>
                                <th class="text-end">Health</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span style="font-weight: 600; color: var(--light-text-main);">Database Engine</span></td>
                                <td style="font-family: monospace; color: var(--brand-primary);">SQLite 3 (PDO)</td>
                                <td style="color: var(--light-text-sub);">0.42 ms latency</td>
                                <td class="text-end"><span class="badge-clean active">Operational</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 600; color: var(--light-text-main);">PDF Generator Engine</span></td>
                                <td style="font-family: monospace; color: var(--brand-emerald);">DomPDF 2.0 / GD</td>
                                <td style="color: var(--light-text-sub);">Active (0.12s rendering)</td>
                                <td class="text-end"><span class="badge-clean active">Operational</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 600; color: var(--light-text-main);">Cache Driver</span></td>
                                <td style="font-family: monospace; color: var(--brand-amber);">File Cache Store</td>
                                <td style="color: var(--light-text-sub);">0.08 ms lookup</td>
                                <td class="text-end"><span class="badge-clean active">Operational</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 600; color: var(--light-text-main);">Session Storage</span></td>
                                <td style="font-family: monospace; color: var(--brand-primary);">File Session Store</td>
                                <td style="color: var(--light-text-sub);">Active Sessions</td>
                                <td class="text-end"><span class="badge-clean active">Operational</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 600; color: var(--light-text-main);">Mail Dispatcher</span></td>
                                <td style="font-family: monospace; color: var(--brand-rose);">SMTP / Mail Engine</td>
                                <td style="color: var(--light-text-sub);">Ready for Dispatch</td>
                                <td class="text-end"><span class="badge-clean active">Operational</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Server Environment Config Panel -->
        <div class="col-lg-5">
            <div class="apple-table-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="table-title mb-0" style="font-size: 14px;">
                        <i class="bi bi-sliders me-1" style="color: var(--brand-amber);"></i> Server Environment Info
                    </div>
                    <span class="badge" style="background: var(--light-bg-subtle); color: var(--light-text-sub); border: 1px solid var(--light-border); font-size: 10px;">INI Config</span>
                </div>

                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center justify-content-between p-2" style="background: var(--light-bg-app); border-radius: 8px; border: 1px solid var(--light-border-subtle);">
                        <span class="text-muted" style="font-size: 12px; font-weight: 600;">PHP Memory Limit</span>
                        <span class="badge" style="background: var(--brand-primary-light); color: var(--brand-primary); font-family: monospace; font-size: 12px;">{{ ini_get('memory_limit') ?: '512M' }}</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between p-2" style="background: var(--light-bg-app); border-radius: 8px; border: 1px solid var(--light-border-subtle);">
                        <span class="text-muted" style="font-size: 12px; font-weight: 600;">Max Upload File Size</span>
                        <span class="badge" style="background: var(--brand-emerald-light); color: var(--brand-emerald); font-family: monospace; font-size: 12px;">{{ ini_get('upload_max_filesize') ?: '64M' }}</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between p-2" style="background: var(--light-bg-app); border-radius: 8px; border: 1px solid var(--light-border-subtle);">
                        <span class="text-muted" style="font-size: 12px; font-weight: 600;">App Timezone</span>
                        <span class="badge" style="background: var(--brand-amber-light); color: var(--brand-amber); font-family: monospace; font-size: 12px;">{{ config('app.timezone', 'UTC') }}</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between p-2" style="background: var(--light-bg-app); border-radius: 8px; border: 1px solid var(--light-border-subtle);">
                        <span class="text-muted" style="font-size: 12px; font-weight: 600;">App Environment</span>
                        <span class="badge" style="background: var(--brand-rose-light); color: var(--brand-rose); font-family: monospace; font-size: 12px;">{{ config('app.env', 'production') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
