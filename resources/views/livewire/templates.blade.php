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
                <h1 style="font-size: 20px; font-weight: 700; margin-bottom: 2px;">Template Library</h1>
                <p style="font-size: 13px; color: var(--light-text-muted); margin: 0;">Manage Paystub Generator Layouts, Watermarks & Country Rules</p>
            </div>
            <div>
                <button class="btn btn-sm" wire:click="addTemplate" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 8px; font-weight: 600; padding: 6px 14px;">
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
                            <th style="padding: 8px 12px;">Country</th>
                            <th style="padding: 8px 12px;">Type</th>
                            <th style="padding: 8px 12px;">Title</th>
                            <th style="padding: 8px 12px;">Preview</th>
                            <th style="padding: 8px 12px;">Watermark</th>
                            <th style="padding: 8px 12px;">Status</th>
                            <th class="text-end" style="padding: 8px 12px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($templateCollection as $key => $template)
                            <tr>
                                <td style="padding: 8px 12px; font-weight: 600; color: var(--light-text-muted);">{{ $key + 1 }}</td>
                                <td style="padding: 8px 12px;">
                                    <span class="badge" style="background: var(--brand-primary-light); color: var(--brand-primary); border: 1px solid var(--brand-primary-border); border-radius: 6px; padding: 3px 8px; font-size: 11px; text-transform: uppercase;">
                                        {{ $template->state }}
                                    </span>
                                </td>
                                <td style="padding: 8px 12px;">
                                    <span class="badge" style="background: var(--brand-emerald-light); color: var(--brand-emerald); border: 1px solid rgba(5,150,105,0.2); border-radius: 6px; padding: 3px 8px; font-size: 11px; text-transform: uppercase;">
                                        {{ $template->type }}
                                    </span>
                                </td>
                                <td style="padding: 8px 12px; font-weight: 600; color: var(--light-text-main);">{{ $template->name }}</td>
                                <td style="padding: 8px 12px;">
                                    @if (!empty($template->images->file))
                                        <a href="{{ asset($template->images->file) }}" target="_blank">
                                            <img width="50" height="36" class="rounded" style="object-fit: cover; border: 1px solid var(--light-border);" src="{{ asset($template->images->file) }}" />
                                        </a>
                                    @else
                                        <span class="text-muted" style="font-size: 11px;">No Image</span>
                                    @endif
                                </td>
                                <td style="padding: 8px 12px;">
                                    @if (!empty($template->images->thumbnail))
                                        <a href="{{ asset($template->images->thumbnail) }}" target="_blank">
                                            <img width="50" height="36" class="rounded" style="object-fit: cover; border: 1px solid var(--light-border);" src="{{ asset($template->images->thumbnail) }}" />
                                        </a>
                                    @else
                                        <span class="text-muted" style="font-size: 11px;">No Watermark</span>
                                    @endif
                                </td>
                                <td style="padding: 8px 12px;">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input"
                                            wire:click="changeStatus({{ $template->id }})" type="checkbox"
                                            role="switch" id="flexSwitchCheckChecked_{{ $key }}"
                                            {{ $template->status == 1 ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td class="text-end" style="padding: 8px 12px;">
                                    <button type="button" class="btn btn-sm btn-outline-secondary me-1" style="border-radius: 6px; padding: 3px 10px; font-size: 12px;"
                                        wire:click="editTemplate({{ $template->id }})">
                                        Edit
                                    </button>
                                    @if ($confirming === $template->id)
                                        <button wire:click="deleteTemplate({{ $template->id }})"
                                            class="btn btn-sm btn-danger" style="border-radius: 6px; padding: 3px 10px; font-size: 12px;">Sure?</button>
                                    @else
                                        <button wire:click="confirmDelete({{ $template->id }})"
                                            class="btn btn-sm btn-outline-danger" style="border-radius: 6px; padding: 3px 10px; font-size: 12px;">
                                            Delete
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-3">No templates found in database.</td>
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

                    <form wire:submit.prevent="StoreTemplate">
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
                            <label class="col-sm-3 col-form-label text-muted" style="font-size: 13px; font-weight: 600;">Form Type</label>
                            <div class="col-sm-9">
                                <select class="form-select form-select-sm" style="border-radius: 8px;" wire:model="type">
                                    <option value="">Select Form Type</option>
                                    <option value="basic">BASIC</option>
                                    <option value="advance">ADVANCE</option>
                                </select>
                                @error('type')
                                    <div class="mt-1 text-danger small">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label class="col-sm-3 col-form-label text-muted" style="font-size: 13px; font-weight: 600;">Template Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" style="border-radius: 8px;" id="title" wire:model="title" placeholder="e.g. Standard USA Paystub">
                                @error('title')
                                    <div class="mt-1 text-danger small">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label class="col-sm-3 col-form-label text-muted" style="font-size: 13px; font-weight: 600;">Main Preview</label>
                            <div class="col-sm-9">
                                <input class="form-control form-control-sm" style="border-radius: 8px;" wire:model="image" type="file" id="image">
                                @error('image')
                                    <div class="mt-1 text-danger small">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4 align-items-center">
                            <label class="col-sm-3 col-form-label text-muted" style="font-size: 13px; font-weight: 600;">Watermark Preview</label>
                            <div class="col-sm-9">
                                <input class="form-control form-control-sm" style="border-radius: 8px;" wire:model="watermark" type="file" id="watermark">
                                @if ($watermark)
                                    <img src="{{ $watermark->temporaryUrl() }}" width="60" class="mt-2 rounded">
                                @endif
                                @error('watermark')
                                    <div class="mt-1 text-danger small">* {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" wire:click="resetForm" class="btn btn-sm btn-outline-secondary" style="border-radius: 6px;">Reset</button>
                            <button type="submit" class="btn btn-sm btn-primary" style="background: var(--brand-primary); border: none; border-radius: 6px; font-weight: 600; padding: 6px 18px;">Save Template</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
