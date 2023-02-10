@extends('layouts.app')
@section('content')
    <div style="background-color: #f75656ed;" class="mt-2">

        <div class="container" style="max-width: 1580px;">
            <div class="row" style="margin:0 auto;">
                <div class="col-lg-4  text-center2">
                    <div style="" class="text-center canadaheading">Instantly Generate your Professional Canadian Pay
                        Stubs </div>

                    <p style="font-weight: 400;font-size:21px;font-family: 'Futura LT';" class="mb-0 can-p">
                        Generate Your Canadian Pay Stub in Seconds with Paystubx. The #1 Leading in the game.</p>
                    <p class="mb-5 can-p1 "
                        style="font-size:larger;font-weight: 200;line-height: 2em;font-family: 'Futura LT';">Online secure
                        web-based pay stub generator,</br> straightforward to use, instant pay stub delivery, and</br> free
                        pay stub preview. Simple as ABC.</p>


                    <div class="mt-5 justify-content-center ">
                        <a style="font-family: 'Futura LT';"class="btn btn-lg  mt-2 p-2 btn-danger CreatePaystub "
                            href="{{ route('canada.payStub') }}">Create Paystub</a>
                    </div>

                    <div class="mt-5 pt-2 justify-content-center">
                        <a href="https://www.google.com/" target="_blank"><img class="storbtn "
                                src="{{ asset('images/Google_Play_Store_badge_EN.webp') }}"></a>
                        <a href="https://www.google.com/" target="_blank"><img class="storbtn ml-5"
                                src="{{ asset('images/Download_on_the_App_Store_Badge.webp') }}"></a>
                    </div>
                </div>

                <div class="col-lg-8" style="background-position-x:right;left:12px; margin:auto;">
                    <img src="{{ asset('images/computer.webp') }}" class="w-100">
                </div>
            </div>
        </div>




    </div>

    <div class="pt-5" style="background-color: #E9E6E6;">
        <div class="container" style="max-width: 1580px;">
            <div class="row" style="margin:0 auto;">
                <div class="col-md-6 col-sm-6 justifuy-content-center">
                    <h1 class="display-4"
                        style="font-family: helvetica-w01-bold,helvetica-w02-bold,helvetica-lt-w10-bold,sans-serif;font-weight: 600;">
                        READY TO GET STARTED?</h1>
                    <p style=" font-size: 22px; font-weight: 200;line-height: 30px; font-family: 'Futura LT';">Very easy
                        platform to generate </br> your Canadian Paystub, and </br> Payslip in seconds.
                        Get your</br> data ready, customize your</br> paystub, generate, download,</br> email, or
                        print it.
                    </p>
                </div>

                <div class="col-md-6 col-sm-6 justifuy-content-center text-center">
                    <h2 class="mb-5" style="font-weight:600;">Who can use Paystub<span class="text-danger">x</span>?</h2>
                    <div class="row">
                        <div class="col-md-6" style="border-right:1px solid black;">
                            <img src="{{ asset('images/employericon.webp') }}" class="emp-img">
                            <div class="employee-font">Employers</div>
                            <p style="font-size:15px;font-family: 'Futura lt';" class="mt-3">Paystubx is a great tool for
                                employers who</br> manage payroll on
                                their own. Employers</br> can easily create professional paystubs,</br> with the option to
                                download them or</br> email them directly to their employees,</br> contractors, and gig
                                workers.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('images/sole-propritors') }}.webp" class="emp-img">
                            <div class="employee-font">Sole Proprietors</div>
                            <p style="font-size:15px;font-family: 'Futura lt';" class="mt-3">Sole proprietors or
                                self-employed individuals<br> can act as their
                                own bosses and pay themselves</br> whenever they want. Though they may not need</br> to
                                withhold
                                taxes, they still need paystubs to</br> show proof of income. Paystubx allows you to</br>
                                generate
                                professional paystubs instantly.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-12 m-auto pl-0 padding">
                        <div style=" " class="mb-4 canadah4">Why should you
                            choose Paystub<span class="text-danger">x</span></br> to generate pay stubs online?
                        </div>

                        <h2 style=" " class="ml-3 canadah2">Accurate
                            Payroll Calculations that include </h2>
                        <ul style="font-weight: 200;font-size: 20px;line-height: 41px;color: #000000;font-family: 'Futura LT';"
                            class="mt-2">
                            <li>Federal and State income tax withholdings</li>
                            <li>CPP, LE such as Income tax</li>
                            <li>Year to Date (YTD) Calculations</li>
                            <li>Withholding calculations </li>
                        </ul>
                        <div class=" justify-content-center ">
                            <a style=""class="btn btn-lg  mt-5 p-2 btn-danger CreatePaystub "
                                href="{{ route('canada.payStub') }}">Create Paystub</a>
                        </div>

                    </div>
                    <div class="col-lg-6 m-auto justify-content-center"
                        style="background-position-x: left;
                       left: -146px;top: -138px;">
                        <img src="{{ asset('images/couple.png') }}" class="couple">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid" style="background-image: linear-gradient(45deg, #fdf5f4, #f2fbf7);">
        <div class="col-md-12 candada">
            <img src="{{ asset('images/hh.png') }}" class="w-100">
        </div>

    </div>
    <div class="container-fluid pb-5 d-flex " style="background-image: linear-gradient(45deg, #fdf5f4, #f2fbf7);">
        <a class="btn btn-lg  mt-5 p-2 btn-danger Generate " href="{{ route('canada.payStub') }}">Generate Paystub Now</a>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-center mt-3">
                <h1 style="" class="canadah1">Generate Paystubs Using our Android
                    or iOS App</h1>
                <p style="" class="canadap">Generate paystubs
                    instantly by using our paystub generator app. It's simple, easy, and accurate.</p>

                <div class="my-5">
                    <a href="https://www.google.com/" target="_blank"><img class="storbtn "
                            src="{{ asset('images/Google_Play_Store_badge_EN.webp') }}"></a>
                    <a href="https://www.google.com/" target="_blank"><img class="storbtn ml-5"
                            src="{{ asset('images/Download_on_the_App_Store_Badge.webp') }}"></a>
                </div>

            </div>
        </div>
    </div>
@endsection
