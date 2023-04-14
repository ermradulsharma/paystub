@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/font-face.css">
@endsection
@section('content')
    <div class="paystub mt-2">
        <div class="container-XL" style="">
            <div class="row pb-5">
                <div class="col-lg-6 col-md-4 banner-left-content payhead col-set">
                    <h1 class="instant display-5 pt-5"> Instant Online <br>Professional PayStub <br>Generator </h1>
                    <p class="QUICK"> QUICK AND EASY. Download now. </p>
                    <div class="mt-5 pt-5 justify-content-center ">
                        <a class="btn btn-lg  mt-5 p-2 btn-danger Generate " href="{{ route('usa.payStub') }}">Generate
                            Paystub Now</a>
                    </div>
                    <div class="mt-5 d-flex pt-5 top-gogle">
                        <div class="mt-5 d-flex pt-5 top-gogle">
                            <a href="https://apps.apple.com/us/app/paystubx-paystub-maker/id1658931100" target="_blank"><img class="storbtn ml-1" src="{{ asset('images/Download_on_the_App_Store_Badge.webp') }}"></a>
                            <a href="https://play.google.com/store/apps/details?id=com.paystubx" target="_blank"><img class="storbtn ml-5" src="{{ asset('images/Google_Play_Store_badge_EN.webp') }}"></a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-1"></div> -->
                <div class="col-lg-6 col-md-6 col-set1">
                    <div class="mt-5">
                        <a href="{{ url('/') }}"><img class="w-100 " src="images/paystub_image.webp"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 ">
        <div class="container">
            <div class="row">
                <a href="{{ url('/') }}"><img class="w-100" src="images/2022-12-14_174735.webp"></a>
            </div>
        </div>
    </div>
    <div class="mt-2 createSample">
        <div class="container see-img">
            <div class="row m-auto">
                <div>
                    <button class="see-sample">SEE SAMPLE</button>
                </div>
                <div>
                    <button class="see-sample1">SEE SAMPLE</button>
                </div>
                <div>
                    <button class="see-sample2">SEE SAMPLE</button>
                </div>
                <a class="" href="{{ url('/') }}"><img class="w-100 " src="images/Create me.webp"></a>
            </div>
        </div>
    </div>
    <div class="container pt-5 wrapper">
        <div class="row space-between" style="margin:0 auto;">
            <div class="col-lg-5">
                <h1 class="WithPaystubX mt-3"> With Paystub<span class="text-danger">X</span></h1>
                <h3 class="Show"> Show proof of income. </h3>
                <ul style="font-size: 20px;line-height:1.5em;font-family: 'Futura LT';" class="mt-4">
                    <li class=" mt-2 proof"> Rent an apartment ✅</li>
                    <li class=" mt-2 proof"> Qualify for a mortgage ✅</li>
                    <li class=" mt-2 proof">Request a small business loan ✅</li>
                    <li class=" mt-2 proof"> Verify income for child support or alimony ✅</li>
                    <li class=" mt-2 proof"> Apply for health insurance ✅</li>
                </ul>
                <p style="" class="mt-3 smallfont">Generate 100% Legal Pay Stubs in seconds.</p>
                <img src="images/previewed.png" class="payimg mobile-img">
                <div class="col-lg-4 mobile-img">
                    <img src="images/previewed.png" class="payimg mobile-img-desktop">
                    <div class="paytext">
                        <p style="" class="smallfont1">TAX FILING HAS NEVER BEEN
                            EASY
                        </p>
                        <p class="text-black text-capitalize smallfont2" style="">Handling
                            Payroll
                            Yourself?
                        </p>
                        <p class="text-danger smallfont3" style="">You are at the right
                            place!
                        </p>
                        <div class="mt-3 gennn">
                            <a class="btn btn-lg  mt-2 p-2 btn-danger Generate " href="{{ route('usa.payStub') }}">Generate
                                Paystub Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <h3 class="Createpay"> Create pay stubs for your employees. </h3>
                <ul style="font-size: 20px;line-height:1.5em;font-family: 'Futura LT';" class="mt-4">
                    <li class="mt-2 proof">Help employees qualify for loans, housing & more ✅</li>
                    <li class="mt-2 proof">Comply with state and local employment laws ✅</li>
                    <li class="mt-2 proof">Be transparent with compensation ✅</li>
                    <li class="mt-2 proof">Trust auto-calculation for every pay stub, for every state ✅</li>
                    <li class="mt-2 proof">Manage all payroll documents in one place ✅</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mobile-img-desktop">
                <img src="images/previewed.png" class="payimg mobile-img-desktop">
                <div class="paytext">
                    <p style="" class="smallfont1">TAX FILING HAS NEVER BEEN
                        EASY
                    </p>
                    <p class="text-black text-capitalize smallfont2" style="">Handling
                        Payroll
                        Yourself?
                    </p>
                    <p class="text-danger smallfont3" style="">You are at the right
                        place!
                    </p>
                    <div class="mt-3 gennn">
                        <a class="btn btn-lg  mt-2 p-2 btn-danger Generate " href="{{ route('usa.payStub') }}">Generate
                            Paystub Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <img class="payimg2" src="images/paystubx_images.png" class="">
                <div class="payyy">
                    <p class="img2-p">
                        On Paystub X Join thousands of satisfied independent <br> contractors and small business owners and
                        get the
                        <br> highest quality pay stubs, W2s and 1099s — right to <br> your inbox! We make it easy.
                        Guaranteed.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="calculations ">
        <div class="container " style="max-width: 1750px;">
            <div class="">
                <div class="text-justify text-center pb-5">
                    <h2 style="font-size:30px; font-family: 'Futura LT';" class="text-white pt-5 gen">
                        Generate paystubs with accurate tax
                        calculations, W-2, 1099S Etc in Seconds
                    </h2>
                    <div class="row mt-5">
                        <div class="col-md-4 mt-3 text-center">
                            <h2 class="text-white calcheading head-font" style="color: #fafabd !important;">Add your Data
                            </h2>
                            <p style="font-size:17px;font-weight: 200;font-family: 'Futura LT';line-height:1.8;"
                                class="text-white pay-p head-font home-p">Our paystub generator
                                accurately<br>
                                calculates your Federal and State<br> taxes, including Social security <br>and Medicare
                                taxes so you don't
                            </p>
                            <img class="list-img" src="images/1.webp"
                                style=" width: 94px; height: 94px; object-fit: cover; object-position: 50% 50%;">
                        </div>
                        <div class="col-md-4 mt-3 text-center">
                            <h2 class="text-white calcheading head-font" style="color: #fafabd !important;">Preview Data
                            </h2>
                            <p style="font-size:17px;font-weight: 200;font-family: 'Futura LT'; line-height:1.8;"
                                class="text-white pay-p head-font home-p">Generate pay stubs with
                                accurate<br>
                                state income taxes, based on <br>state W-4, and other applicable<br> local taxes.
                            </p>
                            <img class="list-img" src="images/2.webp"
                                style=" width: 94px; height: 94px; object-fit: cover; object-position: 50% 50%;">
                        </div>
                        <div class="col-md-4 mt-3 text-center">
                            <h2 class="text-white pay-h2 calcheading head-font">Download & Email your Paystub</h2>
                            <p style="font-size:17px;font-weight: 200;font-family: 'Futura LT'; line-height:1.8;"
                                class="text-white pay-p head-font home-p">You will get to generate
                                unlimited<br>
                                payslip, paycheck or paystub <br>according to the plan you select.
                            </p>
                            <img class="list-img" src="images/3.webp" class="num"
                                style=" width: 94px; height: 94px; object-fit: cover; object-position: 50% 50%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container text-justify text-center pb-5">
            <h1 style="font-size:30px;font-family: font-family: 'Futura'; font-weight:600;" class="pt-5">Why do Small
                Businesses Love Paystub<span class="text-danger">X?</span>
            </h1>
        </div>
    </div>
    <section class="three-box-section">
        <div class="box-wrapper">
            <div class="box-row">
                <div class="box-border-outer">
                    <div class="box">
                        <div class="box-content">
                            <h6>Accurate Tax Calculations</h6>
                        </div>
                        <div class="box-icon"> <img src="images/salary.webp" class="salary"></div>
                        <div class="bottom-content">
                            <p>Keeping payroll records is a complex task. Once you set everything up, we take care of it for
                                you. Our reliable online service removes the human error of payroll record keeping.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="box-border-outer">
                    <div class="box">
                        <div class="box-content">
                            <h6>Form W-2</h6>
                        </div>
                        <div class="box-icon"> <img src="images/NYCFreeTaxPrep-Documents-W2.webp" class="salary"></div>
                        <div class="bottom-content">
                            <p>A W-2 tax form shows important information about the income you've earned from your employer,
                                amount of taxes withheld from your paycheck, benefits provided and other information for the
                                year. You use this form to file your federal and state taxes.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="box-border-outer">
                    <div class="box">
                        <div class="box-content">
                            <h6>1099-MISC</h6>
                        </div>
                        <div class="box-icon"><img src="images/2573180.webp" class="salary mb-3"></div>
                        <div class="bottom-content">
                            <p>Form 1099-MISC reports payments other than nonemployee compensation made by a trade or
                                business to others.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="vedios">
        <div class="container py-5 justify-content-center " style=" max-width: 1394px;">
            <div class="row justify-content-center  ">
                <h2 class="text-center text-light pb-3" style="font-weight: 800;">
                    Useful Videos for FAQ
                </h2>
            </div>
            <div class="row">
                <div class="col-md-4 text-center vedio-box">
                    <div style="" class="justify-content-center">
                        <iframe class="mr-2 youtubeimg w-100" src="https://www.youtube.com/embed/TrnLCFsN5i8"
                            title="Plane Overhead" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <button class="text-white payp">Generate Paystubs with Accurate Tax Calculations</button>
                    </div>
                </div>
                <div class="col-md-4 text-center vedio-box ">
                    <div class="justify-content-center">
                        <iframe class="mr-2 youtubeimg  w-100" style=" "
                            src="https://www.youtube.com/embed/TrnLCFsN5i8" title="Plane Overhead" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <button class="text-white payp">How to Create PayStubs for Independent Contractors</button>
                    </div>
                </div>
                <div class="col-md-4 text-center vedio-box">
                    <div class="justify-content-center">
                        <iframe class="mr-2 youtubeimg  w-100" style=" "
                            src="https://www.youtube.com/embed/TrnLCFsN5i8" title="Plane Overhead" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <button class="text-white payp">Select your Preferred Template</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background:#fafafa;">
        <div class="container" style="max-width:1800px">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6 text-left mb-5">
                    <div class="mt-5 ready" style="font-size: 32px; font-family: 'Futura LT'; font-weight:600;">
                        Ready to Explore our Online Paystub Generator?
                    </div>
                    <div>
                        <ul class="list-outer">
                            <li class="mt-2"
                                style="font-weight: 200; font-size: 20px; line-height:1.5em; font-family: 'Futura LT';">
                                W-2
                                - Efile with
                                SSA, Distribute to Employees. ✅
                            </li>
                            <li class="mt-2"
                                style="font-weight: 200; font-size: 20px; line-height:1.5em; font-family: 'Futura LT';">
                                1099-NEC,
                                1099-MISC - Efile with IRS, Distribute to
                                Contractors ✅
                            </li>
                            <li class="mt-2"
                                style="font-weight: 200; font-size: 20px; line-height:1.5em; font-family: 'Futura LT';">
                                Efile Form 940 - FUTA filing with IRS. ✅
                            </li>
                        </ul>
                    </div>
                    <div class="mt-5 pt-3  ">
                        <a class="btn btn-lg  btn-danger Generate " href="{{ route('usa.payStub') }}">Generate Paystub
                            Now</a>
                    </div>
                </div>
                <div class="col-md-5 text-left mb-5 ">
                    <div class="mt-5">
                        <b class="bottom-c" style="font-size: 24px; font-weight: 600; font-family: 'Futura LT';">
                            Generate Paystubs Using our<span class="text-danger"> Android or iOS
                                App</span></b>
                        <p style="font-size: 20px;line-height: 35px;font-family: 'Futura LT';" class="mt-1 b-p ">Generate
                            paystubs
                            instantly by using our
                            paystub
                            generator app.<br>
                            It's simple, easy, and accurate.
                        </p>
                    </div>
                    <div class="mt-5  d-flex pt-5 goggle">
                        <a href="https://play.google.com/store/apps/details?id=com.paystubx" target="_blank"><img class="storbtn " src="{{asset('images/Google_Play_Store_badge_EN.webp')}}"></a>
                        <a href="https://apps.apple.com/us/app/paystubx-paystub-maker/id1658931100" target="_blank"><img class="storbtn ml-5 " src="{{asset('images/Download_on_the_App_Store_Badge.webp')}}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-12 mt-4 " style="">
                    <a href="{{ url('/') }}"><img class="w-100" src="{{asset('images/2022-12-16_220238.webp')}}"></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
@endsection
