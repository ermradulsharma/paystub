@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">System Health & Telemetry</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Monitor database size, PHP environment telemetry & server status</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-cpu-fill"></i> Health 100%
            </span>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="card-icon-pill indigo mb-2">
                    <i class="bi bi-database-fill-check"></i>
                </div>
                <div class="card-label">SQLite Database Size</div>
                <div class="card-value">{{ $dbSize }} <span style="font-size: 14px;">MB</span></div>
                <div class="card-subtext">
                    <span>Storage Engine</span>
                    <span style="color: var(--brand-primary); font-weight: 600;">SQLite 3</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="card-icon-pill emerald mb-2">
                    <i class="bi bi-code-slash"></i>
                </div>
                <div class="card-label">PHP Runtime Version</div>
                <div class="card-value" style="font-size: 20px;">{{ $phpVersion }}</div>
                <div class="card-subtext">
                    <span>Engine</span>
                    <span style="color: var(--brand-emerald); font-weight: 600;">Zend PHP</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="card-icon-pill amber mb-2">
                    <i class="bi bi-layers"></i>
                </div>
                <div class="card-label">Framework Version</div>
                <div class="card-value" style="font-size: 20px;">Laravel {{ $laravelVersion }}</div>
                <div class="card-subtext">
                    <span>Framework</span>
                    <span style="color: var(--brand-amber); font-weight: 600;">L9 LTS</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="apple-card">
                <div class="card-icon-pill rose mb-2">
                    <i class="bi bi-shield-check"></i>
                </div>
                <div class="card-label">Maintenance Mode</div>
                <div class="card-value" style="font-size: 18px; color: var(--brand-emerald);">DISABLED</div>
                <div class="card-subtext">
                    <span>Public Status</span>
                    <span style="color: var(--brand-emerald); font-weight: 600;">Online</span>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
