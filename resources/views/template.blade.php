@extends('layouts.app')
@section('content')
<div class="row mt-2" style="background:#ae643f">

    <div class="container mb-5">

        <div class="mt-4 text-center" style="font-size:34px; font-weight: 500; color:white;letter-spacing: 1px;">
            If template format is Landscape this is how it will look.. If the template is Portrait make it portrait.
        </div>

        <div class="card-header mt-5 text-bold text-white" style="background:#0e866c; border:none;">
            <div class="text-white" style="font-size: 24px;">Preview Template</div>
        </div>

        <div class="card pb-3 px-3">

            <div class="d-flex  my-2">
                <a class="  badge-pill py-1 px-4  m-auto" href="#templates" data-slide="prev"
                    style="color: #0e866c; background:#ffffff; font-size:22px; border:#0e866c 2px solid;">Previous</a>
                <div class="d-flex m-auto">
                    <div class=" mt-4 view-temp " style="">Whitaker Template</div>
                    <div>
                        <button class="">Use This Template</button>
                    </div>
                </div>
                <a class=" my-3 badge-pill py-1 px-4  mr-3 m-auto " href="#templates" data-slide="next"
                    style="color: #0e866c; background:#ffffff; font-size:22px; border:#0e866c 2px solid;">Next</a>
            </div>
            <div class="template-box">
                <div class="container">
                    <div id="templates" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/preview.png" width="1050" height="500">
                            </div>
                            <div class="carousel-item">
                                <img src="images/preview.png" width="1050" height="500">
                            </div>
                            <div class="carousel-item">
                                <img src="images/preview.png" alt="New York" width="1050" height="500">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev ml-3" href="#templates" data-slide="prev">
                            <i class="fa fa-chevron-circle-left tempangle" aria-hidden="true"></i>
                        </a>
                        <a class="carousel-control-next" href="#templates" data-slide="next">
                            <i class="fa fa-chevron-circle-right tempangle" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
