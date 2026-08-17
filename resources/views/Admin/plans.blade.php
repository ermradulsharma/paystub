@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Pricing Plans Manager</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Configure subscription pricing packages, dollar rates & billing cycles</p>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-4">
            <div class="apple-card">
                <div class="card-icon-pill indigo mb-2">
                    <i class="bi bi-tag-fill"></i>
                </div>
                <div class="card-label">Basic Package</div>
                <div class="card-value">$9.99 <span style="font-size: 13px; font-weight: 500; color: var(--light-text-muted);">/ stub</span></div>
                <div class="card-subtext mb-3">
                    <span>Standard single paystub generation with PDF download.</span>
                </div>
                <button class="btn btn-sm w-100" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600;">Edit Package</button>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="apple-card">
                <div class="card-icon-pill emerald mb-2">
                    <i class="bi bi-star-fill"></i>
                </div>
                <div class="card-label">Pro Monthly Plan</div>
                <div class="card-value">$29.99 <span style="font-size: 13px; font-weight: 500; color: var(--light-text-muted);">/ mo</span></div>
                <div class="card-subtext mb-3">
                    <span>Unlimited monthly paystubs, custom logos & priority support.</span>
                </div>
                <button class="btn btn-sm w-100" style="background: var(--brand-emerald); color: #fff; border: none; border-radius: 6px; font-weight: 600;">Edit Package</button>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="apple-card">
                <div class="card-icon-pill amber mb-2">
                    <i class="bi bi-building"></i>
                </div>
                <div class="card-label">Enterprise Annual</div>
                <div class="card-value">$199.99 <span style="font-size: 13px; font-weight: 500; color: var(--light-text-muted);">/ yr</span></div>
                <div class="card-subtext mb-3">
                    <span>Full commercial license, bulk CSV export & API integration.</span>
                </div>
                <button class="btn btn-sm w-100" style="background: var(--brand-amber); color: #fff; border: none; border-radius: 6px; font-weight: 600;">Edit Package</button>
            </div>
        </div>
    </div>
</main>
@endsection
