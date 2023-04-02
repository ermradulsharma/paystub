@extends('layouts.app')
@section('content')
    <div class="my-5">
        <div class="container py-5" style="max-width: 1500px;">
            <div class="row" style="margin:0 auto;">
                <div class="w-100" style="text-align: right;">
                    <div class="d-flex justify-content-end">
                        <img src="{{ asset('images/user1.png') }}" alt="" width="35px;" height="35px">
                        <h5 class="mt-2 ml-2 font-weight-bold"> Welcome, {{ Auth::user()->email ?? '' }}</h5>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-center"
                        style="border:3px solid #FF6161; border-style: inset;background:#E8E6E6;">
                        <thead>
                            <tr>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">Date Created</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">User Name</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">Reference No.</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">Download Paystub</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">Email</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">Edit PaystubX</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none; text-transform:capitalize;">Delete PDF</th>
                                <th class="text-center" style="padding: 1.5em .5em;border:none;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoiceList as $key => $invoice)
                            {{$invoice}}
                                @if ($invoice->type != 'w2form')

                                    @if($key == 0)
                                        @php($membership = $invoice->membership)
                                    @endif
                                    <tr>
                                        <th class="text-center" style="padding: 1.5em .5em;border:none;">{{ date('m-d-Y', strtotime($invoice->created_at)) }} </th>
                                        <th class="text-center" style="padding: 1.5em .5em;border:none;">{{ $invoice->title }}</th>
                                        <th class="text-center" style="padding: 1.5em .5em;border:none;">{{ $invoice->reference }}</th>
                                        <th class="text-center" style="padding: .9em .5em;border:none;">
                                            <a class="btn btn-outline-dark py-2 downloiadBtn" href="{{ $invoice->pdf }}" download> Download <i class="fa fa-arrow-circle-down 2x" aria-hidden="true"></i></a>
                                        </th>
                                        <th class="text-center" style="padding: 1em .5em;border:none;">
                                            <a href="{{ route('invoiceMailId', $invoice->id) }}">
                                                <img src="{{ asset('images/emaillogo.png') }}" alt="" width="45px"/>
                                            </a>
                                        </th>
                                        <th class="text-center" style="padding: 1em .5em;border:none;">
                                            <a href="{{ route('invoiceEdit', $invoice->id) }}">
                                                <img src="{{ asset('images/edit-icon.png') }}" alt="" width="45px"/>
                                            </a>
                                        </th>
                                        <th class="text-center" style="padding: 1em .5em; border:none;">
                                            <a class="delbtn" href="javascript:void(0);"
                                                onclick="event.preventDefault();
                                                    if(confirm('Are you sure! you want to delete this?')){
                                                        document.getElementById('delete-form-{{ $invoice->id }}').submit();
                                                        }">Delete
                                            </a>
                                            <form id="delete-form-{{ $invoice->id }}" action="{{ route('invoiceDelete', $invoice->id) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </th>
                                        <th class="text-center" style="padding: 1em .5em;border:none;">
                                            <a href="javascript:void(0);" class="previewbtnInvoice text-capitalize" data-pdf="{{ $invoice->pdf }}">Preview Your Paystub &nbsp;<i class="fa fa-eye"></i>
                                            </a>
                                        </th>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="w-100" style="text-align: right;">
                    <a href="{{ $membership == 0 ? route('prizing') : route('invoiceMail') }}"
                        class="user-checkbtn"><b>Continue to Checkout</b></a>
                    <h6 class="mt-3 font-weight-bold">Click on Continue, to complete your order</h6>
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
    </script>
@endsection
