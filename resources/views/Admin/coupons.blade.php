@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Promo Coupons & Discount Codes</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Create checkout discount codes, percentage rates & expiration dates</p>
        </div>
        <div>
            <button class="btn btn-sm" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600; font-size: 12px;">
                <i class="bi bi-plus-lg me-1"></i> Create Coupon
            </button>
        </div>
    </div>

    <div class="apple-table-card">
        <div class="table-responsive">
            <table class="apple-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Coupon Code</th>
                        <th>Discount Rate</th>
                        <th>Usage Limit</th>
                        <th>Expiration Date</th>
                        <th class="text-end">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: 600; color: var(--light-text-muted);">1</td>
                        <td>
                            <span class="badge" style="background: var(--brand-primary-light); color: var(--brand-primary); border: 1px solid var(--brand-primary-border); border-radius: 4px; padding: 2px 8px; font-size: 11px; font-family: monospace; text-transform: uppercase;">
                                WELCOME50
                            </span>
                        </td>
                        <td style="font-weight: 700; color: var(--brand-emerald);">50% OFF</td>
                        <td style="color: var(--light-text-sub);">500 Uses</td>
                        <td style="color: var(--light-text-muted); font-size: 12px;">31 Dec 2026</td>
                        <td class="text-end">
                            <span class="badge-clean active">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600; color: var(--light-text-muted);">2</td>
                        <td>
                            <span class="badge" style="background: var(--brand-emerald-light); color: var(--brand-emerald); border: 1px solid rgba(5,150,105,0.2); border-radius: 4px; padding: 2px 8px; font-size: 11px; font-family: monospace; text-transform: uppercase;">
                                SAVE20
                            </span>
                        </td>
                        <td style="font-weight: 700; color: var(--brand-emerald);">20% OFF</td>
                        <td style="color: var(--light-text-sub);">1000 Uses</td>
                        <td style="color: var(--light-text-muted); font-size: 12px;">15 Nov 2026</td>
                        <td class="text-end">
                            <span class="badge-clean active">Active</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
