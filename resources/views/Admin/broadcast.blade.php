@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">System Broadcast Announcements</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Send live system alerts, maintenance notices, and broadcast messages to users</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-broadcast me-1"></i> Broadcast Engine Online
            </span>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="apple-card">
                <form>
                    <div class="mb-3">
                        <label class="form-label text-muted" style="font-size: 12.5px; font-weight: 600;">Announcement Headline</label>
                        <input type="text" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="e.g. Scheduled Tax Engine Maintenance Alert">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted" style="font-size: 12.5px; font-weight: 600;">Broadcast Target Audience</label>
                        <select class="form-select form-select-sm" style="border-radius: 6px;">
                            <option value="all">All Registered Customers</option>
                            <option value="subscribed">Active Subscribed Users Only</option>
                            <option value="usa">USA Customers Only</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-muted" style="font-size: 12.5px; font-weight: 600;">Broadcast Message Body</label>
                        <textarea rows="4" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="Write your broadcast announcement message here..."></textarea>
                    </div>

                    <button type="button" class="btn btn-sm w-100" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600;">
                        <i class="bi bi-send-fill me-1"></i> Send Live System Broadcast
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
