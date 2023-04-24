@extends('layouts.app')
@section('content')
    <style>
        .btn-group a {
            background-color: #e8e6e6;
            padding: 5px 40px;
            border-top: 2px solid #FF6161;
            border-bottom: none;
            border-radius: 0;
            transition: all 0.3s ease-in-out;
            box-shadow: none !important;

        }

        a.btn.active {
            color: white;
            background: #0b2f5b;
            font-size: 16px;
            font-family: emoji;
            border: 4px double;
            border-top: 2px solid #FF6161;

        }


        table.table.text-center {
            position: relative;
        }

        table.table.text-center:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 353px;
            height: 2px;
            background: #e8e6e6;
        }

        table.table.text-center:after {
            content: "";
            position: absolute;
            left: 0;
            width: 353px;
            height: 1px;
            background: #e8e6e6;
            top: -1px;
        }

        .flex-row-invoice {
            flex-direction: row-reverse
        }

        @media(max-width:768px) {
            table th {
                font-size: 9px;
                vertical-align: top !important;


            }

            .downloiadBtn {
                font-size: 10px;
            }

            .mail-logo {
                width: 30px;
            }

            .delbtn {
                font-size: 10px;
            }

            .previewbtnInvoice {
                font-size: 10px !important;
            }

            .user-checkbtn {
                font-size: 12px;
                padding: 10px 25px 10px 25px;
            }

            .flex-row-invoice {
                flex-direction: column;
            }

            h5.mt-2.ml-2.font-weight-bold.subscription-text {
                font-size: 15px;
                position: relative;
                top: 35px;
            }
        }

        @media(max-width:425px) {
            h5.mt-2.ml-2.font-weight-bold.subscription-text {
                font-size: 15px;
                position: unset;
                top: 0;
            }

            .flex-row-invoice {
                flex-direction: row-reverse;
                justify-content: start !important;
            }

            .btn-group a {
                border-bottom: 2px solid #FF6161 !important;
                font-size: 13px;


            }

            a.btn.active {
                font-size: 13px;
            }

            table.table.text-center:before {

                width: 338px;

            }

            table.table.text-center:after {
                width: 338px;
            }


        }

        @media(max-width:375px) {
            .btn-group a {
                padding: 5px 25px;
            }

            table.table.text-center:before {

                width: 248px;

            }

            table.table.text-center:after {
                width: 248px;
            }

        }
    </style>
    <div class="my-5">
        <div class="container" style="max-width: 1500px;">
            <div class="row" style="margin:0 auto;">

                <div class="row  justify-content-between flex-row-invoice">
                    <div class=" justify-content-end" style="text-align: right;">
                        <h5 class="mt-2 ml-2 font-weight-bold subscription-text" style=" color:#FF6161; ">Watermark is
                            removed
                            after subscription</h5>
                    </div>
                    <div class="btn-toolbar justify-content-start" role="toolbar" aria-label="Toolbar with button groups"
                        style="text-align: left;">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('invoiceList') }}?type=usa"
                                class="btn {{ request()->query('type') == 'usa' ? 'active' : (request()->query('type') == null ? 'active' : '') }} "
                                style="border-right:none; border-left:2px solid #FF6161;border-bottom:none;">USA</a>
                            <a href="{{ route('invoiceList') }}?type=canada"
                                class="btn {{ request()->query('type') == 'canada' ? 'active' : '' }} "
                                style="border-left:none; border-right:none;border-bottom:none; max-width:143.5px;">CANADA</a>
                            <a href="{{ route('invoiceList') }}?type=uk"
                                class="btn {{ request()->query('type') == 'uk' ? 'active' : '' }} "
                                style="border-left:none; border-right:2px solid #FF6161;border-bottom:none;">UK</a>
                        </div>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table text-center" style="border:2px solid #FF6161 !important;border-bottom:none !important; background:#E8E6E6;">
                        <thead>
                            <tr>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">
                                    Date Created</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">
                                    User Name</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">
                                    Reference No.</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">
                                    Download Paystub</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">
                                    Email</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">
                                    Edit PaystubX</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">
                                    Delete PDF</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none;"></th>
                            </tr>
                        </thead>

                        <tbody style="border-bottom:2px solid #FF6161 !important;">
                            {{-- {{$invoiceList}} --}}
                            @if (count($invoiceList) > 0)
                                @foreach ($invoiceList ?? [] as $key => $invoice)
                                    @if ($invoice->type != 'w2form')
                                        @if ($key == 0)
                                            @php($membership = $invoice->membership ?? 0)
                                        @endif
                                        <tr>
                                            <th class="text-center" style="padding: 1.5em .5em;border:none;">
                                                {{ date('m-d-Y', strtotime($invoice->created_at)) }} </th>
                                            <th class="text-center" style="padding: 1.5em .5em;border:none;">
                                                {{ $invoice->title }}</th>
                                            <th class="text-center" style="padding: 1.5em .5em;border:none;">
                                                {{ $invoice->reference }}</th>
                                            <th class="text-center" style="padding: .9em .5em;border:none;">
                                                <a class="btn btn-outline-dark py-2 downloiadBtn" href="{{ $invoice->pdf }}"
                                                    download>
                                                    Download <i class="fa fa-arrow-circle-down 2x"
                                                        aria-hidden="true"></i></a>
                                            </th>
                                            <th class="text-center" style="padding: 1em .5em;border:none;">
                                                <a href="{{ route('invoiceMailId', $invoice->id) }}">
                                                    <img class="mail-logo" src="{{ asset('images/emaillogo.png') }}"
                                                        alt="" width="45px" />
                                                </a>
                                            </th>
                                            <th class="text-center" style="padding: 1em .5em;border:none;">
                                                <a href="{{ route('invoiceEdit', $invoice->id) }}">
                                                    <img class="mail-logo" src="{{ asset('images/edit-icon.png') }}"
                                                        alt="" width="45px" />
                                                </a>
                                            </th>
                                            <th class="text-center" style="padding: 1em .5em; border:none;">
                                                <a class="delbtn" href="javascript:void(0);"
                                                    data-trash="{{ route('invoiceDelete', $invoice->id) }}">Delete
                                                </a>
                                                {{-- onclick="event.preventDefault();
                                if(confirm('Are you sure! you want to delete this?')){
                                document.getElementById('delete-form-{{ $invoice->id }}').submit();
                                }" --}}
                                                {{-- <form id="delete-form-{{ $invoice->id }}"
                                    action="{{ route('invoiceDelete', $invoice->id) }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form> --}}
                                            </th>
                                            <th class="text-center" style="padding: 1em .5em;border:none;">
                                                <a href="javascript:void(0);" class="previewbtnInvoice text-capitalize"
                                                    data-pdf="{{ $invoice->pdf }}">Preview Your Paystub &nbsp;<i
                                                        class="fa fa-eye"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="w-100" style="text-align: right;">
                        <a href="@if (isset($membership)) {{ $membership == 0 ? route('prizing') : route('invoiceMail') }} @else {{ route('prizing') }} @endif"
                            class="user-checkbtn" data-count="{{ count($invoiceList) }}"><b>Continue to Checkout</b></a>
                        <h6 class="mt-3 font-weight-bold">Click on Continue, to complete your order</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade trashModal" id="deleteTemplate">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title"><img src="{{ asset('/') }}images/Paystub X.webp" class="icon"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding-bottom:30px;">
                    <h5 class="text-center" style="text-transform:capitalize;">Do you want to delete?</h5>
                    <div class=" text-center mt-4">
                        {{-- <h5 style="color: #457bbe;" class="mt-4 text-center">Almost There!</h5> --}}
                        <form id="trash-temp" action="" method="POST" class="text-center">
                            @csrf

                            <button class="previewbtn" type="submit">Yes</button>
                            <button class="previewbtn bottom-close" type="button">NO</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <div class="modal fade" id="tempViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed src="" type="" id="tempView" allowtransparency="false"
                        style="background-color : transparent;" frameborder="0" width="100%" height="800">
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.previewbtnInvoice').click(function() {
            var pdf = $(this).data('pdf');
            $('#tempView').attr('src', pdf + '?embedded=true#toolbar=0');
            // $('#tempView').html(response.data);
            $('#tempViewModal').modal('show');
        })
        $(document).on('click', '.user-checkbtn', function(e) {
            var dataCount = $(this).data('count');
            if (dataCount <= 0) {
                e.preventDefault();
                toastr.error("Please First Generate Paystub.");
            }

        });

        $(document).on('click', '.delbtn', function(e) {
            var trashPath = $(this).data('trash');
            $('#trash-temp').attr('action', trashPath);
            $('#deleteTemplate').modal('show');

        });
    </script>
@endsection
