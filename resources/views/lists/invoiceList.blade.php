@extends('layouts.app')
@section('content')

<div class="my-5">
    <div class="container py-5" style="max-width: 1430px;">
        <div class="row" style="margin:0 auto;">
            <div class="w-100" style="text-align: right;">
                <div class="d-flex justify-content-end">
                    <img src="{{asset('images/user1.png')}}" alt="" width="35px">
                    <h5 class="mt-2 ml-2 font-weight-bold"> Welcom, {{Auth::user()->email ?? ""}}</h5>
                </div>
            </div>
            <table class="table text-center" style="border:3px solid #FF6161; border-style: inset;background:#E8E6E6;">
                <thead>
                    <tr>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">Date Created</th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">User Name</th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">Reference 051588</th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">Download Paystub</th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">Email</th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">Edit Paystub</th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">Delete PDF</th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoiceList as $invoice)
                    <tr>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">{{date('m-d-Y', strtotime($invoice->created_at))}}</th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">{{$invoice->title}}</th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">{{$invoice->reference}}</th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">
                            <a class="btn btn-outline-dark px-4 py-2" style="color:#8B6755;border-style: outside;background: #FFFFFF;border-radius: 50px;border: 2px solid rgb(139, 103, 85);" href="{{$invoice->pdf}}" download>Dounload <i class="fa fa-arrow-circle-down 2x" aria-hidden="true"></i></a>
                        </th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">
                            <a href="">
                                <img src="{{asset('images/emaillogo.png')}}" alt="" width="50px">
                            </a>
                        </th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">
                            <a href="">
                                <img src="{{asset('images/edit-icon.png')}}" alt="" width="50px">
                            </a>
                        </th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">
                            <a class="btn py-2 w-100 mt-1 btn-danger" style="background: #FF0000;" href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('delete-form-{{$invoice->id}}').submit();"><i class="fa fa-sign-out"></i> Log out</a>
                            <form id="logout-form-{{$invoice->id}}" action="{{ route('invoiceDelete', $invoice->id) }}" method="POST" style="display: none;">
                                {{csrf_field()}}
                                {{}}
                            </form>
                        </th>
                        <th class=" text-center" style="padding: 1.5em 1em;border:none;">
                            <a href="" class="btn py-2 w-100 mt-1 btn-danger" style="background: #FF0000;border-radius: 10px;">Preview Your Paystub <i class="fa fa-eye"></i></a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="w-100" style="text-align: right;">
                <a href="" class="btn btn-danger btn-lg px-5 mr-2" style="border-radius: 50px;background: #FF0000;"><b>Continue to Checkout</b></a>
                <h6 class="mt-3 font-weight-bold">Click on Continue, to complete your order</h6>
            </div>
        </div>
    </div>
</div>
@endsection