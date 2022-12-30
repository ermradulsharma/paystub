@extends('layouts.app')
@section('content')
<div style="background-color: #f75656ed;">

    <div class="container" style="max-width: 1580px;">
        <div class="row">
            <div class="col-lg-4 m-auto pt-3" style="color:white;">
                <div style="font-size:38px;font-weight:300;    display: flex;" class="text-center">Instantly
                    Generate</br> your Professional<br> Canadian Pay </br> Stubs
                </div>

                <p style="font-weight: 400;font-size:21px;  ">
                    Generate Your Canadian Pay Stub in Seconds with Paystubx. The #1 Leading in the
                    game.
                    game.</p>
                <p class="mb-5" style="font-size:larger;font-weight: 200;line-height: 2em;">Online secure
                    web-based pay stub generator,</br> straightforward to use,
                    instant pay stub delivery, and</br> free pay stub preview. Simple as ABC.</p>


                <div class="mt-5 justify-content-center ">
                    <a class="btn btn-lg  mt-2 p-2 btn-danger CreatePaystub " href="{{url('canada-paystub') }}">Create
                        Paystub</a>
                </div>

                <div class="mt-5 pt-2 justify-content-center">
                    <a href="https://www.google.com/" target="_blank"><img class="storbtn "
                            src="images/Google_Play_Store_badge_EN.webp"></a>
                    <a href="https://www.google.com/" target="_blank"><img class="storbtn ml-5"
                            src="images/Download_on_the_App_Store_Badge.webp"></a>
                </div>
            </div>

            <div class="col-lg-8" style="background-position-x:right;left:12px;">
                <img src="images/computer.webp" class="w-100">
            </div>
        </div>
    </div>




</div>

<div class="pt-5" style="background-color: #f8f9f9;">
    <div class="container" style="max-width: 1580px;">
        <div class="row">
            <div class="col-md-6 col-sm-6 m-auto justifuy-content-center">
                <h1 class="display-4"
                    style="font-family: helvetica-w01-bold,helvetica-w02-bold,helvetica-lt-w10-bold,sans-serif;font-weight: 600;">
                    READY TO GET STARTED?</h1>
                <p style=" font-size: 22px;
    font-weight: 200;
    line-height: 30px;">Very easy platform to generate </br> your Canadian Paystub, and </br> Payslip in
                    Get your</br> data ready, customize your</br> paystub, generate, download,</br> email,
                    print it.
                </p>
            </div>

            <div class="col-md-6 col-sm-6 justifuy-content-center text-center">
                <h2 class="mb-5">Who can use Paystub<span class="text-danger">x</span>?</h2>
                <div class="row">
                    <div class="col-md-6" style="border-right:1px solid black;">
                        <img src="images/employericon.webp" class="" style="width:176px;">
                        <p style="font-size:15px;">Paystubx is a great tool for employers who manage payroll on
                            their own. Employers can easily create professional paystubs, with the option to
                            download them or email them directly to their employees, contractors, and gig workers.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <img src="images/sole-propritors.webp" class="" style="width:164px;">
                        <p style="font-size:14px;">Sole proprietors or self-employed individuals can act as their
                            own bosses and pay themselves whenever they want. Though they may not need to withhold
                            taxes, they still need paystubs to show proof of income. Paystubx allows you to generate
                            professional paystubs instantly.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-sm-4 m-auto justifuy-content-center">
                    <div style=" font-weight: 300;font-size: xx-large;letter-spacing: 2px;" class="mb-4">Why should you
                        choose Paystub<span class="text-danger">x</span></br> to generate pay stubs online?
                    </div>

                    <h2 style=" font-size: 40px; font-family: avenir-lt-w01_35-light1475496,sans-serif;">Accurate
                        Payroll Calculations that include </h2>
                    <ul style="font-weight: 200;font-size: 20px; line-height: 41px;color: #000000;" class="mt-2">
                        <li>Federal and State income tax withholdings</li>
                        <li>CPP, LE such as Income tax</li>
                        <li>Year to Date (YTD) Calculations</li>
                        <li>Withholding calculations </li>
                    </ul>
                    <div class=" justify-content-center ">
                        <a class="btn btn-lg  mt-5 p-2 btn-danger CreatePaystub "
                            href="{{url('canada-paystub') }}">Create Paystub</a>
                    </div>

                </div>
                <div class="col-lg-6 m-auto justify-content-center" style="background-position-x: left;
                       left: -146px;top: -146px;">
                    <img src="images/couple.png" class="couple">
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid" style="background-image: linear-gradient(45deg, #fdf5f4, #f2fbf7);">
    <div class="col-md-12 candada">
        <img src="images/hh.png" class="w-100">
    </div>

</div>
<div class="container-fluid pb-5 d-flex "  style="background-image: linear-gradient(45deg, #fdf5f4, #f2fbf7);">
                    <a class="btn btn-lg  mt-5 p-2 btn-danger Generate " href="{{url('usa')}}">Generate Paystub Now</a>
                </div>


<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 text-center mt-3">
            <h1 style="font-size: -webkit-xxx-large;">Generate Paystubs Using our Android
                or iOS App</h1>
            <p style="font-size: 25px;font-weight: 300;">Generate paystubs
                instantly by using our paystub generator app. It's simple, easy, and accurate.</p>

            <div class="my-5">
                <a href="https://www.google.com/" target="_blank"><img class="storbtn "
                        src="images/Google_Play_Store_badge_EN.webp"></a>
                <a href="https://www.google.com/" target="_blank"><img class="storbtn ml-5"
                        src="images/Download_on_the_App_Store_Badge.webp"></a>
            </div>

        </div>
    </div>
</div>























@endsection


<div class="container">
    <a href="{{url('/')}}"><i class="fa fa-facebook   fbicon " aria-hidden="true"></i></a>
    <a href="{{url('/')}}"><i class="fa fa-instagram  socialicon" aria-hidden="true"></i></a>
    <a href="{{url('/')}}"><i class="fa fa-twitter  socialicon" aria-hidden="true"></i></a>
    <a href="{{url('/')}}"><i class="fa fa-linkedin  socialicon" aria-hidden="true"></i></a>
    <a href="{{url('/')}}"><i class="fa fa-youtube  socialicon" aria-hidden="true"></i></a>
    <!--  <a href="{{url('/')}}"><i class="fa fa-tiktok text-white socialicon" aria-hidden="true"></i></a> -->
</div>