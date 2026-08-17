@extends('Admin.layouts.default')
@section('content')

@php
    $statesList = $stateTaxes ?? $states ?? \App\Models\StateTax::orderBy('state', 'asc')->get();
@endphp

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">US State Taxes Manager</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Configure tax percentage rates for all 50 US States</p>
        </div>
    </div>

    <div class="apple-table-card">
        <div class="table-responsive">
            <table class="apple-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>State Code</th>
                        <th>State Name</th>
                        <th>Tax Rate (%)</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($statesList as $key => $st)
                    <tr>
                        <td style="font-weight: 600; color: var(--light-text-muted);">{{ $key + 1 }}</td>
                        <td>
                            <span class="badge" style="background: var(--brand-primary-light); color: var(--brand-primary); border: 1px solid var(--brand-primary-border); border-radius: 4px; padding: 2px 6px; font-size: 11px; text-transform: uppercase;">
                                {{ $st->state_code ?? 'US' }}
                            </span>
                        </td>
                        <td style="font-weight: 600; color: var(--light-text-main);">{{ $st->state ?? $st->name ?? 'State' }}</td>
                        <td style="font-weight: 700; color: var(--brand-emerald);">{{ $st->state_tax ?? $st->tax_rate ?? '0.00' }} %</td>
                        <td class="text-end">
                            <button type="button" class="btn btn-sm btn-outline-secondary" style="border-radius: 6px; padding: 2px 8px; font-size: 11px;">Edit Rate</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">No state tax rates configured.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
