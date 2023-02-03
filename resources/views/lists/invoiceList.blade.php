@extends('layouts.app')
@section('content')

<div class="my-5">
    <div class="container py-5" style="max-width: 1500px;">
        <div class="row" style="margin:0 auto;">
            <div class="w-100" style="text-align: right;">
                <div class="d-flex justify-content-end">
                    <img src="{{asset('images/user1.png')}}" alt="" width="35px">
                    <h5 class="mt-2 ml-2 font-weight-bold"> Welcom, {{Auth::user()->email ?? ""}}</h5>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-center" style="border:3px solid #FF6161; border-style: inset;background:#E8E6E6;">
                    <thead>
                        <tr>
                            <th class="text-center" style="padding: 1.5em .5em;border:none;">Date Created</th>
                            <th class="text-center" style="padding: 1.5em .5em;border:none;">User Name</th>
                            <th class="text-center" style="padding: 1.5em .5em;border:none;">Reference 051588</th>
                            <th class="text-center" style="padding: 1.5em .5em;border:none;">Download Paystub</th>
                            <th class="text-center" style="padding: 1.5em .5em;border:none;">Email</th>
                            <th class="text-center" style="padding: 1.5em .5em;border:none;">Edit Paystub</th>
                            <th class="text-center" style="padding: 1.5em .5em;border:none;">Delete PDF</th>
                            <th class="text-center" style="padding: 1.5em .5em;border:none;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoiceList as $invoice)
                        <tr>
                            <th class="text-center" style="padding: 1.5em .5em;border:none;">{{date('m-d-Y', strtotime($invoice->created_at))}}</th>
                            <th class="text-center" style="padding: 1.5em .5em;border:none;">{{$invoice->title}}</th>
                            <th class="text-center" style="padding: 1.5em .5em;border:none;">{{$invoice->reference}}</th>
                            <th class="text-center" style="padding: .9em .5em;border:none;">
                                <a class="btn btn-outline-dark py-2 downloiadBtn" href="{{$invoice->pdf}}" download>Dounload &nbsp;<i class="fa fa-arrow-circle-down 2x" aria-hidden="true"></i></a>
                            </th>
                            <th class="text-center" style="padding: 1em .5em;border:none;">
                                <a href="{{ route('invoiceMail', $invoice->id) }}">
                                    <img src="{{asset('images/emaillogo.png')}}" alt="" width="45px">
                                </a>
                            </th>
                            <th class="text-center" style="padding: 1em .5em;border:none;">
                                <a href="{{ route('invoice-Usa-Edit', $invoice->id) }}">
                                    <img src="{{asset('images/edit-icon.png')}}" alt="" width="45px">
                                </a>
                            </th>
                            <th class="text-center" style="padding: 1em .5em;border:none;">
                                <a class="delbtn" href="javascript:void(0);" onclick="event.preventDefault();if(confirm('Are you sure! you want to delete this?')){document.getElementById('delete-form-{{$invoice->id}}').submit();}"> Delete</a>
                                <form id="delete-form-{{$invoice->id}}" action="{{ route('invoiceDelete', $invoice->id) }}" method="POST" style="display: none;">
                                    {{csrf_field()}}
                                </form>
                            </th>
                            <th class="text-center" style="padding: 1em .5em;border:none;">
                                <a href="javascript:void(0);" class="previewbtnInvoice text-capitalize">
                                    Preview Your Paystub &nbsp;<i class="fa fa-eye"></i></a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-100" style="text-align: right;">
                <a href="{{ route('prizing') }}" class="user-checkbtn"><b>Continue to Checkout</b></a>
                <h6 class="mt-3 font-weight-bold">Click on Continue, to complete your order</h6>
            </div>
        </div>
    </div>
</div>
@endsection