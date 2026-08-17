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

    @if($next==1)
        <div class="page-header-wrapper mb-3">
            <div>
                <h1 style="font-size: 20px; font-weight: 700; margin-bottom: 2px;">Color Palettes</h1>
                <p style="font-size: 13px; color: var(--light-text-muted); margin: 0;">Configure template header accent color codes</p>
            </div>
            <div>
                <button class="btn btn-sm" wire:click="addColor" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 8px; font-weight: 600; padding: 6px 14px;">
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
                            <th style="padding: 8px 12px;">Color Name</th>
                            <th style="padding: 8px 12px;">Hex Code</th>
                            <th style="padding: 8px 12px;">Preview</th>
                            <th class="text-end" style="padding: 8px 12px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($colors as $key => $color)
                        <tr>
                            <td style="padding: 10px 12px; font-weight: 600; color: var(--light-text-muted);">{{ $key + 1 }}</td>
                            <td style="padding: 10px 12px; font-weight: 600; color: var(--light-text-main);">{{ $color->name }}</td>
                            <td style="padding: 10px 12px; font-family: monospace; color: var(--light-text-sub);">{{ $color->code }}</td>
                            <td style="padding: 10px 12px;">
                                <div style="width: 24px; height: 24px; border-radius: 6px; background-color: {{ $color->code }}; border: 1px solid var(--light-border);"></div>
                            </td>
                            <td class="text-end" style="padding: 10px 12px;">
                                <button type="button" class="btn btn-sm btn-outline-secondary me-1" style="border-radius: 6px; padding: 3px 10px; font-size: 12px;" wire:click="editColor({{ $color->id }})">Edit</button>
                                @if($confirming===$color->id)
                                    <button wire:click="deleteColor({{ $color->id }})" class="btn btn-sm btn-danger" style="border-radius: 6px; padding: 3px 10px; font-size: 12px;">Sure?</button>
                                @else
                                    <button wire:click="confirmDelete({{ $color->id }})" class="btn btn-sm btn-outline-danger" style="border-radius: 6px; padding: 3px 10px; font-size: 12px;">Delete</button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">No color codes configured.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="apple-card" style="padding: 20px;">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 style="font-size: 18px; font-weight: 700; color: var(--light-text-main); margin: 0;">{{ $page_title }}</h3>
                        <button type="button" wire:click="resetForm" class="btn btn-sm btn-outline-secondary" style="border-radius: 6px;">Back</button>
                    </div>

                    <form wire:submit.prevent="StoreColor">
                        <div class="mb-3">
                            <label class="form-label" style="font-size: 13px; font-weight: 600; color: var(--light-text-sub);">Color Name</label>
                            <input type="text" class="form-control form-control-sm" style="border-radius: 8px;" id="name" wire:model="name" placeholder="e.g. Royal Blue">
                            @error('name')
                                <div class="mt-1 text-danger small">* {{ $message }}</div>
                            @error
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-size: 13px; font-weight: 600; color: var(--light-text-sub);">Color Hex Code</label>
                            <input type="text" class="form-control form-control-sm" style="border-radius: 8px;" id="code" wire:model="code" placeholder="e.g. #2563eb">
                            @error('code')
                                <div class="mt-1 text-danger small">* {{ $message }}</div>
                            @error
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" wire:click="resetForm" class="btn btn-sm btn-outline-secondary" style="border-radius: 6px;">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-primary" style="background: var(--brand-primary); border: none; border-radius: 6px; font-weight: 600; padding: 6px 18px;">Save Color</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
