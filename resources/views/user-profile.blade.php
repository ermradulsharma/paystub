@extends('layouts.app')
@section('content')
<style>
    /* PaystubX Apple/Stripe Ultra-High Density Minimalist Premium Profile Theme */
    body {
        background-color: #f8fafc;
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .user-profile-section {
        padding: 30px 0 80px;
        background-color: #f8fafc;
        min-height: calc(100vh - 120px);
    }

    /* Hero Banner Header */
    .profile-hero-banner {
        background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #312e81 100%);
        border-radius: 24px;
        padding: 36px 40px;
        color: #ffffff;
        margin-bottom: 32px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.3);
    }

    .profile-hero-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.25) 0%, rgba(255, 255, 255, 0) 70%);
        pointer-events: none;
    }

    .avatar-circle-wrapper {
        width: 80px;
        height: 80px;
        border-radius: 24px;
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 800;
        color: #ffffff;
        box-shadow: 0 10px 25px -5px rgba(99, 102, 241, 0.5);
        border: 3px solid rgba(255, 255, 255, 0.2);
        flex-shrink: 0;
    }

    .hero-user-title {
        font-size: 1.65rem;
        font-weight: 800;
        letter-spacing: -0.5px;
        margin-bottom: 4px;
        color: #ffffff;
    }

    .hero-user-email {
        color: #cbd5e1;
        font-size: 0.925rem;
        margin-bottom: 0;
    }

    .verified-pill {
        display: inline-flex;
        align-items: center;
        background: rgba(16, 185, 129, 0.15);
        border: 1px solid rgba(16, 185, 129, 0.3);
        color: #34d399;
        font-size: 0.75rem;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 20px;
        margin-left: 12px;
    }

    /* Sidebar Nav Card */
    .profile-nav-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 18px;
        box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.04);
        position: sticky;
        top: 90px;
    }

    .profile-nav-card .nav-link {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        border-radius: 16px;
        color: #475569;
        font-weight: 700;
        font-size: 0.95rem;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        margin-bottom: 8px;
        background: transparent;
    }

    .profile-nav-card .nav-link:hover {
        background-color: #f8fafc;
        color: #4f46e5;
        transform: translateX(4px);
    }

    .profile-nav-card .nav-link.active {
        background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
        color: #ffffff !important;
        box-shadow: 0 8px 20px -4px rgba(79, 70, 229, 0.4);
    }

    .profile-nav-card .nav-link i {
        font-size: 1.15rem;
        margin-right: 14px;
        width: 22px;
        text-align: center;
    }

    /* Content Cards */
    .apple-profile-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        padding: 36px;
        box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.04);
        margin-bottom: 28px;
        transition: all 0.25s ease;
    }

    .apple-profile-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 15px 35px -5px rgba(15, 23, 42, 0.06);
    }

    .profile-card-header {
        margin-bottom: 28px;
        padding-bottom: 18px;
        border-bottom: 1px solid #f1f5f9;
    }

    .profile-card-title {
        color: #0f172a;
        font-weight: 800;
        font-size: 1.35rem;
        letter-spacing: -0.4px;
        margin-bottom: 4px;
    }

    .profile-card-subtitle {
        color: #64748b;
        font-size: 0.9rem;
        margin-bottom: 0;
    }

    /* Info Row Box */
    .profile-info-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 22px;
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        margin-bottom: 16px;
        transition: all 0.25s ease;
    }

    .profile-info-row:hover {
        border-color: #818cf8;
        background-color: #ffffff;
        box-shadow: 0 8px 20px -4px rgba(79, 70, 229, 0.08);
        transform: translateY(-2px);
    }

    .info-left-group {
        display: flex;
        align-items: center;
    }

    .info-icon-wrapper {
        width: 48px;
        height: 48px;
        border-radius: 16px;
        background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%);
        color: #4f46e5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin-right: 18px;
        flex-shrink: 0;
        box-shadow: inset 0 2px 4px rgba(255, 255, 255, 0.8);
    }

    .info-label {
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: #64748b;
        margin-bottom: 3px;
    }

    .info-value {
        font-size: 1rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 0;
    }

    .edit-action-btn {
        width: 40px;
        height: 40px;
        border-radius: 14px;
        background: #ffffff;
        border: 1px solid #cbd5e1;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #475569;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 2px 6px rgba(15, 23, 42, 0.04);
    }

    .edit-action-btn:hover {
        background: #4f46e5;
        border-color: #4f46e5;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(79, 70, 229, 0.3);
    }

    /* Danger Zone Card */
    .danger-zone-card {
        background: linear-gradient(135deg, #fff5f5 0%, #fef2f2 100%);
        border: 1px solid #fecaca;
        border-radius: 18px;
        padding: 22px 26px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 24px;
    }

    .danger-zone-title {
        color: #991b1b;
        font-weight: 800;
        font-size: 1rem;
        margin-bottom: 2px;
    }

    .danger-zone-desc {
        color: #b91c1c;
        font-size: 0.85rem;
        margin-bottom: 0;
    }

    /* Subscriptions Card */
    .member-pln-inner {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 24px;
        margin-bottom: 18px;
        box-shadow: 0 4px 14px rgba(15, 23, 42, 0.03);
        transition: all 0.25s ease;
    }

    .member-pln-inner:hover {
        border-color: #cbd5e1;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
    }

    .status-badge-active {
        background-color: #d1fae5;
        color: #065f46;
        font-size: 0.775rem;
        font-weight: 800;
        padding: 6px 14px;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-badge-expired {
        background-color: #fee2e2;
        color: #991b1b;
        font-size: 0.775rem;
        font-weight: 800;
        padding: 6px 14px;
        border-radius: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .renewBtn {
        display: inline-block;
        background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%);
        color: #ffffff !important;
        font-weight: 700;
        font-size: 0.85rem;
        border-radius: 12px;
        border: none;
        padding: 10px 22px;
        text-decoration: none !important;
        box-shadow: 0 4px 14px rgba(79, 70, 229, 0.3);
        transition: all 0.25s ease;
    }

    .renewBtn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(79, 70, 229, 0.45);
    }

    /* Address Book Sub Tabs */
    .address-tab-pills {
        background: #f1f5f9;
        padding: 6px;
        border-radius: 16px;
        display: inline-flex;
        border: 1px solid #e2e8f0;
    }

    .address-tab-pills .nav-link {
        border-radius: 12px;
        font-weight: 800;
        font-size: 0.875rem;
        padding: 10px 24px;
        color: #64748b;
        border: none;
        transition: all 0.25s ease;
    }

    .address-tab-pills .nav-link.active {
        background: #ffffff;
        color: #4f46e5 !important;
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.08);
    }

    /* Modern Add Address Button */
    .add-address-action-btn {
        background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%);
        color: #ffffff;
        font-weight: 800;
        font-size: 0.9rem;
        border: none;
        border-radius: 14px;
        padding: 12px 24px;
        box-shadow: 0 6px 18px rgba(79, 70, 229, 0.3);
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
    }

    .add-address-action-btn:hover {
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(79, 70, 229, 0.45);
    }

    /* Modern Table Styling */
    .custom-profile-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }

    .custom-profile-table thead th {
        background-color: #f8fafc;
        color: #475569;
        font-weight: 800;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        padding: 16px 20px;
        border-bottom: 1px solid #e2e8f0;
    }

    .custom-profile-table tbody td {
        padding: 16px 20px;
        font-size: 0.9rem;
        color: #0f172a;
        border-bottom: 1px solid #f1f5f9;
        background-color: #ffffff;
        vertical-align: middle;
        font-weight: 500;
    }

    .custom-profile-table tbody tr:last-child td {
        border-bottom: none;
    }

    .custom-profile-table tbody tr:hover td {
        background-color: #f8fafc;
    }

    /* Modal Backdrop Depth */
    .modal {
        z-index: 1055 !important;
    }
    .modal-backdrop {
        z-index: 1050 !important;
    }
    .pac-container {
        z-index: 1060 !important;
    }
