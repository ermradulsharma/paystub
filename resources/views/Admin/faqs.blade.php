@extends('Admin.layouts.default')
@section('content')

<main id="main" class="main">
    <div class="page-header-wrapper mb-3">
        <div>
            <h1 style="font-size: 18px; font-weight: 700; margin-bottom: 2px;">FAQ & Helpdesk Manager</h1>
            <p style="font-size: 12px; color: var(--light-text-muted); margin: 0;">Manage public helpdesk questions and customer contact form messages</p>
        </div>
        <div>
            <span class="badge-clean active">
                <i class="bi bi-chat-dots-fill me-1"></i> Helpdesk Active
            </span>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="apple-table-card">
                <h3 class="table-title" style="font-size: 14px;"><i class="bi bi-question-circle-fill me-1" style="color: var(--brand-primary);"></i> Frequently Asked Questions</h3>
                
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item mb-2" style="border: 1px solid var(--light-border); border-radius: 8px; overflow: hidden;">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" style="font-size: 13px; font-weight: 600;">
                                How are tax deductions calculated on USA Paystubs?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted py-2" style="font-size: 12.5px;">
                                Deductions follow official IRS rules, state tax rates (e.g. CA, NY, TX), Social Security (6.2%), and Medicare (1.45%).
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item mb-2" style="border: 1px solid var(--light-border); border-radius: 8px; overflow: hidden;">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" style="font-size: 13px; font-weight: 600;">
                                Which currencies are supported for Global Paystubs?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted py-2" style="font-size: 12.5px;">
                                PaystubX supports USD, EUR, GBP, CAD, AUD, INR, and all major international currencies.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="apple-table-card">
                <h3 class="table-title" style="font-size: 14px;"><i class="bi bi-headset me-1" style="color: var(--brand-emerald);"></i> Customer Support Messages</h3>

                <div class="p-3 mb-2" style="background: var(--light-bg-app); border-radius: 8px; border: 1px solid var(--light-border);">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <span style="font-weight: 600; color: var(--light-text-main);">John Smith</span>
                        <span class="badge bg-primary" style="font-size: 10px;">New Inquiry</span>
                    </div>
                    <p class="text-muted mb-1" style="font-size: 11.5px;">john.smith@example.com</p>
                    <p class="mb-0" style="font-size: 12.5px; color: var(--light-text-sub);">"Need assistance downloading my annual W-2 paystub statement."</p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
