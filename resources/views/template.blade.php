@extends('layouts.app')

@section('content')
<div class="rich-page-wrapper py-5">
    <div class="container" style="max-width: 1300px;">

        <!-- Rich Dark Mesh Hero Banner -->
        <div class="rich-hero-banner text-center mb-5">
            <div class="rich-pill-badge mb-3">
                <span class="wow-pulse-dot"></span> Official Verified Paystub & W-2 Designs
            </div>
            <h1 class="rich-hero-title">Paystub Template Gallery</h1>
            <p class="text-slate-300 max-w-2xl mx-auto mb-0" style="font-size: 1.05rem; line-height: 1.6;">
                Explore our high-resolution landscape and portrait payroll templates designed for instant automated PDF generation.
            </p>
        </div>

        <!-- Template Filter Bar -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-2 border-bottom">
            <div>
                <h4 class="font-weight-bold text-dark mb-1" style="font-size: 1.35rem; color: #0f172a;">Available Layouts</h4>
                <p class="text-muted small mb-0">Select any layout to begin generating your earnings statement</p>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('usa.payStub') }}" class="btn text-white font-weight-bold px-4 py-2.5 shadow-sm" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border-radius: 12px; font-size: 0.9rem;">
                    Create Paystub Now <i class="fa fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Template Cards Grid -->
        <div class="row gy-4 mb-5">
            
            <!-- Template Item 1: Whitaker Standard -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="template-card-item">
                    <div class="template-thumb-wrapper">
                        <span class="template-badge-pill">Landscape • Popular</span>
                        <img src="{{ asset('images/preview.png') }}" alt="Whitaker Template Preview" class="template-thumb-img">
                    </div>
                    <div class="template-card-body">
                        <div>
                            <h5 class="font-weight-bold text-dark mb-1" style="font-size: 1.15rem; color: #0f172a;">Whitaker Template</h5>
                            <p class="small text-slate-500 mb-3">Clean corporate landscape layout with dual deduction breakdown tables and employer check stub.</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <button type="button" class="btn btn-light btn-sm font-weight-semibold" data-toggle="modal" data-target="#templateModal" style="border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.825rem; color: #475569;">
                                <i class="fa fa-eye mr-1"></i> Preview
                            </button>
                            <a href="{{ route('usa.payStub') }}" class="btn btn-sm font-weight-bold text-white px-3" style="background: #4f46e5; border-radius: 8px; font-size: 0.825rem;">
                                Use Template <i class="fa fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Template Item 2: Modern Executive -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="template-card-item">
                    <div class="template-thumb-wrapper">
                        <span class="template-badge-pill" style="background: rgba(79, 70, 229, 0.9);">Portrait • High Precision</span>
                        <img src="{{ asset('images/paystub_image.webp') }}" alt="Executive Template Preview" class="template-thumb-img">
                    </div>
                    <div class="template-card-body">
                        <div>
                            <h5 class="font-weight-bold text-dark mb-1" style="font-size: 1.15rem; color: #0f172a;">Executive Modern Stub</h5>
                            <p class="small text-slate-500 mb-3">Vertical single-page layout featuring itemized YTD tax math and direct deposit information.</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <button type="button" class="btn btn-light btn-sm font-weight-semibold" data-toggle="modal" data-target="#templateModal" style="border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.825rem; color: #475569;">
                                <i class="fa fa-eye mr-1"></i> Preview
                            </button>
                            <a href="{{ route('usa.payStub') }}" class="btn btn-sm font-weight-bold text-white px-3" style="background: #4f46e5; border-radius: 8px; font-size: 0.825rem;">
                                Use Template <i class="fa fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Template Item 3: W-2 Form Official -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="template-card-item">
                    <div class="template-thumb-wrapper">
                        <span class="template-badge-pill" style="background: rgba(16, 185, 129, 0.9);">Tax Form • W-2</span>
                        <img src="{{ asset('images/NYCFreeTaxPrep-Documents-W2.webp') }}" alt="W-2 Form Preview" class="template-thumb-img">
                    </div>
                    <div class="template-card-body">
                        <div>
                            <h5 class="font-weight-bold text-dark mb-1" style="font-size: 1.15rem; color: #0f172a;">Official W-2 Tax Form</h5>
                            <p class="small text-slate-500 mb-3">IRS-compliant Wage and Tax Statement form template for annual employee tax filings.</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <button type="button" class="btn btn-light btn-sm font-weight-semibold" data-toggle="modal" data-target="#templateModal" style="border-radius: 8px; border: 1px solid #cbd5e1; font-size: 0.825rem; color: #475569;">
                                <i class="fa fa-eye mr-1"></i> Preview
                            </button>
                            <a href="{{ route('w2form') }}" class="btn btn-sm font-weight-bold text-white px-3" style="background: #10b981; border: none; border-radius: 8px; font-size: 0.825rem;">
                                Use Template <i class="fa fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Interactive Fullscreen Template Carousel Modal -->
