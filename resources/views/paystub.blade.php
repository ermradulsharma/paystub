@extends('layouts.app')
@section('content')
<div class="paystub">
    <div class="container">
        <div class="row pb-5">
            <div class="col-lg-5 mt-5 pt-5">
                <h1 class="instant display-5">
                    Instant Online Professional PayStub Generator
                </h1>
                <h4 class="QUICK">
                    QUICK AND EASY. Download now.
                </h4>
                <div class="mt-5 justify-content-center ">
                    <a class="btn btn-lg  mt-2 p-2 btn-danger Generate " href="{{url('/')}}">Generate Paystub Now</a>
                </div>
                <div class="mt-5 d-flex justify-content-center">
                    <a href="{{url('/')}}"><img class="storbtn " src="images/Google_Play_Store_badge_EN.webp"></a>
                    <a href="{{url('/')}}"><img class="storbtn ml-3"
                            src="images/Download_on_the_App_Store_Badge.webp"></a>
                </div>
            </div>
            <div class="col-lg-7" text-left>
                <div class="mt-5">
                    <a href="{{url('/')}}"><img class="w-100 ml-3" src="images/paystub_image.webp"></a>
                </div>
            </div>

        </div>

    </div>
</div>
<div class="mt-2 ">
    <div class="container">
        <div class="row">
            <a href="{{url('/')}}"><img class="w-100" src="images/2022-12-14_174735.webp"></a>
        </div>

    </div>
</div>

<div class="mt-2 createSample">
    <div class="container">
        <div class="row">
            <a href="{{url('/')}}"><img class="w-100" src="images/Create me.webp"></a>
        </div>

    </div>
</div>

<div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-6">
                <h1 class="WithPaystubX">
                    With Paystub<span class="text-danger">X</span>
                    <h3 class="Show">
                        Show proof of income.
                    </h3>
                    </span>
                    <ul>
                        <li class=" mt-2 proof"> Rent an apartment ✅</li>


                        <li class=" mt-2 proof"> Qualify for a mortgage ✅</li>


                        <li class=" mt-2 proof">Request a small business loan ✅</li>


                        <li class=" mt-2 proof"> Verify income for child support or alimony ✅</li>


                        <li class=" mt-2 proof"> Apply for health insurance ✅</li>

                    </ul>
                    <div>
                        <p style="font-family:sans-serif; font-size:25px;">Generate 100% Legal Pay Stubs in seconds.</p>
                        <img class="w-50" src="images/previewed.png">
                    </div>
                    <p style="font-size: 25px; font-family:sans-serif; color:#767672;">TAX FILING HAS NEVER BEEN SO EASY
                    </p>
                    <p class="text-black" style="font-size: 25px; font-family:sans-serif">Handling Payroll Yourself?</p>
                    <p class="text-danger" style="font-size: 25px; font-family:sans-serif">You are at the right place!
                    </p>
                    <div class="mt-2">
                        <a class="btn btn-lg  mt-2 p-2 btn-danger Generate " href="{{url('/')}}">Generate Paystub
                            Now</a>
                    </div>
            </div>

            <div class="col-6">
                <h3 class="Createpay">
                    Create pay stubs for your employees.
                </h3>
                <ul>


                    <li class="mt-2 proof">Help employees qualify for loans, housing & more ✅</li>


                    <li class="mt-2 proof">Comply with state and local employment laws ✅</li>


                    <li class="mt-2 proof">RequestBe transparent with compensation ✅</li>


                    <li class="mt-2 proof">Trust auto-calculation for every pay stub, for every state ✅</li>


                    <li class="mt-2 proof">Manage all payroll documents in one place ✅</li>
                </ul>
                <img class="w-100" src="images/paystubx_images.png">
                <div class="mt-5">
                    <p class="OnPaystub ml-2">On Paystub X Join thousands of satisfied independent contractors and small
                        business owners and
                        get the highest quality pay stubs, W2s and 1099s — right to your inbox! We make it easy.
                        Guaranteed.</p>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="mt-5 calculations">
    <div class="container text-justify text-center pb-5">
        <h2 style="font-size:30px; font-family:sans-serif" class="text-white pt-5">Generate paystubs with accurate tax
            calculations, W-2, 1099S Etc in Seconds</h2>

        <div class="row mt-5">

            <div class="col-md-4 text-center">
                <h2 style="font-size:40px; font-family:sans-serif" class="text-white">Add your Data</h2>
                <p style="font-size:18px; font-family:sans-serif" class="text-white">Our paystub generator accurately
                    calculates your Federal and State taxes, including Social security and Medicare taxes so you don't
                </p>
                <img src="images/1.webp"
                    style=" width: 94px; height: 94px; object-fit: cover; object-position: 50% 50%;">


            </div>

            <div class="col-md-4 text-center">
                <h2 style="font-size:40px; font-family:sans-serif" class="text-white">Download & Email your Paystub</h2>
                <p style="font-size:18px; font-family:sans-serif" class="text-white">You will get to generate unlimited
                    payslip, paycheck or paystub according to the plan you select.
                </p>

                <img src="images/2.webp"
                    style=" width: 94px; height: 94px; object-fit: cover; object-position: 50% 50%;">


            </div>

            <div class="col-md-4 text-center">
                <h2 style="font-size:40px; font-family:sans-serif" class="text-white">Preview Data</h2>
                <p style="font-size:18px; font-family:sans-serif" class="text-white">Generate pay stubs with accurate
                    state income taxes, based on state W-4, and other applicable local taxes. </p>

                <img src="images/3.webp"
                    style=" width: 94px; height: 94px; object-fit: cover; object-position: 50% 50%;">


            </div>
        </div>
    </div>