</style>

<section class="user-profile-section">
    <div class="container">
        <!-- Hero User Profile Header Banner -->
        <div class="profile-hero-banner">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                    <div class="avatar-circle-wrapper">
                        {{ strtoupper(substr($userObj->name ?? $userObj->email ?? 'U', 0, 1)) }}
                    </div>
                    <div class="ml-4">
                        <div class="d-flex align-items-center">
                            <h2 class="hero-user-title">{{ $userObj->name ?? 'User Profile' }}</h2>
                            <span class="verified-pill"><i class="fa fa-check-circle mr-1"></i> Verified</span>
                        </div>
                        <p class="hero-user-email"><i class="fa fa-envelope-o mr-1"></i> {{ $userObj->email ?? '' }}</p>
                    </div>
                </div>
                <div>
                    <span class="badge badge-light py-2 px-3" style="border-radius: 12px; font-size: 0.85rem; font-weight: 700; color: #312e81; background: rgba(255, 255, 255, 0.9);">
                        <i class="fa fa-shield mr-1"></i> PaystubX Secured Account
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Navigation Sidebar -->
            <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
                <div class="profile-nav-card">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link my-account {{ Request::get('tab') != 2 ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fa fa-user-circle"></i> {{ __('My Account') }}
                        </a>
                        <a class="nav-link address-book {{ Request::get('tab') == 2 ? 'active' : '' }}" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="fa fa-address-book"></i> {{ __('Address Book') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Main Content Area -->
            <div class="col-lg-9 col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- My Account Tab Pane -->
                    <div class="tab-pane fade {{ Request::get('tab') != 2 ? 'show active' : '' }}" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="row">
                            <!-- User Profile Info Column -->
                            <div class="col-lg-7 mb-4 mb-lg-0">
                                <div class="apple-profile-card">
                                    <div class="profile-card-header">
                                        <h4 class="profile-card-title">{{ __('Account Credentials') }}</h4>
                                        <p class="profile-card-subtitle">{{ __('Manage your personal contact details and security preferences.') }}</p>
                                    </div>

                                    <!-- Contact Name -->
                                    <div class="profile-info-row">
                                        <div class="info-left-group">
                                            <div class="info-icon-wrapper">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <div>
                                                <div class="info-label">{{ __('Contact Name') }}</div>
                                                <div class="info-value">{{ $userObj->name ?? 'Not set' }}</div>
                                            </div>
                                        </div>
                                        <div class="edit-action-btn username" data-name="{{ $userObj->name ?? '' }}" title="Edit Name">
                                            <i class="fa fa-pencil" style="font-size: 0.9rem;"></i>
                                        </div>
                                    </div>

                                    <!-- Email Address -->
                                    <div class="profile-info-row">
                                        <div class="info-left-group">
                                            <div class="info-icon-wrapper">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <div>
                                                <div class="info-label">{{ __('Email Address') }}</div>
                                                <div class="info-value" id="email">{{ $userObj->email ?? '' }}</div>
                                            </div>
                                        </div>
                                        <div class="edit-action-btn changeUserEmail" data-email="{{ $userObj->email ?? '' }}" title="Change Email">
                                            <i class="fa fa-pencil" style="font-size: 0.9rem;"></i>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="profile-info-row">
                                        <div class="info-left-group">
                                            <div class="info-icon-wrapper">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                            <div>
                                                <div class="info-label">{{ __('Password') }}</div>
                                                <div class="info-value">••••••••••••</div>
                                            </div>
                                        </div>
                                        <div class="edit-action-btn username3" title="Change Password">
                                            <i class="fa fa-pencil" style="font-size: 0.9rem;"></i>
                                        </div>
                                    </div>

                                    <!-- Danger Zone: Account Deletion -->
                                    <div class="danger-zone-card">
                                        <div>
                                            <div class="danger-zone-title">{{ __('Delete Account') }}</div>
                                            <div class="danger-zone-desc">{{ __('Permanently erase profile credentials and database records.') }}</div>
                                        </div>
                                        <button class="btn btn-sm btn-danger font-weight-bold py-2.5 px-3.5 trash-account" data-route="{{ route('delete.account') }}" style="border-radius: 12px; background-color: #dc2626; border: none; font-size: 0.825rem;">
                                            <i class="fa fa-trash mr-1"></i> {{ __('Delete') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Subscriptions Column -->
                            <div class="col-lg-5">
                                <div class="apple-profile-card">
                                    <div class="profile-card-header">
                                        <h4 class="profile-card-title">{{ __('Subscription Membership') }}</h4>
                                        <p class="profile-card-subtitle">{{ __('Active plan benefits and renewal options.') }}</p>
                                    </div>

                                    @if (!empty($subcriptionData) && count($subcriptionData) > 0)
                                        @foreach ($subcriptionData as $subcription)
                                            <div class="member-pln-inner">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <h6 class="font-weight-bold text-dark mb-0" style="font-size: 1rem;">
                                                        {{ $subcription->plan->name ?? 'Premium Plan' }}
                                                    </h6>
                                                    <span class="badge badge-indigo" style="font-size: 0.725rem; text-transform: uppercase; background: #e0e7ff; color: #4f46e5; font-weight: 800; padding: 5px 10px; border-radius: 10px;">{{ $subcription->country }}</span>
                                                </div>

                                                @if ($subcription->expiry_date > \Carbon\Carbon::now())
                                                    <div class="d-flex align-items-center justify-content-between mt-3">
                                                        <span class="status-badge-active"><i class="fa fa-check-circle mr-1"></i> Active</span>
                                                        <span class="text-muted font-weight-semibold" style="font-size: 0.825rem;">Expires {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subcription->expiry_date)->format('m/d/Y') }}</span>
                                                    </div>
                                                @else
                                                    <div class="d-flex align-items-center justify-content-between mt-3">
                                                        <span class="status-badge-expired"><i class="fa fa-exclamation-circle mr-1"></i> Expired</span>
                                                        <a class="renewBtn" href="{{ route('prizing', ['id' => $subcription->id]) }}">{{ __('RENEW NOW') }}</a>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-center py-4">
                                            <div class="mb-3 text-muted" style="font-size: 3rem; color: #94a3b8 !important;"><i class="fa fa-id-card-o"></i></div>
                                            <h6 class="font-weight-bold text-dark" style="font-size: 1.05rem;">{{ __('No Active Subscription') }}</h6>
                                            <p class="text-muted mb-3" style="font-size: 0.85rem;">Subscribe to a plan to unlock unlimited watermarked paystub generation.</p>
                                            <a href="{{ route('prizing') }}" class="renewBtn">{{ __('Explore Plans') }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address Book Tab Pane -->
                    <div class="tab-pane fade {{ Request::get('tab') == 2 ? 'show active' : '' }}" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="apple-profile-card">
                            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between mb-4 pb-3 border-bottom">
                                <div>
                                    <h4 class="profile-card-title mb-1">{{ __('Saved Address Book') }}</h4>
                                    <p class="profile-card-subtitle mb-0">{{ __('Manage saved employer and employee addresses for fast paystub population.') }}</p>
                                </div>

                                <div class="mt-3 mt-sm-0">
                                    <button class="add-address-action-btn addressBook" id="addNewAddress" data-emptype="{{ Request::get('emp') == 2 ? 'employee' : 'employer' }}">
                                        <i class="fa fa-plus mr-2"></i> Add New Address
                                    </button>
                                    <div class="d-none" id="addNewAddress2" data-emptype="{{ Request::get('emp') == 2 ? 'employee' : 'employer' }}"></div>
                                </div>
                            </div>

                            <!-- Address Sub-Tabs -->
                            <div class="mb-4">
                                <div class="address-tab-pills nav nav-pills" id="pills-tab" role="tablist">
                                    <a class="nav-link address-b {{ Request::get('emp') != 2 ? 'active' : '' }}" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                        <i class="fa fa-building mr-1.5"></i> EMPLOYER
                                    </a>
                                    <a class="nav-link address-b {{ Request::get('emp') == 2 ? 'active' : '' }}" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                        <i class="fa fa-users mr-1.5"></i> EMPLOYEE
                                    </a>
                                </div>
                            </div>

                            <!-- Address Tables Tab Content -->
                            <div class="tab-content" id="pills-tabContent">
                                <div class="address-tab tab-pane fade {{ Request::get('emp') != 2 ? 'show active' : '' }}" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div id="employerTab" class="table-responsive">
                                        <table class="table custom-profile-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Employer (Company) Name</th>
                                                    <th scope="col">Street Address 1</th>
                                                    <th scope="col">Street Address 2</th>
                                                    <th scope="col">City</th>
                                                    <th scope="col">State</th>
                                                    <th scope="col">Zip Code</th>
                                                    <th scope="col">Telephone</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="address-tab tab-pane fade {{ Request::get('emp') == 2 ? ' show active' : '' }}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div id="employeeTab" class="table-responsive">
                                        <table class="table custom-profile-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Employee Name</th>
                                                    <th scope="col">Street Address 1</th>
                                                    <th scope="col">Street Address 2</th>
                                                    <th scope="col">City</th>
                                                    <th scope="col">State</th>
                                                    <th scope="col">Zip Code</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ultra-Premium Redesigned Address Book Modal -->
<div class="modal fade" id="addressBook" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 540px;">
        <div class="modal-content overflow-hidden border-0 shadow-lg" style="border-radius: 24px; box-shadow: 0 20px 50px -10px rgba(15, 23, 42, 0.25);">
            <!-- Modal Header -->
            <div class="modal-header border-0 px-4 py-3" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo" style="height: 24px; width: auto;">
                    </div>
                    <button type="button" class="close text-white opacity-75 hover-opacity-100" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 1.6rem; outline: none; background: transparent; border: 0; text-shadow: none; line-height: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4" style="background-color: #ffffff;">
                <div class="text-center mb-3">
                    <h4 class="font-weight-bold text-dark mb-1" style="color: #0f172a; font-size: 1.25rem; letter-spacing: -0.3px;">{{ __('Address Book Entry') }}</h4>
                    <p class="text-muted mb-0" style="font-size: 0.825rem; color: #64748b;">{{ __('Enter complete location details to save to your reusable address book') }}</p>
                </div>

                <form id="addressForm" action="{{ route('store.address') }}" method="post">
                    @csrf
                    <input type="hidden" id="adress-type" name="type" value="employer">
                    <input type="hidden" id="addressId" name="addressId">

                    <!-- Full Name Field -->
                    <div class="form-group mb-2.5 text-left">
                        <label for="inputFullName" id="nameLabel" class="font-weight-semibold mb-1" style="font-size: 0.75rem; color: #475569; font-weight: 800; text-transform: uppercase; letter-spacing: 0.4px;">EMPLOYER (COMPANY) NAME *</label>
                        <input type="text" class="form-control px-3 shadow-none" id="inputFullName" name="fullName" placeholder="Full Employer (Company) Name" required style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.875rem; color: #0f172a; background-color: #f8fafc; height: 44px; transition: all 0.2s ease;">
                    </div>

                    <!-- Street Address 1 -->
                    <div class="form-group mb-2.5 text-left">
                        <label for="inputAddressLine1" class="font-weight-semibold mb-1" style="font-size: 0.75rem; color: #475569; font-weight: 800; text-transform: uppercase; letter-spacing: 0.4px;">STREET ADDRESS 1 *</label>
                        <input type="text" class="form-control px-3 shadow-none" id="inputAddressLine1" name="addressLine1" placeholder="Street Address 1" required style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.875rem; color: #0f172a; background-color: #f8fafc; height: 44px; transition: all 0.2s ease;">
                    </div>

                    <!-- Street Address 2 -->
                    <div class="form-group mb-2.5 text-left">
                        <label for="inputAddressLine2" class="font-weight-semibold mb-1" style="font-size: 0.75rem; color: #475569; font-weight: 800; text-transform: uppercase; letter-spacing: 0.4px;">STREET ADDRESS 2</label>
                        <input type="text" class="form-control px-3 shadow-none" id="inputAddressLine2" name="addressLine2" placeholder="Street Address 2 (Optional)" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.875rem; color: #0f172a; background-color: #f8fafc; height: 44px; transition: all 0.2s ease;">
                    </div>

                    <!-- City & State Row -->
                    <div class="row">
                        <div class="col-sm-6 form-group mb-2.5 text-left">
                            <label for="inputCityTown" class="font-weight-semibold mb-1" style="font-size: 0.75rem; color: #475569; font-weight: 800; text-transform: uppercase; letter-spacing: 0.4px;">City</label>
                            <input type="text" class="form-control px-3 shadow-none" id="inputCityTown" name="cityName" placeholder="City" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.875rem; color: #0f172a; background-color: #f8fafc; height: 44px; transition: all 0.2s ease;">
                        </div>
                        <div class="col-sm-6 form-group mb-2.5 text-left">
                            <label for="selectState" class="font-weight-semibold mb-1" style="font-size: 0.75rem; color: #475569; font-weight: 800; text-transform: uppercase; letter-spacing: 0.4px;">State</label>
                            <select class="form-control px-3 shadow-none" id="selectState" name="stateName" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.875rem; color: #0f172a; background-color: #f8fafc; height: 44px; padding-top: 6px; padding-bottom: 6px;">
                                <option value="" selected="selected">Select State</option>
                                @if (count($stateList) > 0)
                                    @foreach ($stateList as $state)
                                        <option value="{{ $state->state_code }}">{{ $state->state }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <!-- Zip Code & Telephone / SSN Row -->
                    <div class="row">
                        <div class="col-sm-6 form-group mb-2.5 text-left">
                            <label for="inputZipPostalCode" class="font-weight-semibold mb-1" style="font-size: 0.75rem; color: #475569; font-weight: 800; text-transform: uppercase; letter-spacing: 0.4px;">Zip Code</label>
                            <input type="text" minlength="4" maxlength="6" class="form-control px-3 shadow-none" id="inputZipPostalCode" name="zipCode" placeholder="Zip Code" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.875rem; color: #0f172a; background-color: #f8fafc; height: 44px; transition: all 0.2s ease;">
                        </div>
                        <div class="col-sm-6 form-group mb-2.5 text-left">
                            <label for="tel" id="tel-phone-title" class="font-weight-semibold mb-1" style="font-size: 0.75rem; color: #475569; font-weight: 800; text-transform: uppercase; letter-spacing: 0.4px;">Employer Telephone</label>
                            <input type="text" id="tel" name="tel" placeholder="123-456-7890 (optional)" maxlength="10" minlength="10" class="form-control px-3 shadow-none" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.875rem; color: #0f172a; background-color: #f8fafc; height: 44px; transition: all 0.2s ease;">
                        </div>
                    </div>

                    <!-- Employee Specific Fields (Dynamic d-none) -->
                    <div class="form-group mb-2.5 text-left d-none">
                        <label for="emp_id" id="emp_id_title" class="font-weight-semibold mb-1" style="font-size: 0.75rem; color: #475569; font-weight: 800; text-transform: uppercase; letter-spacing: 0.4px;">EMPLOYEE ID</label>
                        <input type="text" id="emp_id" name="emp_id" placeholder="12345" maxlength="5" minlength="5" class="form-control px-3 shadow-none" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.875rem; color: #0f172a; background-color: #f8fafc; height: 44px;">
                    </div>

                    <div class="form-group mb-3 text-left d-none">
                        <label for="emp_ssn" id="emp_ssn_title" class="font-weight-semibold mb-1" style="font-size: 0.75rem; color: #475569; font-weight: 800; text-transform: uppercase; letter-spacing: 0.4px;">EMPLOYEE SSN Last 4</label>
                        <input type="text" id="emp_ssn" name="emp_ssn" placeholder="1234" maxlength="4" minlength="4" class="form-control px-3 shadow-none" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.875rem; color: #0f172a; background-color: #f8fafc; height: 44px;">
                    </div>

                    <!-- Action Footer Buttons -->
                    <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-3">
                        <button type="button" class="btn btn-light py-2 px-4 font-weight-semibold" data-dismiss="modal" data-bs-dismiss="modal" style="border-radius: 12px; border: 1px solid #cbd5e1; font-size: 0.85rem; color: #475569; background-color: #f8fafc; height: 42px;">
                            {{ __('Cancel') }}
                        </button>
                        <button type="button" id="store-address" class="btn text-white font-weight-bold py-2 px-4 shadow-sm" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border: none; border-radius: 12px; font-size: 0.85rem; height: 42px; letter-spacing: 0.2px;">
                            <i class="fa fa-check mr-1.5"></i> {{ __('Save Address') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Redesigned Contact Name Modal -->
<div class="modal fade" id="userName" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
        <div class="modal-content overflow-hidden border-0 shadow-lg" style="border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);">
            <div class="modal-header border-0 px-4 pt-4 pb-3" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo" style="height: 26px; width: auto;">
                    <button type="button" class="close text-white opacity-75 hover-opacity-100" data-dismiss="modal" data-bs-dismiss="modal" style="font-size: 1.75rem; outline: none; background: transparent; border: 0; line-height: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body p-4 p-sm-5" style="background-color: #ffffff;">
                <div class="text-center mb-4">
                    <h4 class="font-weight-bold text-dark mb-1" style="color: #0f172a; font-size: 1.35rem;">{{ __('Change Contact Name') }}</h4>
                    <p class="text-muted mb-0" style="font-size: 0.875rem; color: #64748b;">{{ __('Update your public account profile name') }}</p>
                </div>

                <form id="userNameForm1" method="post" action="{{ route('store.details') }}">
                    @csrf
                    <input type="hidden" value="user-name" name="type">
                    <div class="form-group mb-4 text-left">
                        <label for="user-name" class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 700;">Contact Name <span class="text-danger">*</span></label>
                        <input type="text" name="uname" id="user-name" class="form-control py-3 px-3 shadow-none" placeholder="Contact Name" required autocomplete="name" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc;">
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2">
                        <button type="button" class="btn btn-light py-2.5 px-4 font-weight-semibold" data-dismiss="modal" data-bs-dismiss="modal" style="border-radius: 12px; border: 1px solid #cbd5e1; font-size: 0.875rem;">Cancel</button>
                        <button type="button" id="store-name" class="btn text-white font-weight-bold py-2.5 px-4 shadow-sm" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border: none; border-radius: 12px; font-size: 0.875rem;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Redesigned Email Change Modal -->
<div class="modal fade" id="changeUserEmailModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
        <div class="modal-content overflow-hidden border-0 shadow-lg" style="border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);">
            <div class="modal-header border-0 px-4 pt-4 pb-3" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo" style="height: 26px; width: auto;">
                    <button type="button" class="close text-white opacity-75 hover-opacity-100" data-dismiss="modal" data-bs-dismiss="modal" style="font-size: 1.75rem; outline: none; background: transparent; border: 0; line-height: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body p-4 p-sm-5" style="background-color: #ffffff;">
                <div class="text-center mb-4">
                    <h4 class="font-weight-bold text-dark mb-1" style="color: #0f172a; font-size: 1.35rem;">{{ __('Change Email Address') }}</h4>
                    <p class="text-muted mb-0" style="font-size: 0.875rem; color: #64748b;">{{ __('Enter your password to authorize updating your email') }}</p>
                <form id="changeUserEmail" method="post" action="">
                    @csrf
                    <input type="hidden" value="user-email" name="type">
                    <input type="text" name="username" value="{{ $userObj->email ?? '' }}" autocomplete="username" class="d-none" aria-hidden="true">
                    <div class="form-group mb-3 text-left position-relative">
                        <label class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 700;">Password <span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="password" class="form-control py-3 px-3 shadow-none show-password" placeholder="Current Password" name="password" required autocomplete="current-password" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc; padding-right: 42px;">
                            <i id="eye-icon_00" toggle="#password-field" class="fa fa-eye-slash eye-icon show-password position-absolute" data-id="02" style="right: 14px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #94a3b8;"></i>
                        </div>
                    </div>
                    <div class="form-group mb-4 text-left">
                        <label class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 700;">New Email Address <span class="text-danger">*</span></label>
                        <input type="email" id="user-email" class="form-control py-3 px-3 shadow-none" placeholder="New Email Address" name="email" required autocomplete="email" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc;">
                    </div>
                    <div class="d-flex align-items-center justify-content-between pt-2">
                        <button type="button" class="btn btn-light py-2.5 px-4 font-weight-semibold" data-dismiss="modal" data-bs-dismiss="modal" style="border-radius: 12px; border: 1px solid #cbd5e1; font-size: 0.875rem;">Cancel</button>
                        <button type="submit" class="btn text-white font-weight-bold py-2.5 px-4 shadow-sm" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border: none; border-radius: 12px; font-size: 0.875rem;">Save Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Redesigned Change Password Modal -->
<div class="modal fade" id="userName3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
        <div class="modal-content overflow-hidden border-0 shadow-lg" style="border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);">
            <div class="modal-header border-0 px-4 pt-4 pb-3" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo" style="height: 26px; width: auto;">
                    <button type="button" class="close text-white opacity-75 hover-opacity-100" data-dismiss="modal" data-bs-dismiss="modal" style="font-size: 1.75rem; outline: none; background: transparent; border: 0; line-height: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body p-4 p-sm-5" style="background-color: #ffffff;">
                <div class="text-center mb-4">
                    <h4 class="font-weight-bold text-dark mb-1" style="color: #0f172a; font-size: 1.35rem;">{{ __('Change Password') }}</h4>
                    <p class="text-muted mb-0" style="font-size: 0.85rem; color: #64748b;">{{ __('Set a strong, new password for your account') }}</p>
                </div>

                <form id="passwordUpdate" method="post" action="{{ route('store.details') }}">
                    @csrf
                    <input type="hidden" value="user-password" name="type">
                    <input type="text" name="username" value="{{ $userObj->email ?? '' }}" autocomplete="username" class="d-none" aria-hidden="true">

                    <div class="form-group mb-3 text-left position-relative">
                        <label class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 700;">Current Password <span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="password" class="form-control py-3 px-3 shadow-none show-password" placeholder="Current Password" name="currentPassword" required autocomplete="current-password" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc; padding-right: 42px;">
                            <i id="eye-icon_00" toggle="#password-field" class="fa fa-eye-slash eye-icon show-password position-absolute" data-id="02" style="right: 14px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #94a3b8;"></i>
                        </div>
                    </div>

                    <div class="form-group mb-3 text-left position-relative">
                        <label class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 700;">New Password <span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="password" placeholder="New Password" name="password" class="form-control py-3 px-3 shadow-none show-password-sd" id="new_password" required autocomplete="new-password" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc; padding-right: 42px;">
                            <i id="eye-icon_03" toggle="#password-field" class="fa fa-eye-slash eye-icon show-password position-absolute" data-id="02" style="right: 14px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #94a3b8;"></i>
                        </div>
                    </div>

                    <div class="form-group mb-4 text-left position-relative">
                        <label class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 700;">Confirm Password <span class="text-danger">*</span></label>
                        <div class="position-relative">
                            <input type="password" placeholder="Confirm Password" name="password_confirmation" class="form-control py-3 px-3 shadow-none show-password-sd" id="confirm_password" required autocomplete="new-password" style="border: 1px solid #cbd5e1; border-radius: 12px; font-size: 0.925rem; color: #0f172a; background-color: #f8fafc; padding-right: 42px;">
                            <i id="eye-icon_03" toggle="#password-field" class="fa fa-eye-slash eye-icon show-password position-absolute" data-id="02" style="right: 14px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #94a3b8;"></i>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between pt-2">
                        <button type="button" class="btn btn-light py-2.5 px-4 font-weight-semibold" data-dismiss="modal" data-bs-dismiss="modal" style="border-radius: 12px; border: 1px solid #cbd5e1; font-size: 0.875rem;">Cancel</button>
                        <button type="button" id="store-password" class="btn text-white font-weight-bold py-2.5 px-4 shadow-sm" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border: none; border-radius: 12px; font-size: 0.875rem;">Save Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Redesigned Delete Account Modal -->
<div class="modal fade trashModal" id="deleteAcModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
        <div class="modal-content overflow-hidden border-0 shadow-lg" style="border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);">
            <div class="modal-header border-0 px-4 pt-4 pb-3" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <img src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo" style="height: 26px; width: auto;">
                    <button type="button" class="close text-white opacity-75 hover-opacity-100" data-dismiss="modal" data-bs-dismiss="modal" style="font-size: 1.75rem; outline: none; background: transparent; border: 0; line-height: 1;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body p-4 p-sm-5 text-center" style="background-color: #ffffff;">
                <div class="mb-3 text-danger" style="font-size: 3.2rem;"><i class="fa fa-exclamation-triangle"></i></div>
                <h5 class="font-weight-bold text-dark delete-msg mb-2" style="color: #0f172a; font-size: 1.25rem;">Are you sure?</h5>
                <p class="text-muted mb-4" style="font-size: 0.875rem;">This action cannot be undone. All associated paystubs and profile data will be permanently removed.</p>
                <form id="deleteItem" action="{{ route('delete.account') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <button class="btn btn-light py-2.5 px-4 font-weight-semibold bottom-close mr-2" type="button" data-dismiss="modal" data-bs-dismiss="modal" style="border-radius: 12px; border: 1px solid #cbd5e1; font-size: 0.875rem; color: #475569;">No, Cancel</button>
                    <button class="btn btn-danger py-2.5 px-4 font-weight-bold delete-item" style="border-radius: 12px; background: #dc2626; border: none; font-size: 0.875rem;">Yes, Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        getAddressBook();
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            getAddressBook(page);
        });
    });

    // Change User E-mail
    $(".changeUserEmail").click(function() {
        $("#changeUserEmailModal").modal("show");
    });

    $("#changeUserEmail").on("submit", function() {
        $.ajax({
            type: 'POST',
            url: '{{ route("profile-setup") }}',
            data: $("#changeUserEmail").serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $("#changeUserEmailModal").modal("hide");
                toastr.success(response.message);
                $("#userName2").modal("hide");
                $('#hidden_email').val(response.data.temp_mail);
                $('#formType').val(response.type);
                $("#otpModal").modal("show");
                startTimer();
            },
            error: function(err) {
                error = err.responseJSON;
                toastr.error(error.message);
            },
        });
        return false;
    });

    // Verify Change E-mail
    $("#verifyChangeEmail").on("submit", function() {
        $.ajax({
            type: 'POST',
            url: '{{ route("profile-setup") }}',
            data: $("#verifyChangeEmail").serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $("#verifyChangeEmailModal").modal("hide");
                toastr.success(response.message);
            },
            error: function(err) {
                error = err.responseJSON;
                toastr.error(error.message);
            },
        });
        return false;
    });

    $(".username").click(function() {
        var name = $(this).data('name');
        $('#user-name').val(name);
        $("#userName").modal("show");
    });

    $("#store-name").click(function(e) {
        submitUserData($('#userNameForm1')[0]);
    });

    $(".username3").click(function() {
        $("#userName3").modal("show");
    });

    $("#store-password").click(function(e) {
        submitUserData($('#passwordUpdate')[0]);
    });

    $("#store-address").click(function(e) {
        submitUserData($('#addressForm')[0]);
    });

    $(document).on('click', '.btn-edit', function(e) {
        var recordId = $(this).data('record');

        $.ajax({
            url: "{{ route('get.address') }}?record=" + recordId,
            datatype: "json",
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    $('#addressForm input[name=addressId]').val(data.addressObj.id);
                    $('#addressForm input[name=fullName]').val(data.addressObj.name);
                    $('#addressForm input[name=type]').val(data.addressObj.type);
                    $('#addressForm input[name=addressLine1]').val(data.addressObj.address_1);
                    $('#addressForm input[name=addressLine2]').val(data.addressObj.address_2);
                    $('#addressForm input[name=cityName]').val(data.addressObj.city);
                    $('#addressForm select[name="stateName"]').val(data.addressObj.state);
                    $('#addressForm input[name=zipCode]').val(data.addressObj.zip_code);
                    if (data.addressObj.type == 'employer') {
                        $('#addressForm input[name=tel]').val(data.addressObj.tel);
                    }
                    if (data.addressObj.type == 'employee') {
                        $('#addressForm input[name=emp_id]').val(data.addressObj.emp_id);
                        $('#addressForm input[name=emp_ssn]').val(data.addressObj.emp_ssn);
                    }
                    openAddressModal('no');
                } else {
                    printErrorMsg(data.error);
                }
            }
        });
    });

    $('.eye-icon').click(function() {
        var id = $(this).data('id');
        var clr = $(this).attr('src');
        if (clr = 'eye-icon') {
            $("#eye-icon_" + id).removeClass("fa fa-eye-slash eye-icon");
            $("#eye-icon_" + id).addClass("fa fa-eye eye-icon");
        } else {
            $("#eye-icon_" + id).addClass("fa fa-eye-slash eye-icon");
            $("#eye-icon_" + id).removeClass("fa fa-eye eye-icon");
        }
    });

    $(document).on('click', '.show-password', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $(this).prev('input');
        input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password');
    });

    $(document).on('click', '#pills-profile-tab', function() {
        $("#addNewAddress").attr('data-emptype', 'employee');
        getAddressBook();
    });

    $(document).on('click', '#pills-home-tab', function() {
        $("#addNewAddress").attr('data-emptype', 'employer');
        getAddressBook();
    });

    $("#addNewAddress").click(function() {
        openAddressModal();
    });

    $(document).on('click', '#pills-profile-tab', function() {
        $("#addNewAddress2").attr('data-emptype', 'employee');
        getAddressBook();
    });

    $(document).on('click', '#pills-home-tab', function() {
        $("#addNewAddress2").attr('data-emptype', 'employer');
        getAddressBook();
    });

    $("#addNewAddress2").click(function() {
        openAddressModal();
    });

    $(document).on('click', '.delete-item', function(e) {
        submitUserData($('#deleteItem')[0]);
        $('#deleteAcModal').modal('hide');
    });

    $(document).on('click', '.btn-delete-add', function(e) {
        $('.delete-msg').text('Do you want to delete address?');
        var url = $(this).data('route');
        $('#deleteItem').attr('action', url);
        $('#deleteAcModal').modal('show');
    });

    $(".trash-account").click(function() {
        $('.delete-msg').text('Do you want to delete your account?');
        var url = $(this).data('route');
        $('#deleteItem').attr('action', url);
        $("#deleteAcModal").modal("show");
    });

    function openAddressModal(clear = 'yes') {
        if (clear == 'yes') {
            $('#addressForm').find("input[type=text], select").val("");
            $('#addressForm').find("input[name=addressId]").val("");
        }
        var popType = $("#addNewAddress").attr('data-emptype');
        if (popType == 'employee') {
            $("#adress-type").val('employee');
            $('#nameLabel').text('EMPLOYEE NAME *');
            $('#inputFullName').attr('placeholder', 'Full Employee Name');
            $('#tel-phone-title').text('Employee Telephone');
            $('#tel-phone-title').closest(".form-group").addClass('d-none');
            $('#emp_ssn_title').closest(".form-group").removeClass('d-none');
            $('#emp_id_title').closest(".form-group").removeClass('d-none');
        } else {
            $("#adress-type").val('employer');
            $('#nameLabel').text('EMPLOYER (COMPANY) NAME *');
            $('#inputFullName').attr('placeholder', 'Full Employer (Company) Name');
            $('#tel-phone-title').text('Employer Telephone');
            $('#tel-phone-title').closest(".form-group").removeClass('d-none');
            $('#emp_ssn_title').closest(".form-group").addClass('d-none');
            $('#emp_id_title').closest(".form-group").addClass('d-none');
        }
        $("#addressBook").modal("show");
    }

    function getAddressBook(page = 1) {
        var type = $("#addNewAddress").attr('data-emptype');
        url = "{{ route('fetch.address') }}?page=" + page + "&type=" + type;
        $.ajax({
            url: url,
            datatype: "html",
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    $('#' + type + 'Tab').html(data);
                } else {
                    printErrorMsg(data.error);
                }
            }
        });
    }

    function submitUserData(form) {
        $.ajax({
            type: 'POST',
            url: form.action,
            data: $(form).serialize(),
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    toastr.success(data.message);
                    if (data.pageReload == 'no') {
                        form.reset();
                        getAddressBook();
                        $('#addressBook').modal('hide');
                        return false;
                    }
                    location.reload(true);
                } else {
                    printErrorMsg(data.error);
                }
            }
        });
    }

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            toastr.error(value);
        });
    }