<div class="modal fade" id="templateModal" tabindex="-1" role="dialog" aria-labelledby="templateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="max-width: 1100px;">
        <div class="modal-content overflow-hidden border-0 shadow-lg" style="border-radius: 24px;">
            
            <div class="modal-header border-0 px-4 py-3" style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <div class="d-flex align-items-center text-white">
                        <i class="fa fa-file-text-o mr-3" style="font-size: 1.25rem; color: #818cf8;"></i>
                        <div>
                            <h5 class="modal-title font-weight-bold text-white mb-0" style="font-size: 1.1rem;">Template Previewer</h5>
                            <span class="small text-white-50">High-Resolution PDF Layout Viewer</span>
                        </div>
                    </div>
                    <button type="button" class="close text-white opacity-75 hover-opacity-100" data-dismiss="modal" aria-label="Close" style="font-size: 1.75rem; outline: none; background: transparent; border: 0; text-shadow: none;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <div class="modal-body p-4 text-center" style="background: #f8fafc;">
                <div id="templates" class="carousel slide" data-ride="carousel">
                    
                    <div class="carousel-inner p-2">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/preview.png') }}" class="img-fluid shadow-md" style="max-height: 520px; width: auto; border-radius: 16px;">
                            <div class="mt-3">
                                <h6 class="font-weight-bold text-dark mb-0">Whitaker Template (Landscape)</h6>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/paystub_image.webp') }}" class="img-fluid shadow-md" style="max-height: 520px; width: auto; border-radius: 16px;">
                            <div class="mt-3">
                                <h6 class="font-weight-bold text-dark mb-0">Executive Modern Stub (Portrait)</h6>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/NYCFreeTaxPrep-Documents-W2.webp') }}" class="img-fluid shadow-md" style="max-height: 520px; width: auto; border-radius: 16px;">
                            <div class="mt-3">
                                <h6 class="font-weight-bold text-dark mb-0">Official W-2 Form (Tax Statement)</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Nav Controls -->
                    <a class="carousel-control-prev" href="#templates" role="button" data-slide="prev" style="width: 50px;">
                        <span class="p-3 rounded-circle" style="background: rgba(15, 23, 42, 0.7); color: #ffffff;">
                            <i class="fa fa-chevron-left"></i>
                        </span>
                    </a>
                    <a class="carousel-control-next" href="#templates" role="button" data-slide="next" style="width: 50px;">
                        <span class="p-3 rounded-circle" style="background: rgba(15, 23, 42, 0.7); color: #ffffff;">
                            <i class="fa fa-chevron-right"></i>
                        </span>
                    </a>

                </div>
            </div>

            <div class="modal-footer border-0 px-4 py-3 bg-white d-flex align-items-center justify-content-between">
                <button type="button" class="btn btn-light font-weight-semibold" data-dismiss="modal" style="border-radius: 10px; border: 1px solid #cbd5e1; color: #475569;">Close Preview</button>
                <a href="{{ route('usa.payStub') }}" class="btn font-weight-bold text-white px-4" style="background: #4f46e5; border-radius: 10px;">
                    Select & Create Paystub <i class="fa fa-arrow-right ml-1"></i>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
