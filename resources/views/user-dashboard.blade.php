@extends('layouts.app')

@section('content')


<div>
    <div class="container mt-5" style="max-width: 1500px;">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-end">
                <div class="d-flex">
                    <div class="usericon">
                        <i class="fa fa-user"></i>
                    </div>
                    <p class="m-auto" style="padding: 0 0px 0px 10px; font-size:19px;">Welcome, Mike</p>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-5" style="border:1px solid red; background: #E8E6E6;">
            <div class="col-lg-12 ">
                <table class="user-table">
                    <thead>
                        <tr>
                            <td>Date Created</td>
                            <td>User Name</td>
                            <td>Reference12345</td>
                            <td>Download Paystub</td>
                            <td>Email</td>
                            <td class="text-center">Edit Paystub</td>
                            <td class="delpdf">Delet PDF</td>
                            <td></td>

                        </tr>

                        <tr>
                            <td>12-11-2023</td>
                            <td>jessica pinankte</td>
                            <td>W-2 34567678</td>
                            <td>
                                <button class="d-flex userbtn">

                                    Download
                                    <div>

                                        <i class="fa fa-download" style="padding: 0px 0px 0px 9px;"></i></i>
                                    </div>
                                </button>
                            </td>
                            <td>
                            <img src="images/emaillogo.png" style="width:50px;">
                            </td>
                            <td> <div class="pen">
                                <i class="fa fa-pencil" style="color: #777070;"></i>
                                </div>
                            </td>
                            <td>
                                <button class="delbtn">
                                        DELETE
                                </button>
                            </td>
                            <td> <div class="text-left mt-1">
            <button class="previewbtn text-capitalize">Preview Your Paystub <i class="fa fa-eye" style="font-size: 30px; margin-left: 7px;"></i></button>
        </div></td>

                        </tr>
                    </thead>
                    <thead>
                      

                        <tr>
                            <td>12-11-2023</td>
                            <td>jessica pinankte</td>
                            <td>W-2 34567678</td>
                            <td>
                                <button class="d-flex userbtn">

                                    Download
                                    <div>

                                        <i class="fa fa-download" style="padding: 0px 0px 0px 9px;"></i></i>
                                    </div>
                                </button>
                            </td>
                            <td>
                            <img src="images/emaillogo.png" style="width:50px;">
                            </td>
                            <td> <div class="pen">
                                <i class="fa fa-pencil" style="color: #777070;"></i>
                                </div>
                            </td>
                            <td>
                                <button class="delbtn">
                                        DELETE
                                </button>
                            </td>
                            <td> <div class="text-left mt-1">
            <button class="previewbtn text-capitalize">Preview Your Paystub <i class="fa fa-eye" style="font-size: 30px; margin-left: 7px;"></i></button>
        </div></td>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-end">
                <button class="user-checkbtn">Continue to Checkout</button>
            </div>
        </div>
        <div class="row justify-content-end">
        <p style="margin-top: 0;" class="">Click on Continue, to  complete your order</p>
        </div>
    </div>
</div>
@endsection