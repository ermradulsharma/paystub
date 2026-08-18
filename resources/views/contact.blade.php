@extends('layouts.app')

@section('content')
<div class="rich-page-wrapper py-5">
    <div class="container" style="max-width: 1200px;">

        <!-- Rich Dark Mesh Hero Banner -->
        <div class="rich-hero-banner text-center">
            <div class="rich-pill-badge mb-3">
                <span class="wow-pulse-dot"></span> 24/7/365 Dedicated Payroll Support Desk
            </div>
            <h1 class="rich-hero-title">How Can We Help You?</h1>
            <p class="text-slate-300 max-w-2xl mx-auto mb-0" style="font-size: 1.05rem; line-height: 1.6;">
                Our customer engineering and support team is available around the clock to assist with paystubs, W-2 forms, tax calculations, and order inquiries.
            </p>
        </div>

        <div class="row gy-4 align-items-stretch">
            <!-- Left Side: Interactive Contact Touchpoint Cards -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="h-100 d-flex flex-column justify-content-between">
                    
                    <!-- Touchpoint 1 -->
                    <div class="wow-contact-card mb-3" style="border-left: 4px solid #4f46e5;">
                        <div class="d-flex align-items-center mb-3">
                            <div class="wow-icon-box-lg mr-3 mb-0" style="background: rgba(79, 70, 229, 0.1); color: #4f46e5;">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div>
                                <h5 class="font-weight-bold text-dark mb-0" style="font-size: 1.1rem; color: #0f172a;">Email Support Desk</h5>
                                <span class="small text-muted">24/7 Direct Line</span>
                            </div>
                        </div>
                        <p class="small text-slate-600 mb-3">Direct assistance for order modifications, typo corrections, and calculation inquiries.</p>
                        <a href="mailto:support@paystubx.com" class="font-weight-bold text-indigo" style="color: #4f46e5; text-decoration: none; font-size: 0.95rem;">
                            support@paystubx.com <i class="fa fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    <!-- Touchpoint 2 -->
                    <div class="wow-contact-card mb-3" style="border-left: 4px solid #10b981;">
                        <div class="d-flex align-items-center mb-3">
                            <div class="wow-icon-box-lg mr-3 mb-0" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                                <i class="fa fa-bolt"></i>
                            </div>
                            <div>
                                <h5 class="font-weight-bold text-dark mb-0" style="font-size: 1.1rem; color: #0f172a;">Fast Turnaround</h5>
                                <span class="small text-muted">Average Turnaround</span>
                            </div>
                        </div>
                        <p class="small text-slate-600 mb-0">99.4% of support inquiries are addressed in under 15 minutes.</p>
                    </div>

                    <!-- Touchpoint 3 -->
                    <div class="wow-contact-card" style="border-left: 4px solid #3b82f6;">
                        <div class="d-flex align-items-center mb-3">
                            <div class="wow-icon-box-lg mr-3 mb-0" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                                <i class="fa fa-lock"></i>
                            </div>
                            <div>
                                <h5 class="font-weight-bold text-dark mb-0" style="font-size: 1.1rem; color: #0f172a;">256-Bit SSL Encrypted</h5>
                                <span class="small text-muted">Secure Channel</span>
                            </div>
                        </div>
                        <p class="small text-slate-600 mb-0">Your tickets and paystub details remain 100% confidential and encrypted.</p>
                    </div>

                </div>
            </div>

            <!-- Right Side: Ultra-Modern Glassmorphic Contact Form -->
            <div class="col-lg-7">
                <div class="rich-glass-card h-100 p-4 p-sm-5">
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
                        <div>
                            <h3 class="font-weight-bold text-dark mb-1" style="font-size: 1.4rem; color: #0f172a;">Send Us a Message</h3>
                            <p class="text-muted small mb-0">We will respond to your registered email address immediately.</p>
                        </div>
                        <span class="badge px-3 py-2 font-weight-semibold" style="background: rgba(79, 70, 229, 0.1); color: #4f46e5; border-radius: 10px;">24/7 Live Desk</span>
                    </div>

                    <form id="contactForm" action="{{ route('contact-form') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3.5 wow-input-wrapper">
                            <label for="name" class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 600;">Full Name <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control w-100 shadow-none" placeholder="e.g. Sarah Jenkins" required>
                        </div>

                        <div class="form-group mb-3.5 wow-input-wrapper">
                            <label for="email" class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 600;">Email Address <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control w-100 shadow-none" placeholder="name@company.com" required>
                        </div>

                        <div class="form-group mb-4 wow-input-wrapper">
                            <label for="w3review" class="font-weight-semibold mb-1" style="font-size: 0.825rem; color: #475569; font-weight: 600;">How Can We Help You? <span class="text-danger">*</span></label>
                            <textarea id="w3review" name="w3review" rows="5" class="form-control w-100 shadow-none" placeholder="Describe your inquiry in detail (Order ID, paystub typo correction, calculation question...)" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-block py-3 text-white font-weight-bold shadow-md" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border: none; border-radius: 14px; font-size: 1rem; letter-spacing: 0.3px; transition: all 0.25s ease;">
                            Send Support Ticket <i class="fa fa-paper-plane ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
