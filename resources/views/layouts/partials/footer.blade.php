<!-- Enterprise Professional Footer Section (Vercel / Stripe UX) -->
<footer class="footerSection">
    <div class="container" style="max-width: 1440px; margin: 0 auto; padding: 0 24px;">
        
        <!-- Trust Banner Strip -->
        <div class="footer-trust-banner mb-5 p-4 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-3 mb-lg-0">
                <div class="trust-icon-box mr-3">
                    <i class="fa fa-shield" style="font-size: 1.75rem;"></i>
                </div>
                <div>
                    <h5 class="font-weight-bold text-white mb-1" style="font-size: 1.1rem; letter-spacing: -0.2px;">Official & Verified Paystub Generator</h5>
                    <p class="text-slate-400 mb-0" style="font-size: 0.875rem;">Automated Federal & State Tax Math • Instant PDF Download • Trusted Worldwide</p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('usa.payStub') }}" class="btn btn-indigo-glow px-4 py-2.5 font-weight-bold">
                    Create Paystub Now <i class="fa fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>

        <!-- 4 Columns Footer Main Body -->
        <div class="row gy-4 mb-5">
            <!-- Col 1: Brand & Identity -->
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <a href="{{ url('/') }}">
                    <img class="footer-logo mb-3" src="{{ asset('images/Paystub X.webp') }}" alt="PaystubX Logo" style="height: 38px;">
                </a>
                <p class="footer-description mb-4">
                    PaystubX is an enterprise-grade automated payroll & W-2 tax document generator built for small business owners, HR teams, and independent contractors worldwide.
                </p>
                <div class="d-flex align-items-center gap-2" style="gap: 10px;">
                    <a href="https://www.facebook.com/paystubx" target="_blank" class="footer-social-pill" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="https://instagram.com/paystubx?igshid=YmMyMTA2M2Y=" target="_blank" class="footer-social-pill" title="Instagram"><i class="fa fa-instagram"></i></a>
                    <a href="https://twitter.com/paystubx" target="_blank" class="footer-social-pill" title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.youtube.com/channel/UCL3EF3eYo2OqcsPHfszXMzw" target="_blank" class="footer-social-pill" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                </div>
            </div>

            <!-- Col 2: Products & Tools -->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h6 class="footer-col-title">Paystub Generators</h6>
                <ul class="footer-link-list">
                    <li><a href="{{ route('usa.payStub') }}"><i class="fa fa-check-circle mr-2" style="color: #818cf8;"></i> USA Paystub Generator</a></li>
                    <li><a href="{{ route('canada') }}"><i class="fa fa-check-circle mr-2" style="color: #818cf8;"></i> Canada Paystub Generator</a></li>
                    <li><a href="{{ route('uk') }}"><i class="fa fa-check-circle mr-2" style="color: #818cf8;"></i> UK Paystub Generator</a></li>
                    <li><a href="{{ route('global') }}"><i class="fa fa-check-circle mr-2" style="color: #818cf8;"></i> Global Paystub Generator</a></li>
                    <li><a href="{{ route('w2form') }}"><i class="fa fa-check-circle mr-2" style="color: #818cf8;"></i> W-2 Form Generator</a></li>
                </ul>
            </div>

            <!-- Col 3: Legal & Support -->
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                <h6 class="footer-col-title">Company & Legal</h6>
                <ul class="footer-link-list">
                    <li><a href="{{ url('terms') }}">Terms & Conditions</a></li>
                    <li><a href="{{ url('privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('refund') }}">Refund Policy</a></li>
                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                    @auth
                        <li><a href="{{ route('invoiceList') }}">Order History</a></li>
                        <li><a href="{{ route('profile') }}">My Account</a></li>
                    @endauth
                </ul>
            </div>

            <!-- Col 4: Trust & Guarantee -->
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-col-title">100% Guaranteed</h6>
                <div class="trust-badge-card p-3 mb-3 d-flex align-items-center gap-3" style="gap: 10px;">
                    <img src="{{ asset('images/satisfaction.webp') }}" alt="Satisfaction Guarantee" style="height: 60px; width: auto;">
                    <div>
                        <div class="font-weight-bold text-white mb-1" style="font-size: 0.9rem;">100% Accurate</div>
                        <div class="small text-slate-400">Tested across all 50 US States & Canadian Provinces.</div>
                    </div>
                </div>
                <div class="d-flex align-items-center text-slate-400 small">
                    <i class="fa fa-lock text-emerald-400 mr-2" style="font-size: 1rem;"></i> 256-Bit SSL Encrypted & Secure
                </div>
            </div>
        </div>

        <!-- Bottom Sub-Footer Bar -->
        <div class="footer-sub-bar d-flex flex-column flex-md-row align-items-center justify-content-between" style="padding-top: 10px;">
            <p class="text-slate-400 small mb-2 mb-md-0">
                COPYRIGHT &copy; {{ date('Y') }} PaystubX Inc. ALL RIGHTS RESERVED.
            </p>
            <div class="d-flex align-items-center gap-3">
                <span class="badge badge-dark-indigo px-3 py-1.5 font-weight-semibold">Enterprise Payroll Architecture</span>
            </div>
        </div>

    </div>
</footer>