</div>

<div>
    <div class="container text-justify text-center pb-5">
        <h1 style="font-size:40px; font-family:sans-serif" class="pt-5">Why do Small Businesses Love Paystub<span
                class="text-danger">X</span>?</h1>

        <div class="row mt-5">

            <div class="col-sm-12 col-md-4 col-lg-4  mt-4">

                <div class="  border border-dark">
                    <div class="boxAccurate border border-dark p-1">
                        <div class="Accurate container p-2 ">
                            <div class="card card-bordered border-dark pb-5">
                                <div class="card-img-block">
                                    <div class="info-box mt-3" style="font-size:25px; font-family:sans-serif">
                                        <b>Accurate Tax Calculations </b>
                                    </div>
                                </div>
                                <div class="card-body pt-5 pb-5">
                                    <img src="images/salary.webp" class="salary">
                                    <p class="card-text text-center mt-5 pb-4"
                                        style=" color:#767672; font-size:20px; line-height:2em; font-family:sans-serif">
                                        Keeping
                                        payroll records is a complex task. Once you set everything up, we take care of
                                        it
                                        for
                                        you. Our reliable online service removes the human error of payroll record
                                        keeping.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4  mt-4">

                <div class="  border border-dark">
                    <div class="boxAccurate border border-dark p-1">
                        <div class="Accurate container p-2 ">
                            <div class="card card-bordered border-dark pb-1">
                                <div class="card-img-block">
                                    <div class="info-box mt-3" style="font-size:25px; font-family:sans-serif">
                                        <b> Form W-2</b>
                                    </div>
                                </div>
                                <div class="card-body pt-5">
                                    <img src="images/NYCFreeTaxPrep-Documents-W2.webp" class="salary">
                                    <p class="card-text text-center mt-4"
                                        style=" color:#767672; font-size:20px; line-height:2em; font-family:sans-serif">
                                        A W-2 tax form shows important information about the income you've earned from
                                        your employer, amount of taxes withheld from your paycheck, benefits provided
                                        and other information for the year. You use this form to file your federal and
                                        state taxes.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4  mt-4 ">
                <div class=" border border-dark">
                    <div class="boxAccurate border border-dark p-1">
                        <div class="Accurate container p-2 ">
                            <div class="card card-bordered border-dark  pb-5">
                                <div class="card-img-block ">
                                    <div class="info-box mt-3" style="font-size:25px; font-family:sans-serif">
                                        <b>1099-MISC</b>
                                    </div>
                                </div>
                                <div class="card-body pt-5 pb-5">
                                    <img src="images/2573180.webp" class="salary mb-3">
                                    <p class="card-text text-center mt-4 pb-5 mb-4"
                                        style=" color:#767672; font-size:20px; line-height:2em; font-family:sans-serif; ">

                                        Form 1099-MISC reports payments other than nonemployee compensation made by a
                                        trade or business to others.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> 
