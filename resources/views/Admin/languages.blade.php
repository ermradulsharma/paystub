@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Language & Localization Manager</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Manage multi-language translations for paystub forms and website UI</p>
        </div>
    </div>

    <div class="apple-table-card">
        <div class="table-responsive">
            <table class="apple-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Language</th>
                        <th>Locale Code</th>
                        <th>Progress</th>
                        <th class="text-end">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: 600; color: var(--light-text-muted);">1</td>
                        <td style="font-weight: 600; color: var(--light-text-main);">English (Default)</td>
                        <td style="font-family: monospace; color: var(--brand-primary);">en</td>
                        <td style="color: var(--brand-emerald); font-weight: 600;">100% Translated</td>
                        <td class="text-end">
                            <span class="badge-clean active">Default</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600; color: var(--light-text-muted);">2</td>
                        <td style="font-weight: 600; color: var(--light-text-main);">Spanish (Español)</td>
                        <td style="font-family: monospace; color: var(--brand-primary);">es</td>
                        <td style="color: var(--brand-emerald); font-weight: 600;">98% Translated</td>
                        <td class="text-end">
                            <span class="badge-clean active">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: 600; color: var(--light-text-muted);">3</td>
                        <td style="font-weight: 600; color: var(--light-text-main);">French (Français)</td>
                        <td style="font-family: monospace; color: var(--brand-primary);">fr</td>
                        <td style="color: var(--brand-amber); font-weight: 600;">92% Translated</td>
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
