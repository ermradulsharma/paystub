@extends('layouts.app')

@section('content')
<div class="rich-page-wrapper py-5">
    <div class="container" style="max-width: 1200px;">

        <!-- Rich Dark Mesh Hero Banner -->
        <div class="rich-hero-banner text-center">
            <div class="rich-pill-badge mb-3">
                <span class="wow-pulse-dot"></span> 100% Satisfaction & Refund Policy
            </div>
            <h1 class="rich-hero-title">Refund Policy</h1>
            <p class="text-slate-300 max-w-2xl mx-auto mb-0" style="font-size: 1.05rem; line-height: 1.6;">
                Transparent conditions for order cancellations, duplicate billing refunds, and server issue resolutions.
            </p>
        </div>

        <!-- 2-Column Grid -->
        <div class="row gy-4">
            
            <!-- Left Column -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="sticky-top" style="top: 100px; z-index: 10;">
                    <!-- Guarantee Card -->
                    <div class="card border-0 p-4 mb-4" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border-radius: 20px; color: #ffffff;">
                        <h6 class="font-weight-bold text-white uppercase mb-2" style="font-size: 0.8rem; letter-spacing: 0.5px;">Guarantee</h6>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-undo text-white mr-3" style="font-size: 1.8rem; opacity: 0.9;"></i>
                            <div>
                                <h4 class="font-weight-bold mb-0" style="font-size: 1.25rem;">48-Hour Claim</h4>
                                <span class="small text-white-50">Fair Resolution Guarantee</span>
                            </div>
                        </div>
                        <p class="small text-white-50 mb-0">Our customer support desk reviews and processes eligible refund claims within 3–5 business days.</p>
                    </div>

                    <!-- Nav Card -->
                    <div class="card border-0 p-4" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 20px; box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.04);">
                        <h6 class="font-weight-bold text-dark uppercase mb-3" style="font-size: 0.8rem; letter-spacing: 0.5px; color: #0f172a;">Jump to Section</h6>
                        <nav class="nav flex-column gap-2">
                            <a href="#refund-1" class="rich-feature-pill text-decoration-none"><i class="fa fa-check-circle mr-2 text-indigo"></i> 01. Refund Eligibility</a>
                            <a href="#refund-2" class="rich-feature-pill text-decoration-none"><i class="fa fa-times-circle mr-2 text-indigo"></i> 02. Non-Refundable Items</a>
                            <a href="#refund-3" class="rich-feature-pill text-decoration-none"><i class="fa fa-envelope mr-2 text-indigo"></i> 03. Claim Process & Timeline</a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-8">
                
                <!-- Card 1 -->
                <div class="rich-glass-card" id="refund-1">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rich-icon-box" style="background: rgba(16, 185, 129, 0.1); border-color: rgba(16, 185, 129, 0.2); color: #10b981;"><i class="fa fa-check-circle"></i></div>
                        <div>
                            <span class="text-success font-weight-bold uppercase small d-block" style="color: #10b981;">Section 01</span>
                            <h3 class="rich-card-title">Eligible Refund Circumstances</h3>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-3" style="font-size: 0.975rem;">PaystubX will initiate a full refund under the following technical conditions:</p>
                    
                    <div class="rich-feature-pill">
                        <i class="fa fa-copy text-success mr-3" style="font-size: 1.1rem; color: #10b981;"></i>
                        <span><strong>Duplicate Billing:</strong> Accidental double charge for a single paystub order.</span>
                    </div>
                    <div class="rich-feature-pill">
                        <i class="fa fa-server text-success mr-3" style="font-size: 1.1rem; color: #10b981;"></i>
                        <span><strong>Server PDF Delivery Outage:</strong> System-side outage preventing document downloads or email delivery.</span>
                    </div>
                    <div class="rich-feature-pill">
                        <i class="fa fa-wrench text-success mr-3" style="font-size: 1.1rem; color: #10b981;"></i>
                        <span><strong>System Editing Issue:</strong> Technical glitch preventing stub editing prior to order completion.</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="rich-glass-card" id="refund-2">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rich-icon-box" style="background: rgba(245, 158, 11, 0.1); border-color: rgba(245, 158, 11, 0.2); color: #f59e0b;"><i class="fa fa-exclamation-circle"></i></div>
                        <div>
                            <span class="text-amber font-weight-bold uppercase small d-block" style="color: #f59e0b;">Section 02</span>
                            <h3 class="rich-card-title">Non-Refundable Scenarios</h3>
                        </div>
                    </div>
                    
                    <div class="rich-callout-box" style="background: rgba(245, 158, 11, 0.05); border-left-color: #f59e0b;">
                        <strong class="text-dark d-block mb-1" style="color: #0f172a;"><i class="fa fa-info-circle text-amber mr-1"></i> Digital Delivery Policy</strong>
                        <span class="small text-slate-600">Because paystubs are digital vector files generated immediately upon checkout, refunds cannot be issued for user data entry mistakes or changes of mind after successful document delivery.</span>
                    </div>

                    <ul class="mb-0 text-slate-600" style="padding-left: 20px;">
                        <li class="mb-2">User data entry mistakes (e.g. entering incorrect employer name, salary numbers, or employee address).</li>
                        <li class="mb-2">Deciding not to use the generated paystub after successful download.</li>
                        <li class="mb-2">Claims submitted after 48 hours of order creation. Minor typos can be corrected for free within 48 hours.</li>
                    </ul>
                </div>

                <!-- Card 3 -->
                <div class="rich-glass-card mb-0" id="refund-3">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rich-icon-box"><i class="fa fa-envelope"></i></div>
                        <div>
                            <span class="text-indigo font-weight-bold uppercase small d-block" style="color: #4f46e5;">Section 03</span>
                            <h3 class="rich-card-title">Claim Process & Timeline</h3>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-4" style="font-size: 0.975rem;">
                        Submit refund claims within 48 hours of order completion to <a href="mailto:support@paystubx.com" class="font-weight-semibold text-indigo" style="color: #4f46e5;">support@paystubx.com</a>. Approved refunds are credited to your original payment method within 3–5 business days.
                    </p>
                    <div class="pt-3 border-top d-flex align-items-center justify-content-between">
                        <span class="small text-muted">Need help with an order issue?</span>
                        <a href="{{ route('contact') }}" class="btn btn-indigo font-weight-bold px-4 py-2 text-white" style="background: #4f46e5; border-radius: 10px; font-size: 0.875rem;">Submit Refund Claim <i class="fa fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
