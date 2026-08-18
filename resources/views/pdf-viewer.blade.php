@extends('layouts.app')

@section('content')
<div class="rich-page-wrapper py-5">
    <div class="container" style="max-width: 1300px;">

        <!-- Rich Dark Mesh Hero Banner -->
        <div class="rich-hero-banner text-center mb-4">
            <div class="rich-pill-badge mb-3">
                <span class="wow-pulse-dot"></span> DomPDF 2.0 Live Vector Stream Renderer
            </div>
            <h1 class="rich-hero-title">PDF Template Live Viewer</h1>
            <p class="text-slate-300 max-w-2xl mx-auto mb-0" style="font-size: 1.05rem; line-height: 1.6;">
                Inspect live DomPDF rendering output for all payroll and W-2 templates in <code>resources/views/allForms</code> in real-time.
            </p>
        </div>

        <!-- Interactive Control Bar Card -->
        <div class="rich-glass-card p-4 mb-4">
            <div class="row align-items-center gy-3">
                
                <!-- Category Select -->
                <div class="col-lg-3 col-md-4 mb-3 mb-md-0">
                    <label for="categorySelect" class="font-weight-semibold text-slate-700 mb-1 small text-uppercase" style="letter-spacing: 0.5px; font-weight: 700; color: #475569;">Select Category</label>
                    <select id="categorySelect" class="form-control font-weight-bold shadow-none custom-select" style="border-radius: 12px; height: 48px; border: 1.5px solid #cbd5e1; font-size: 0.95rem; color: #0f172a;">
                        @foreach($allTemplates as $cat => $files)
                            <option value="{{ $cat }}" {{ $cat === $formType ? 'selected' : '' }}>
                                {{ strtoupper($cat) }} Templates ({{ count($files) }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Template Select -->
                <div class="col-lg-4 col-md-5 mb-3 mb-md-0">
                    <label for="templateSelect" class="font-weight-semibold text-slate-700 mb-1 small text-uppercase" style="letter-spacing: 0.5px; font-weight: 700; color: #475569;">Select Template File</label>
                    <select id="templateSelect" class="form-control font-weight-bold shadow-none custom-select" style="border-radius: 12px; height: 48px; border: 1.5px solid #cbd5e1; font-size: 0.95rem; color: #0f172a;">
                        @foreach($allTemplates[$formType] ?? [] as $tFile)
                            <option value="{{ $tFile }}" {{ $tFile === $template ? 'selected' : '' }}> {{ $tFile }}.blade.php </option>
                        @endforeach
                    </select>
                </div>

                <!-- Paper Orientation Select -->
                <div class="col-lg-2 col-md-3 mb-3 mb-md-0">
                    <label for="orientationSelect" class="font-weight-semibold text-slate-700 mb-1 small text-uppercase" style="letter-spacing: 0.5px; font-weight: 700; color: #475569;">Paper Format</label>
                    <select id="orientationSelect" class="form-control font-weight-bold shadow-none custom-select" style="border-radius: 12px; height: 48px; border: 1.5px solid #cbd5e1; font-size: 0.95rem; color: #0f172a;">
                        <option value="portrait" {{ $orientation === 'portrait' ? 'selected' : '' }}>Portrait (A4)</option>
                        <option value="landscape" {{ $orientation === 'landscape' ? 'selected' : '' }}>Landscape (A4)</option>
                    </select>
                </div>

                <!-- Action Triggers -->
                <div class="col-lg-3 col-md-12 text-md-right text-center pt-md-4">
                    <a id="openNewTabBtn" href="{{ route('pdf.stream', ['form_type' => $formType, 'template' => $template, 'orientation' => $orientation]) }}" target="_blank" class="btn btn-indigo text-white font-weight-bold px-3 py-2.5 shadow-sm" style="background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%); border-radius: 12px; font-size: 0.875rem;">
                        Open PDF New Tab <i class="fa fa-external-link ml-1"></i>
                    </a>
                </div>

            </div>
        </div>

        <!-- Live DomPDF Render Canvas Container -->
        <div class="card border-0 overflow-hidden shadow-lg" style="border-radius: 24px; border: 1px solid #cbd5e1; background: #2a2d32;">
            <div class="card-header border-0 py-3 px-4 d-flex align-items-center justify-content-between" style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); color: #ffffff;">
                <div class="d-flex align-items-center">
                    <i class="fa fa-file-pdf-o text-danger mr-3" style="font-size: 1.3rem;"></i>
                    <div>
                        <h6 class="font-weight-bold text-white mb-0" id="canvasTitle">Viewing: allForms/{{ $formType }}/{{ $template }}.blade.php</h6>
                        <span class="small text-white-50">DomPDF Stream Output</span>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-light font-weight-semibold" onclick="reloadPdfFrame()" style="border-radius: 8px; font-size: 0.8rem;">
                    <i class="fa fa-refresh mr-1"></i> Reload Stream
                </button>
            </div>
            
            <div class="card-body p-0 position-relative">
                <iframe id="pdfFrame" src="{{ route('pdf.stream', ['form_type' => $formType, 'template' => $template, 'orientation' => $orientation]) }}" style="width: 100%; height: 860px; border: none; background: #525659;"></iframe>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const allTemplatesData = @json($allTemplates);
    const categorySelect = document.getElementById("categorySelect");
    const templateSelect = document.getElementById("templateSelect");
    const orientationSelect = document.getElementById("orientationSelect");
    const pdfFrame = document.getElementById("pdfFrame");
    const openNewTabBtn = document.getElementById("openNewTabBtn");
    const canvasTitle = document.getElementById("canvasTitle");

    function updateTemplateOptions() {
        const cat = categorySelect.value;
        const files = allTemplatesData[cat] || [];
        templateSelect.innerHTML = "";
        
        files.forEach(file => {
            const opt = document.createElement("option");
            opt.value = file;
            opt.textContent = file + ".blade.php";
            templateSelect.appendChild(opt);
        });

        loadPdf();
    }

    function loadPdf() {
        const cat = categorySelect.value;
        const tmpl = templateSelect.value;
        const orient = orientationSelect.value;

        if (!cat || !tmpl) return;

        const streamUrl = `/pdf-viewer-stream/${cat}/${tmpl}?orientation=${orient}`;
        const pageUrl = `/pdf-viewer/${cat}/${tmpl}?orientation=${orient}`;

        pdfFrame.src = streamUrl;
        openNewTabBtn.href = streamUrl;
        canvasTitle.textContent = `Viewing: allForms/${cat}/${tmpl}.blade.php`;
        
        window.history.pushState(null, "", pageUrl);
    }

    categorySelect.addEventListener("change", updateTemplateOptions);
    templateSelect.addEventListener("change", loadPdf);
    orientationSelect.addEventListener("change", loadPdf);

    window.reloadPdfFrame = function() {
        pdfFrame.src = pdfFrame.src;
    };
});
</script>
@endsection
