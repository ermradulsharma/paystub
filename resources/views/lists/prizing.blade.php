@extends('layouts.app')
@section('content')
    <div class="my-5">
        <div class="container pl-0 pr-0 " style="max-width:1420px; border: 1px solid red; background: #E8E6E6;">
            <div class="">
                <div class="w-100 text-center p-1 prizeHeader" style="">
                    <h2 class="text-light">Complete Your Order</h2>
                </div>
                <div class="w-100 text-center pb-5">
                    <h3 class="mt-2 font-weight-normal">Congratulations. Select your plan to gain unlimited access. Paystubs
                        & Tax Forms</h3 class="mt-2">
                </div>
            </div>
            <div class="mx-lg-5 px-lg-5">
                <div class="m-lg-5 px-lg-5">
                    <div class="row">
                        @if (isset($plans) && $plans->count() > 0)
                            @foreach ($plans as $key => $plan)
                                <div class="col-lg-4 d-flex justify-content-center">
                                    <div class="prizebox2 suscription" role="button" data-plan="{{ $plan->id }}">
                                        <h3 class="my-5 pb-5 prizeh3">{{ $plan->name }}</h3>
                                        <div class="right-img asdf">
                                            <img src="images/green1.png">
                                            <div class="value-text">
                                                <p>${{ $plan->price }}</p>
                                            </div>
                                        </div>
                                        <div class="mx-4">
                                            <div class="d-flex listItem">
                                                <i class="fa fa-check priceicon"></i>
                                                <p class="prize-p">{{ $plan->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Center the loader */
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 9999;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 5s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }

        #loaderDiv {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            background: #00000054;
            z-index: 999;
        }
    </style>
    <div id="loaderDiv" style="display: none;">
        <div id="loader"></div>
    </div>
@endsection

@section('script')
    <script>
        $('.suscription').click(function() {
            var type = "{{ request()->get('type') }}";
            console.log('type', type);
            var planId = $(this).data('plan');
            window.location.href = "{{ route('processTransaction') }}?plan=" + planId +"&type=" + type;
            return false;
        });
    </script>
@endsection
