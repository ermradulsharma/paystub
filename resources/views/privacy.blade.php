@extends('layouts.app')

@section('content')
<div class="rich-page-wrapper py-5">
    <div class="container" style="max-width: 1200px;">

        <!-- Rich Dark Mesh Hero Banner -->
        <div class="rich-hero-banner text-center">
            <div class="rich-pill-badge mb-3">
                <span class="wow-pulse-dot"></span> Bank-Grade 256-Bit SSL Data Protection
            </div>
            <h1 class="rich-hero-title">Privacy Policy</h1>
            <p class="text-slate-300 max-w-2xl mx-auto mb-0" style="font-size: 1.05rem; line-height: 1.6;">
                How PaystubX encrypts, protects, and handles your personal and employer payroll information.
            </p>
        </div>

        <!-- 2-Column Grid -->
        <div class="row gy-4">
            
            <!-- Left Column -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="sticky-top" style="top: 100px; z-index: 10;">
                    <!-- Shield Card -->
                    <div class="card border-0 p-4 mb-4" style="background: linear-gradient(135deg, #059669 0%, #10b981 100%); border-radius: 20px; color: #ffffff;">
                        <h6 class="font-weight-bold text-white uppercase mb-2" style="font-size: 0.8rem; letter-spacing: 0.5px;">Data Protection</h6>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-shield text-white mr-3" style="font-size: 1.8rem; opacity: 0.9;"></i>
                            <div>
                                <h4 class="font-weight-bold mb-0" style="font-size: 1.25rem;">100% Private</h4>
                                <span class="small text-white-50">Zero Third-Party Data Sales</span>
                            </div>
                        </div>
                        <p class="small text-white-50 mb-0">Your personal details and tax records are strictly encrypted and never sold to third-party advertisers.</p>
                    </div>

                    <!-- Nav Card -->
                    <div class="card border-0 p-4" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 20px; box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.04);">
                        <h6 class="font-weight-bold text-dark uppercase mb-3" style="font-size: 0.8rem; letter-spacing: 0.5px; color: #0f172a;">Jump to Section</h6>
                        <nav class="nav flex-column gap-2">
                            <a href="#privacy-1" class="rich-feature-pill text-decoration-none"><i class="fa fa-user mr-2 text-indigo"></i> 01. Information We Collect</a>
                            <a href="#privacy-2" class="rich-feature-pill text-decoration-none"><i class="fa fa-calculator mr-2 text-indigo"></i> 02. How Data Is Used</a>
                            <a href="#privacy-3" class="rich-feature-pill text-decoration-none"><i class="fa fa-lock mr-2 text-indigo"></i> 03. Encryption Standards</a>
                            <a href="#privacy-4" class="rich-feature-pill text-decoration-none"><i class="fa fa-gavel mr-2 text-indigo"></i> 04. CalOPPA & Data Rights</a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-8">
                
                <!-- Card 1 -->
                <div class="rich-glass-card" id="privacy-1">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rich-icon-box"><i class="fa fa-user-circle"></i></div>
                        <div>
                            <span class="text-indigo font-weight-bold uppercase small d-block" style="color: #4f46e5;">Section 01</span>
                            <h3 class="rich-card-title">Information We Collect From You</h3>
                        </div>
                    </div>
                    
                    <div class="rich-feature-pill">
                        <i class="fa fa-id-badge text-indigo mr-3" style="font-size: 1.1rem;"></i>
                        <span><strong>Identity Details:</strong> First and last name to configure your payroll profile.</span>
                    </div>
                    <div class="rich-feature-pill">
                        <i class="fa fa-envelope text-indigo mr-3" style="font-size: 1.1rem;"></i>
                        <span><strong>Contact Details:</strong> Email address and contact numbers to deliver generated PDF documents.</span>
                    </div>
                    <div class="rich-feature-pill">
                        <i class="fa fa-credit-card text-indigo mr-3" style="font-size: 1.1rem;"></i>
                        <span><strong>Financial Data:</strong> SSL-encrypted payment card details. Raw credit card numbers are never stored on our servers.</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="rich-glass-card" id="privacy-2">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rich-icon-box" style="background: rgba(59, 130, 246, 0.1); border-color: rgba(59, 130, 246, 0.2); color: #3b82f6;"><i class="fa fa-cogs"></i></div>
                        <div>
                            <span class="text-primary font-weight-bold uppercase small d-block" style="color: #3b82f6;">Section 02</span>
                            <h3 class="rich-card-title">How Your Information Is Used</h3>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-3" style="font-size: 0.975rem; line-height: 1.75;">
                        Information collected is strictly used to execute tax math calculations, deliver ordered paystubs, and process user inquiries.
                    </p>
                    <div class="rich-callout-box" style="background: rgba(16, 185, 129, 0.05); border-left-color: #10b981;">
                        <strong class="text-dark d-block mb-1" style="color: #0f172a;"><i class="fa fa-shield text-success mr-1"></i> Zero Third-Party Advertisers</strong>
                        <span class="small text-slate-600">We do <strong>NOT</strong> sell, trade, or rent your personal, employee, or financial information to third parties for marketing purposes.</span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="rich-glass-card" id="privacy-3">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rich-icon-box" style="background: rgba(16, 185, 129, 0.1); border-color: rgba(16, 185, 129, 0.2); color: #10b981;"><i class="fa fa-lock"></i></div>
                        <div>
                            <span class="text-success font-weight-bold uppercase small d-block" style="color: #10b981;">Section 03</span>
                            <h3 class="rich-card-title">Security & Encryption Standards</h3>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-0" style="font-size: 0.975rem; line-height: 1.75;">
                        All personal information is encrypted in transit and at rest using bank-grade 256-Bit SSL protocols. Access is strictly limited to authorized security personnel.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="rich-glass-card mb-0" id="privacy-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rich-icon-box"><i class="fa fa-gavel"></i></div>
                        <div>
                            <span class="text-indigo font-weight-bold uppercase small d-block" style="color: #4f46e5;">Section 04</span>
                            <h3 class="rich-card-title">California Privacy Rights (CalOPPA)</h3>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-3" style="font-size: 0.975rem; line-height: 1.75;">
                        Under CalOPPA, users can visit public informational pages anonymously and request account data deletion at any time by contacting privacy support.
                    </p>
                    <div class="pt-3 border-top d-flex align-items-center justify-content-between">
                        <span class="small text-muted">Need a copy of your stored data?</span>
                        <a href="mailto:support@paystubx.com" class="font-weight-bold text-indigo" style="color: #4f46e5; text-decoration: none;">Email Data Protection Officer <i class="fa fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
