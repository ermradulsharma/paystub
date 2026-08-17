<div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: var(--brand-emerald-light); border: 1px solid rgba(5, 150, 105, 0.2); color: var(--brand-emerald); border-radius: 10px; margin-bottom: 16px;">
            <strong><i class="bi bi-check-circle-fill me-2"></i> {{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background: var(--brand-rose-light); border: 1px solid rgba(225, 29, 72, 0.2); color: var(--brand-rose); border-radius: 10px; margin-bottom: 16px;">
            <strong><i class="bi bi-exclamation-triangle-fill me-2"></i> {{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($next == 1)
        <div class="page-header-wrapper mb-3">
            <div>
                <h1 style="font-size: 20px; font-weight: 700; margin-bottom: 2px;">Tax Deduction Rules</h1>
                <p style="font-size: 13px; color: var(--light-text-muted); margin: 0;">Configure Tax Percentages & Automatic Paystub Deductions</p>
            </div>
            <div>
                <button class="btn btn-sm" wire:click="addDeduction" style="background: var(--brand-emerald); color: #fff; border: none; border-radius: 8px; font-weight: 600; padding: 6px 14px;">
                    <i class="bi bi-plus-lg me-1"></i> {{ $page_title }}
                </button>
            </div>
        </div>

        <div class="apple-table-card" style="padding: 16px;">
            <div class="table-responsive">
                <table class="apple-table">
                    <thead>
                        <tr>
                            <th style="padding: 8px 12px;">#</th>
                            <th style="padding: 8px 12px;">Country / State</th>
                            <th style="padding: 8px 12px;">Deduction Name</th>
                            <th style="padding: 8px 12px;">Percentage</th>
                            <th class="text-end" style="padding: 8px 12px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($deductions as $key => $item)
                            <tr>
                                <td style="padding: 8px 12px; font-weight: 600; color: var(--light-text-muted);">{{ $key + 1 }}</td>
                                <td style="padding: 8px 12px;">
                                    <span class="badge" style="background: var(--brand-emerald-light); color: var(--brand-emerald); border: 1px solid rgba(5, 150, 105, 0.2); border-radius: 6px; padding: 3px 8px; font-size: 11px; text-transform: uppercase;">
                                        {{ $item->state }}
                                    </span>
                                </td>
                                <td style="padding: 8px 12px; font-weight: 600; color: var(--light-text-main);">{{ $item->title }}</td>
                                <td style="padding: 8px 12px; font-weight: 700; color: var(--brand-emerald);">{{ $item->price }} %</td>
                                <td class="text-end" style="padding: 8px 12px;">
                                    @if ($item->title != 'State Tax')
                                        <button type="button" class="btn btn-sm btn-outline-secondary" style="border-radius: 6px; padding: 3px 10px; font-size: 12px;"
                                            wire:click="editDeduction({{ $item->id }})">
                                            Edit
                                        </button>
                                    @else
                                        <span class="badge bg-secondary" style="font-size: 10px;">System Locked</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">No deduction rules configured.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="apple-card" style="padding: 20px;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 style="font-size: 18px; font-weight: 700; color: var(--light-text-main); margin: 0;">{{ $page_title }}</h3>
                        <button type="button" wire:click="back" class="btn btn-sm btn-outline-secondary" style="border-radius: 6px;">
                            <i class="bi bi-arrow-left me-1"></i> Back to List
                        </button>
                    </div>

                    <form wire:submit.prevent="StoreDeduction">
                        <div class="row mb-3 align-items-center">
                            <label class="col-sm-3 col-form-label text-muted" style="font-size: 13px; font-weight: 600;">State / Country</label>
                            <div class="col-sm-9">
                                <select class="form-select form-select-sm" style="border-radius: 8px;" wire:model="state">
                                    <option value="">Select State / Country</option>
                                    <option value="usa">USA</option>
                                    <option value="canada">CANADA</option>
                                    <option value="uk">UK</option>
                                    <option value="global">GLOBAL</option>
                                </select>
                                @error('state')
                                    <div class="mt-1 text-danger small">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label class="col-sm-3 col-form-label text-muted" style="font-size: 13px; font-weight: 600;">Deduction Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" style="border-radius: 8px;" id="title"
                                    {{ $title == 'State Tax' ? 'disabled' : '' }} wire:model="title" placeholder="e.g. Social Security Tax">
                                @error('title')
                                    <div class="mt-1 text-danger small">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <label class="col-sm-3 col-form-label text-muted" style="font-size: 13px; font-weight: 600;">Rate (%)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" style="border-radius: 8px;" id="price" wire:model="price" placeholder="e.g. 6.2">
                                @error('price')
                                    <div class="mt-1 text-danger small">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" wire:click="back" class="btn btn-sm btn-outline-secondary" style="border-radius: 6px;">Back</button>
                            <button type="submit" class="btn btn-sm btn-success" style="background: var(--brand-emerald); border: none; border-radius: 6px; font-weight: 600; padding: 6px 18px;">Save Rule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
