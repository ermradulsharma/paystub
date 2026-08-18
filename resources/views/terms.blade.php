@extends('layouts.app')

@section('content')
<div class="rich-page-wrapper py-5">
    <div class="container" style="max-width: 1200px;">

        <!-- Rich Dark Mesh Hero Banner -->
        <div class="rich-hero-banner text-center">
            <div class="rich-pill-badge mb-3">
                <span class="wow-pulse-dot"></span> Terms of Service & System Guidelines
            </div>
            <h1 class="rich-hero-title">Terms & Conditions</h1>
            <p class="text-slate-300 max-w-2xl mx-auto mb-0" style="font-size: 1.05rem; line-height: 1.6;">
                The legal framework governing your access to PaystubX payroll tools, state tax compliance math engines, and instant PDF earnings statements.
            </p>
        </div>

        <!-- 2-Column Grid: Left Sticky Table of Contents Sidebar & Right Rich Cards -->
        <div class="row gy-4">
            
            <!-- Left Column: Sticky Toc & Quick Direct Stats Card -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="sticky-top" style="top: 100px; z-index: 10;">
                    <!-- Quick Stats Pill Card -->
                    <div class="card border-0 p-4 mb-4" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%); border-radius: 20px; color: #ffffff;">
                        <h6 class="font-weight-bold text-white uppercase mb-2" style="font-size: 0.8rem; letter-spacing: 0.5px;">System Standard</h6>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-gavel text-white mr-3" style="font-size: 1.8rem; opacity: 0.9;"></i>
                            <div>
                                <h4 class="font-weight-bold mb-0" style="font-size: 1.25rem;">2026 Verified</h4>
                                <span class="small text-white-50">Legal & Payroll Compliance</span>
                            </div>
                        </div>
                        <p class="small text-white-50 mb-0">Updated to ensure full alignment with all 50 US States & Canadian provincial regulations.</p>
                    </div>

                    <!-- Interactive Nav Jump Box -->
                    <div class="card border-0 p-4" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 20px; box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.04);">
                        <h6 class="font-weight-bold text-dark uppercase mb-3" style="font-size: 0.8rem; letter-spacing: 0.5px; color: #0f172a;">Jump to Section</h6>
                        <nav class="nav flex-column gap-2">
                            <a href="#card-1" class="rich-feature-pill text-decoration-none"><i class="fa fa-file-text-o mr-2 text-indigo"></i> 01. User Agreement</a>
                            <a href="#card-2" class="rich-feature-pill text-decoration-none"><i class="fa fa-shield mr-2 text-indigo"></i> 02. Novelty & Authorization</a>
                            <a href="#card-3" class="rich-feature-pill text-decoration-none"><i class="fa fa-calculator mr-2 text-indigo"></i> 03. Stub Generation Terms</a>
                            <a href="#card-4" class="rich-feature-pill text-decoration-none"><i class="fa fa-support mr-2 text-indigo"></i> 04. 48-Hour Typo Corrections</a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Right Column: Rich Glassmorphic Section Cards -->
            <div class="col-lg-8">
                
                <!-- Card 1 -->
                <div class="rich-glass-card" id="card-1">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rich-icon-box"><i class="fa fa-file-text-o"></i></div>
                        <div>
                            <span class="text-indigo font-weight-bold uppercase small d-block" style="color: #4f46e5;">Section 01</span>
                            <h3 class="rich-card-title">Acceptance of Terms & System Agreement</h3>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-0" style="font-size: 0.975rem; line-height: 1.75;">
                        By accessing our website or creating pay stubs through PaystubX engines, you agree to and accept all terms and conditions outlined herein. We suggest you read them carefully prior to generating any documents or purchasing services.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="rich-glass-card" id="card-2">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rich-icon-box" style="background: rgba(239, 68, 68, 0.1); border-color: rgba(239, 68, 68, 0.2); color: #ef4444;"><i class="fa fa-shield"></i></div>
                        <div>
                            <span class="text-danger font-weight-bold uppercase small d-block" style="color: #ef4444;">Section 02</span>
                            <h3 class="rich-card-title">Authorized Use & Novelty Disclaimer</h3>
                        </div>
                    </div>
                    
                    <div class="rich-callout-box">
                        <strong class="text-dark d-block mb-1" style="color: #0f172a;"><i class="fa fa-exclamation-circle text-indigo mr-1"></i> Strict Authorization Statement</strong>
                        <span class="small text-slate-600">Services of use are strictly not intended for illegal purposes of any kind. You attest that you are an authorized individual of at least 18 years of age possessing official payroll authorization.</span>
                    </div>

                    <p class="text-slate-600 mb-0" style="font-size: 0.975rem; line-height: 1.75;">
                        You will not attempt to scrape or extract any proprietary information from our site through unauthorized automated means. You will not use any documents generated to misrepresent yourself or allow third parties to use those documents deceptively. PaystubX retains full rights to take legal action for deliberate service misuse.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="rich-glass-card" id="card-3">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rich-icon-box"><i class="fa fa-calculator"></i></div>
                        <div>
                            <span class="text-indigo font-weight-bold uppercase small d-block" style="color: #4f46e5;">Section 03</span>
                            <h3 class="rich-card-title">Stub Creation, Billing & Customization</h3>
                        </div>
                    </div>
                    
                    <div class="rich-feature-pill">
                        <i class="fa fa-check-circle text-indigo mr-3" style="font-size: 1.1rem;"></i>
                        <span><strong>Employer & Contractor Tool:</strong> Built for employers and payers to distribute accurate pay stubs and e-file tax forms.</span>
                    </div>
                    <div class="rich-feature-pill">
                        <i class="fa fa-check-circle text-indigo mr-3" style="font-size: 1.1rem;"></i>
                        <span><strong>Template Preview:</strong> You can preview and adjust calculation inputs and templates prior to final checkout.</span>
                    </div>
                    <div class="rich-feature-pill">
                        <i class="fa fa-check-circle text-indigo mr-3" style="font-size: 1.1rem;"></i>
                        <span><strong>Promotional Billed Rates:</strong> First stub creation is subject to promotional offers; subsequent creations are billed according to plan rates.</span>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="rich-glass-card" id="card-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="rich-icon-box" style="background: rgba(16, 185, 129, 0.1); border-color: rgba(16, 185, 129, 0.2); color: #10b981;"><i class="fa fa-support"></i></div>
                        <div>
                            <span class="text-success font-weight-bold uppercase small d-block" style="color: #10b981;">Section 04</span>
                            <h3 class="rich-card-title">48-Hour Free Typo Corrections & PDF Delivery</h3>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-3" style="font-size: 0.975rem; line-height: 1.75;">
                        Generated pay stubs are delivered instantly in digital PDF format via email and portal download. Hardcopy physical mail is not shipped.
                    </p>
                    <div class="p-4 rounded-20 text-white d-flex flex-column flex-sm-row align-items-center justify-content-between" style="background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%); border-radius: 18px;">
                        <div class="mb-3 mb-sm-0">
                            <h6 class="font-weight-bold mb-1" style="font-size: 1rem;"><i class="fa fa-clock-o mr-2"></i> Notice a Typo in Your Order?</h6>
                            <span class="small text-white-50">Contact support within 48 hours for complimentary re-issuance.</span>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-light font-weight-bold px-4 py-2" style="border-radius: 10px; color: #4f46e5; font-size: 0.875rem;">Contact Support <i class="fa fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