</script>
<script>
    var searchInput = 'inputAddressLine1';

    function initAutocomplete() {
        var searchInputEl = document.getElementById(searchInput);
        if (!searchInputEl) return;
        if (typeof google !== 'undefined' && google.maps && google.maps.places) {
            var origWarn = console.warn;
            console.warn = function(msg) {
                if (typeof msg === 'string' && msg.includes('google.maps.places.Autocomplete')) return;
                origWarn.apply(console, arguments);
            };

            try {
                var autocomplete = new google.maps.places.Autocomplete(searchInputEl, {
                    types: ['geocode'],
                    componentRestrictions: {
                        country: ["USA", "CA", "UK"]
                    }
                });

                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    var near_place = autocomplete.getPlace();
                    if (near_place && near_place.address_components && near_place.address_components.length > 0) {
                        var obj = [];
                        for (var i = 0; i < near_place.address_components.length; i++) {
                            for (var j = 0; j < near_place.address_components[i].types.length; j++) {
                                obj[near_place.address_components[i].types[j]] = near_place.address_components[i].short_name;
                            }
                        }
                        setLocation(obj);
                    }
                });
            } finally {
                console.warn = origWarn;
            }
        }
    }

    window.initAutocomplete = initAutocomplete;

    $(document).ready(function() {
        if (typeof google !== 'undefined' && google.maps && google.maps.places) {
            initAutocomplete();
        }
    });

    function setLocation(obj) {
        if (obj.street_number == undefined && obj.route == undefined) {
            $("#inputAddressLine1").val('');
        } else if (obj.street_number == undefined) {
            $("#inputAddressLine1").val(obj.route);
        } else if (obj.route == undefined) {
            $("#inputAddressLine1").val(obj.street_number);
        } else {
            $("#inputAddressLine1").val(obj.street_number + ' ' + obj.route);
        }

        if (obj.locality != undefined) {
            $("#inputCityTown").val(obj.locality);
        } else {
            $("#city").val('');
        }
        if (obj.administrative_area_level_1 != undefined) {
            $("#selectState").val(obj.administrative_area_level_1);
        } else {
            $("#state").val('');
        }
        if (obj.postal_code != undefined) {
            $("#inputZipPostalCode").val(obj.postal_code);
        } else {
            $("#zip_code").val('');
        }
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="{{ asset('user') }}/js/dist/jquery-input-mask-phone-number.min.js"></script>
<script>
    $(document).ready(function() {
        $('#inputZipPostalCode').mask('00000-9999');
        $('#tel').mask('000-000-9999');
    });
    $(document).ajaxStart(function() {
        $("#loaderDiv").css("display", "block");
    });
    $(document).ajaxComplete(function() {
        $("#loaderDiv").css("display", "none");
    });
</script>
<script>
    $('.my-account').click(function(e) {
        e.preventDefault();
        let url = window.location.href;
        if (url.includes('emp')) {
            window.location.href = '/profile?tab=1&emp=1';
        } else {
            window.location.href = '/profile?tab=1';
        }
    });

    $('.address-book').click(function(e) {
        e.preventDefault();
        let url = window.location.href;
        if (url.includes('emp')) {
            window.location.href = '/profile?tab=2&emp=1';
        } else {
            window.location.href = '/profile?tab=2';
        }
    });
</script>
@endsection
