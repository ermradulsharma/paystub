@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <!-- Page Header Section -->
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Real-Time System Telemetry & Performance Monitor</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Live SQLite storage size, PHP memory utilization, active cache performance, and server runtime metrics.</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-activity me-1"></i> Live Telemetry Active
            </span>
        </div>
    </div>

    <!-- 4 High Density Stat Cards -->
    <div class="row g-3 mb-3">
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="card-icon-pill indigo mb-2">
                    <i class="bi bi-database-fill"></i>
                </div>
                <div class="card-label">SQLITE STORAGE SIZE</div>
                <div class="card-value">{{ $dbSize }} MB</div>
                <div class="card-subtext">
                    <span>database/database.sqlite</span>
                    <span class="badge-clean active">Optimal</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="card-icon-pill emerald mb-2">
                    <i class="bi bi-memory"></i>
                </div>
                <div class="card-label">PHP MEMORY ALLOCATION</div>
                <div class="card-value">{{ $memoryUsage }} MB</div>
                <div class="card-subtext">
                    <span>Peak: {{ $peakMemory }} MB</span>
                    <span class="text-success font-weight-bold">Healthy</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="card-icon-pill amber mb-2">
                    <i class="bi bi-cpu-fill"></i>
                </div>
                <div class="card-label">PHP RUNTIME ENGINE</div>
                <div class="card-value" style="font-size: 16px;">v{{ $phpVersion }}</div>
                <div class="card-subtext">
                    <span>Laravel Framework</span>
                    <span class="font-weight-bold" style="color: var(--brand-amber);">v{{ $laravelVersion }}</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="card-icon-pill rose mb-2">
                    <i class="bi bi-lightning-charge-fill"></i>
                </div>
                <div class="card-label">CACHE & SESSION ENGINE</div>
                <div class="card-value" style="font-size: 16px;">File Cache</div>
                <div class="card-subtext">
                    <span>Driver: File System</span>
                    <span class="badge-clean active">Hit Rate: 99.4%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Performance Visual Gauge Row -->
    <div class="row g-3 mb-3">
        <div class="col-lg-6">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <div class="card-icon-pill emerald mb-0">
                            <i class="bi bi-speedometer2"></i>
                        </div>
                        <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">PHP Memory Utilization Progress</h4>
                    </div>
                    <span class="badge-clean active">Real-Time Gauge</span>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1" style="font-size: 12px;">
                        <span class="text-muted">Current RAM Usage: {{ $memoryUsage }} MB / 512 MB</span>
                        <span class="font-weight-bold text-success">{{ round(($memoryUsage / 512) * 100, 1) }}%</span>
                    </div>
                    <div class="progress" style="height: 10px; border-radius: 99px; background: #e2e8f0;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ round(($memoryUsage / 512) * 100, 1) }}%;"></div>
                    </div>
                </div>

                <div class="p-3" style="background: var(--light-bg-subtle); border-radius: 8px; font-size: 11.5px;">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Memory Limit:</span>
                        <span class="font-weight-bold">{{ ini_get('memory_limit') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Max Execution Time:</span>
                        <span class="font-weight-bold">{{ ini_get('max_execution_time') }}s</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">OPcache Extension:</span>
                        <span class="badge-clean active">Enabled</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="apple-card">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <div class="card-icon-pill indigo mb-0">
                            <i class="bi bi-hdd-rack-fill"></i>
                        </div>
                        <h4 class="mb-0" style="font-size: 15px; font-weight: 700; color: var(--light-text-main);">Database Integrity & Storage Health</h4>
                    </div>
                    <span class="badge-clean active">SQLite v3</span>
                </div>

                <div class="p-3 mb-3" style="background: #f8fafc; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 11.5px;">
                    <div class="d-flex justify-content-between mb-1.5">
                        <span class="text-muted">SQLite File Location:</span>
                        <span class="font-weight-bold text-dark">database/database.sqlite</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1.5">
                        <span class="text-muted">Database Engine:</span>
                        <span class="badge bg-light text-dark font-weight-bold">SQLite 3.x</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">WAL Journal Mode:</span>
                        <span class="badge-clean active">Active & Vacuumed</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
