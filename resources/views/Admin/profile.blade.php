@extends('Admin.layouts.default')
@section('content')

@php
    $adminImg = $user->image ?? ($user->profile ?? asset('images/profile1.png'));
    if ($adminImg && !str_starts_with($adminImg, 'http') && !str_starts_with($adminImg, 'images/') && !str_starts_with($adminImg, 'uploads/')) {
        $adminImg = asset($adminImg);
    } elseif (str_starts_with($adminImg, 'uploads/')) {
        $adminImg = asset($adminImg);
    }
@endphp

<main id="main" class="main">
    <!-- Page Header Section -->
    <div class="page-header-wrapper mb-3.5" style="margin-bottom: 16px !important;">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 3px;">Admin Account Profile & User Attributes</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Comprehensive user profile configuration including identity credentials, regional passports, and security access.</p>
        </div>
        <div>
            <span class="badge-clean active" style="padding: 4px 10px; font-size: 11px;">
                <i class="bi bi-shield-check me-1"></i> Master Admin Vault
            </span>
        </div>
    </div>

    <!-- Main Profile Workspace Grid -->
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row g-3">
            <!-- Left Column: Avatar, Summary Card -->
            <div class="col-lg-4">
                <div class="apple-card text-center p-4 mb-3">
                    <div class="position-relative d-inline-block mb-3">
                        <img id="avatarPreview" src="{{ $adminImg }}" alt="Profile Avatar" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid var(--brand-primary-border); box-shadow: var(--shadow-card);">
                        
                        <label for="imageUploadInput" class="position-absolute bottom-0 end-0 p-1" style="background: var(--brand-primary); color: #fff; border-radius: 50%; width: 26px; height: 26px; display: flex; align-items: center; justify-content: center; cursor: pointer; border: 2px solid #ffffff;" title="Upload Avatar Picture">
                            <i class="bi bi-camera-fill" style="font-size: 11px;"></i>
                        </label>
                        <input type="file" name="image" id="imageUploadInput" class="d-none" accept="image/*" onchange="previewImage(this)">
                    </div>

                    <h3 style="font-size: 16px; font-weight: 700; color: var(--light-text-main); margin-bottom: 3px;">
                        {{ $user->name ?: ($user->first_name . ' ' . $user->last_name) }}
                    </h3>
                    <p class="text-muted mb-3" style="font-size: 12px;">{{ $user->email }}</p>

                    <div class="d-flex justify-content-center gap-1.5 mb-3">
                        <span class="badge" style="background: var(--brand-primary-light); color: var(--brand-primary); border: 1px solid var(--brand-primary-border); font-size: 9.5px; font-weight: 700; padding: 3px 10px; border-radius: 99px;">
                            👑 SUPER ADMIN
                        </span>
                        <span class="badge" style="background: var(--brand-emerald-light); color: var(--brand-emerald); border: 1px solid rgba(5, 150, 105, 0.2); font-size: 9.5px; font-weight: 700; padding: 3px 10px; border-radius: 99px;">
                            {{ strtoupper($user->subscription_type ?? 'PREMIUM PRO') }}
                        </span>
                    </div>

                    <!-- User Table Attribute Summary -->
                    <div class="p-3 text-start mb-0" style="background: var(--light-bg-subtle); border-radius: 8px; border: 1px solid var(--light-border-subtle);">
                        <div class="d-flex justify-content-between mb-2" style="font-size: 12px;">
                            <span class="text-muted">User ID:</span>
                            <span class="font-weight-bold" style="color: var(--light-text-main);">#USR-{{ $user->id }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2" style="font-size: 12px;">
                            <span class="text-muted">Username:</span>
                            <span class="font-weight-bold" style="color: var(--brand-primary);">{{ $user->username ?? 'admin' }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2" style="font-size: 12px;">
                            <span class="text-muted">Device Access:</span>
                            <span class="font-weight-bold" style="color: var(--light-text-main);">{{ ucfirst($user->device_type ?? 'Web Workstation') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2" style="font-size: 12px;">
                            <span class="text-muted">Registered On:</span>
                            <span class="font-weight-bold" style="color: var(--light-text-main);">{{ date('d M Y', strtotime($user->created_at ?? 'now')) }}</span>
                        </div>
                        <div class="d-flex justify-content-between" style="font-size: 12px;">
                            <span class="text-muted">Onboarding:</span>
                            <span class="badge-clean {{ ($user->is_completed ?? 1) == 1 ? 'active' : 'pending' }}" style="font-size: 10.5px; padding: 2px 8px;">
                                {{ ($user->is_completed ?? 1) == 1 ? '100% Completed' : 'Pending' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Regional Passport Quick Status Card -->
                <div class="apple-card p-3.5">
                    <h5 class="mb-2.5" style="font-size: 13.5px; font-weight: 700; color: var(--light-text-main);">Regional Passports & Licenses</h5>
                    <div class="d-flex flex-column gap-2" style="font-size: 12px;">
                        <div class="d-flex justify-content-between align-items-center p-2.5" style="background: #f8fafc; border-radius: 6px;">
                            <span>🇺🇸 USA Payroll Engine:</span>
                            <span class="badge bg-light text-dark font-weight-bold" style="font-size: 11px; padding: 4px 8px;">{{ $user->usa_expiry_date ?? 'Lifetime' }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2.5" style="background: #f8fafc; border-radius: 6px;">
                            <span>🇬🇧 UK HMRC Engine:</span>
                            <span class="badge bg-light text-dark font-weight-bold" style="font-size: 11px; padding: 4px 8px;">{{ $user->uk_expiry_date ?? 'Lifetime' }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center p-2.5" style="background: #f8fafc; border-radius: 6px;">
                            <span>🇨🇦 Canada CRA Engine:</span>
                            <span class="badge bg-light text-dark font-weight-bold" style="font-size: 11px; padding: 4px 8px;">{{ $user->canada_expiry_date ?? 'Lifetime' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Form Cards -->
            <div class="col-lg-8">
                
                <!-- Card 1: Personal & Contact Information -->
                <div class="apple-card mb-3">
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                        <div class="card-icon-pill indigo mb-0" style="width: 28px; height: 28px; font-size: 14px;">
                            <i class="bi bi-person-lines-fill"></i>
                        </div>
                        <div>
                            <h4 class="mb-0" style="font-size: 14.5px; font-weight: 700; color: var(--light-text-main);">Personal Identity & Contact Info</h4>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">System Username</label>
                            <input type="text" name="username" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" value="{{ old('username', $user->username ?? 'admin') }}" placeholder="admin_user">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">First Name *</label>
                            <input type="text" name="first_name" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" value="{{ old('first_name', $user->first_name) }}" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Last Name</label>
                            <input type="text" name="last_name" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" value="{{ old('last_name', $user->last_name) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Account Email Address *</label>
                            <input type="email" name="email" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Country Code</label>
                            <input type="text" name="country_code" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" placeholder="+1" value="{{ old('country_code', $user->country_code ?? '+1') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Mobile Phone Number</label>
                            <input type="text" name="mobile" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" placeholder="555-0199" value="{{ old('mobile', $user->mobile) }}">
                        </div>
                    </div>
                </div>

                <!-- Card 2: Platform Role & Subscription Attributes -->
                <div class="apple-card mb-3">
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                        <div class="card-icon-pill emerald mb-0" style="width: 28px; height: 28px; font-size: 14px;">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <div>
                            <h4 class="mb-0" style="font-size: 14.5px; font-weight: 700; color: var(--light-text-main);">Subscription Tier & Device Telemetry</h4>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Subscription Tier</label>
                            <select name="subscription_type" class="form-select form-select-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;">
                                <option value="free" {{ ($user->subscription_type ?? '') == 'free' ? 'selected' : '' }}>Free Tier</option>
                                <option value="pro" {{ ($user->subscription_type ?? '') == 'pro' ? 'selected' : '' }}>Pro Monthly</option>
                                <option value="enterprise" {{ ($user->subscription_type ?? 'enterprise') == 'enterprise' ? 'selected' : '' }}>Enterprise Unlimited</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Device Type</label>
                            <input type="text" name="device_type" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" placeholder="web / ios / android" value="{{ old('device_type', $user->device_type ?? 'web') }}">
                        </div>

                        <div class="col-md-4 align-self-end">
                            <div class="form-check form-switch p-2" style="background: var(--light-bg-subtle); border-radius: 6px; border: 1px solid var(--light-border);">
                                <input class="form-check-input ms-0 me-2" type="checkbox" name="is_completed" id="isCompletedSwitch" value="1" {{ ($user->is_completed ?? 1) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label font-weight-bold" for="isCompletedSwitch" style="font-size: 12px;">Account Completed</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Regional Access Expiry Passports -->
                <div class="apple-card mb-3">
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                        <div class="card-icon-pill amber mb-0" style="width: 28px; height: 28px; font-size: 14px;">
                            <i class="bi bi-globe-americas"></i>
                        </div>
                        <div>
                            <h4 class="mb-0" style="font-size: 14.5px; font-weight: 700; color: var(--light-text-main);">Regional Access Expiry Passports</h4>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">🇺🇸 USA Expiry</label>
                            <input type="date" name="usa_expiry_date" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" value="{{ old('usa_expiry_date', $user->usa_expiry_date) }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">🇬🇧 UK Expiry</label>
                            <input type="date" name="uk_expiry_date" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" value="{{ old('uk_expiry_date', $user->uk_expiry_date) }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">🇨🇦 Canada Expiry</label>
                            <input type="date" name="canada_expiry_date" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" value="{{ old('canada_expiry_date', $user->canada_expiry_date) }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">General Expiry</label>
                            <input type="date" name="expiryDate" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" value="{{ old('expiryDate', $user->expiryDate) }}">
                        </div>
                    </div>
                </div>

                <!-- Card 4: Change Security Password -->
                <div class="apple-card mb-3">
                    <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                        <div class="card-icon-pill rose mb-0" style="width: 28px; height: 28px; font-size: 14px;">
                            <i class="bi bi-key-fill"></i>
                        </div>
                        <div>
                            <h4 class="mb-0" style="font-size: 14.5px; font-weight: 700; color: var(--light-text-main);">Change Security Password</h4>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Current Password</label>
                            <input type="password" name="old_password" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" placeholder="••••••••">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">New Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" placeholder="••••••••">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label text-muted mb-1" style="font-size: 12px; font-weight: 600;">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control form-control-sm" style="border-radius: 6px; font-size: 12px; padding: 5px 10px;" placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-sm" style="background: var(--brand-primary); color: #fff; border: none; border-radius: 6px; font-weight: 600; padding: 8px 28px; font-size: 12.5px;">
                        <i class="bi bi-check-lg me-1"></i> Save Admin Profile & Attributes
                    </button>
                </div>
            </div>
        </div>

    </form>
</main>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatarPreview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