<div class="container">
    <div class="row"></div>
</div>

</div>

<div class="vedios">
    <div class="container justify-content-center text-center pb-5">
        <div style="font-size:35px; font-family:sans-serif;" class="text-white pt-5"><b>Useful Videos for FAQ</b></div>

        <div class="row mt-5">

            <div class="col-md-4 ">
                <div class="justify-content-center">
                    <iframe class="w-100 m-auto " src="https://www.youtube.com/embed/l9e8u2-zKHE"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <p style="font-size:18px; font-family:sans-serif" class="text-white">Add your Data</p>



            </div>

            <div class="col-md-4 ">
                <div class="justify-content-center">
                    <iframe class="w-100 m-auto " src="https://www.youtube.com/embed/l9e8u2-zKHE"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <p style="font-size:18px; font-family:sans-serif" class="text-white">Download & Email your Paystub</p>



            </div>

            <div class="col-md-4 ">
                <div class="justify-content-center">
                    <iframe class="w-100 m-auto " src="https://www.youtube.com/embed/l9e8u2-zKHE"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <p style="font-size:18px; font-family:sans-serif" class="text-white">Preview Data</p>



            </div>
        </div>
    </div>
</div>

<div>
    <div class="container ">
        <div class="row">
            <div class="col-md-6 text-left mb-5">
                <div class="mt-5 " style="font-size: 24px;">
                    <b> Ready to Explore our Online Paystub Generator?</b>
                </div>
                <div>
                    <ul>


                        <li class="mt-2" style="font-size: 18px;"> W-2 - Efile with SSA, Distribute to Employees. ✅</li>


                        <li class="mt-2" style="font-size: 18px;">1099-NEC, 1099-MISC - Efile with IRS, Distribute
                            Contractor✅</li>


                        <li class="mt-2" style="font-size: 20px;">Request a small business loan ✅</li>
                    </ul>
                </div>
                <div class="mt-5 d-flex">
                    <a class="btn btn-lg  btn-danger Generate " href="{{url('/')}}">Generate Paystub Now</a>
                </div>
            </div>


            <div class="col-md-6 text-left mb-5 ">
                <div class="mt-5 " style="font-size: 24px;">
                    <b> Generate Paystubs Using our<span class="text-danger">Android or iOS App</span></b>
                </div>
                <p style="font-size: 18px;" class="mt-3 ml-2 container">Generate paystubs instantly by using our paystub
                    generator
                    app.It's simple, easy, and accurate.</p>
                <div class="mt-5 pt-4 d-flex justify-content-center">
                    <a href="{{url('/')}}"><img class="storbtn" src="images/Google_Play_Store_badge_EN.webp"></a>
                    <a href="{{url('/')}}"><img class="storbtn ml-2"
                            src="images/Download_on_the_App_Store_Badge.webp"></a>
                </div>
            </div>

        </div>
    </div>
</div>

<div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{url('/')}}"><img class="w-100" src="images/2022-12-16_220238.webp"></a>
            </div>
        </div>
   </div>
</div>



@endsection