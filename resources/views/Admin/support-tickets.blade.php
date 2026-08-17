@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <!-- Page Header Section -->
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">Customer Support Tickets & Helpdesk Center</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Manage customer support tickets, answer tax calculation inquiries, and dispatch instant replies.</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-chat-left-dots-fill me-1"></i> Helpdesk Active
            </span>
        </div>
    </div>

    <!-- Ticket Ledger Table Card -->
    <div class="apple-table-card">
        <div class="table-title d-flex justify-content-between align-items-center mb-3">
            <span>All Customer Support Tickets ({{ count($tickets) }})</span>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-outline-secondary" style="font-size: 11.5px; border-radius: 6px;">
                    <i class="bi bi-funnel-fill me-1"></i> Filter Status
                </button>
            </div>
        </div>

        <table class="apple-table">
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Subject</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $t)
                <tr>
                    <td class="font-weight-bold" style="color: var(--brand-primary);">{{ $t['id'] }}</td>
                    <td class="font-weight-bold">{{ $t['customer'] }}</td>
                    <td>{{ $t['email'] }}</td>
                    <td style="max-width: 260px;" class="text-truncate">{{ $t['subject'] }}</td>
                    <td>
                        <span class="badge {{ $t['priority'] == 'High' ? 'bg-danger' : ($t['priority'] == 'Medium' ? 'bg-warning text-dark' : 'bg-secondary') }}" style="font-size: 9.5px;">
                            {{ strtoupper($t['priority']) }}
                        </span>
                    </td>
                    <td>
                        <span class="badge-clean {{ $t['status'] == 'Open' ? 'active' : ($t['status'] == 'In Progress' ? 'pending' : '') }}">
                            {{ $t['status'] }}
                        </span>
                    </td>
                    <td>{{ $t['created_at'] }}</td>
                    <td class="text-end">
                        <button class="btn btn-sm" style="background: var(--brand-primary-light); color: var(--brand-primary); border: 1px solid var(--brand-primary-border); border-radius: 6px; font-size: 11px; font-weight: 600; padding: 2px 10px;" onclick="replyTicket('{{ $t['id'] }}', '{{ $t['customer'] }}')">
                            <i class="bi bi-reply-fill me-1"></i> Reply
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Quick Reply Modal Drawer -->
    <div class="modal fade" id="replyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 12px; border: 1px solid var(--light-border);">
                <div class="modal-header border-bottom py-2.5">
                    <h5 class="modal-title font-weight-bold" style="font-size: 15px;" id="modalTicketTitle">Reply to Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.support-tickets') }}" method="POST">
                    @csrf
                    <div class="modal-body p-3">
                        <div class="mb-2">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Response Message Body</label>
                            <textarea rows="4" name="reply_message" class="form-control form-control-sm" style="border-radius: 6px;" placeholder="Type your response to the customer..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-top py-2">
                        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm" style="background: var(--brand-primary); color: #fff; border-radius: 6px; font-weight: 600;">Send Response</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
function replyTicket(id, customer) {
    document.getElementById('modalTicketTitle').innerText = 'Reply to ' + customer + ' (' + id + ')';
    var myModal = new bootstrap.Modal(document.getElementById('replyModal'));
    myModal.show();
}
</script>
@endsection
