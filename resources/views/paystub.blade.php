@extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/font-face.css">
@endsection
@section('content')

<div class="paystub mt-2">
    <div class="container-XL" style="">

        <div class="row pb-5">
            <div class="col-lg-2 mt-5 pt-5"></div>
            <div class="col-lg-4 col-md-6 banner-left-content payhead">
                <h1 class="instant display-5 pt-5">
                    Instant Online <br>Professional PayStub <br>Generator
                </h1>
                <p class="QUICK">
                    QUICK AND EASY. Download now.
                </p>
                <div class="mt-5 pt-5 justify-content-center ">
                    <a class="btn btn-lg  mt-5 p-2 btn-danger Generate " href="{{url('usa')}}">Generate Paystub Now</a>
                </div>
                <div class="mt-5 d-flex pt-3">
                    <a href="https://www.google.com/" target="_blank"><img class="storbtn ml-1"
                            src="images/Google_Play_Store_badge_EN.webp"></a>
                    <a href="https://www.google.com/" target="_blank"><img class="storbtn ml-5"
                            src="images/Download_on_the_App_Store_Badge.webp"></a>
                </div>
            </div>
            <!-- <div class="col-lg-1"></div> -->
            <div class="col-lg-5 col-md-6" style="display: flex;
                justify-content: right;">
                <div class="mt-5">
                    <a href="{{url('/')}}"><img class="w-100 pr-4" src="images/paystub_image.webp"></a>
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
        </div>
        <div class="col-lg-5">
            <h3 class="Createpay"> Create pay stubs for your employees. </h3>
            <ul style="font-size: 20px;line-height:1.5em;font-family: 'Futura LT';" class="mt-4">
                <li class="mt-2 proof">Help employees qualify for loans, housing & more ✅</li>
                <li class="mt-2 proof">Comply with state and local employment laws ✅</li>
                <li class="mt-2 proof">RequestBe transparent with compensation ✅</li>
                <li class="mt-2 proof">Trust auto-calculation for every pay stub, for every state ✅</li>
                <li class="mt-2 proof">Manage all payroll documents in one place ✅</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <img src="images/previewed.png" class="payimg">
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

                <div class="mt-3">
                    <a class="btn btn-lg  mt-2 p-2 btn-danger Generate " href="{{url('usa')}}">Generate Paystub Now</a>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <img class="payimg2" src="images/paystubx_images.png" class="">
            <div>
                <p class="img2-p">
                    On Paystub X Join thousands of satisfied independent </br> contractors and small business owners and
                    get the
                    </br> highest quality pay stubs, W2s and 1099s — right to </br> your inbox! We make it easy.
                    Guaranteed.
                    .</p>
            </div>
        </div>
       
    </div>
</div>
<div class="calculations mt-4">
    <div class="container pt-5" style="max-width: 1750px;">
        <div class="">
            <div class="text-justify text-center pb-5">
                <h2 style="font-size:30px; font-family: 'Futura LT';" class="text-white pt-5">
                    Generate paystubs with accurate tax
                    calculations, W-2, 1099S Etc in Seconds</h2>
                <div class="row mt-5">
                    <div class="col-md-4 text-center">
                        <h2 style="font-size:37px;font-family: 'Futura LT'"
                            class="text-white calcheading">Add your Data</h2>
                    </div>
                    <div class="col-md-4 text-center">
                        <h2 style="font-size:37px;font-family: 'Futura LT'"
                            class="text-white calcheading">Preview Data</h2>
                    </div>
                    <div class="col-md-4 text-center">
                        <h2 style="font-size:37px;font-family: 'Futura LT'"
                            class="text-white pay-h2 calcheading">Download & Email your Paystub</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <p style="font-size:17px;font-weight: 200;font-family: 'Futura LT';line-height:1.8;" class="text-white pay-p">Our paystub generator
                            accurately</br>
                            calculates your Federal and State</br> taxes, including Social security </br>and Medicare
                            taxes so you don't
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <p style="font-size:17px;font-weight: 200;font-family: 'Futura LT'; line-height:1.8;" class="text-white pay-p">Generate pay stubs with
                            accurate</br>
                            state income taxes, based on </br>state W-4, and other applicable</br> local taxes. </p>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <p style="font-size:17px;font-weight: 200;font-family: 'Futura LT'; line-height:1.8;" class="text-white pay-p">You will get to generate
                            unlimited</br>
                            payslip, paycheck or paystub </br>according to the plan you select.
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-4" style="margin-bottom:20px;">
                        <img src="images/1.webp"
                            style=" width: 94px; height: 94px; object-fit: cover; object-position: 50% 50%;">
                    </div>
                    <div class="col-lg-4 col-md-4"  style="margin-bottom:20px;">
                        <img src="images/2.webp"
                            style=" width: 94px; height: 94px; object-fit: cover; object-position: 50% 50%;">
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <img src="images/3.webp"
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
            Businesses Love Paystub<span class="text-danger">X</span>?</h1>

        <div class="row mt-5">

            <div class="col-sm-12 col-md-6 col-lg-4  mt-4">

                <div class="  border border-dark">
                    <div class="boxAccurate border border-dark p-1">
                        <div class="Accurate container p-2 ">
                            <div class="card card-bordered border-dark pb-5">
                                <div class="card-img-block">
                                    <div class="info-box mt-3"
                                        style="font-size:20px;font-family: 'Futura'; font-weight:300;">
                                        <b>Accurate Tax Calculations </b>
                                    </div>
                                </div>
                                <div class="card-body pt-5 pb-5">
                                    <img src="images/salary.webp" class="salary">
                                    <p class="card-text text-center mt-5 pb-4"
                                        style=" color:#767672; font-size:20px; line-height:2em; font-family: 'Futura LT';">
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

            <div class="col-sm-12 col-md-6 col-lg-4  mt-4">

                <div class="  border border-dark">
                    <div class="boxAccurate border border-dark p-1">
                        <div class="Accurate container p-2 ">
                            <div class="card card-bordered border-dark pb-1">
                                <div class="card-img-block">
                                    <div class="info-box mt-3"
                                        style="font-size:25px;font-family: 'Futura'; font-weight:300;">
                                        <b> Form W-2</b>
                                    </div>
                                </div>
                                <div class="card-body pt-5">
                                    <img src="images/NYCFreeTaxPrep-Documents-W2.webp" class="salary">
                                    <p class="card-text text-center mt-4"
                                        style=" color:#767672; font-size:21.5px; line-height:2em; font-family: 'Futura LT';">
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

            <div class="col-sm-12 col-md-6 col-lg-4  mt-4 ">
                <div class=" border border-dark">
                    <div class="boxAccurate border border-dark p-1">
                        <div class="Accurate container p-2 ">
                            <div class="card card-bordered border-dark  pb-5">
                                <div class="card-img-block ">
                                    <div class="info-box mt-3"
                                        style="font-size:25px;font-family:'Futura'; font-weight:300;">
                                        <b>1099-MISC</b>
                                    </div>
                                </div>
                                <div class="card-body pt-5 pb-5">
                                    <img src="images/2573180.webp" class="salary mb-3">
                                    <p class="card-text text-center mt-4 pb-5 mb-4"
                                        style="  color:#767672; font-size:23px; line-height:2em; font-family: 'Futura LT'; ">

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


</div>
<div class="vedios">
    <div class="container py-5 justify-content-center " style=" max-width: 1394px;">
        <div class="row justify-content-center  ">
            <h2 class="text-center text-light pb-3" style="font-weight: 800;">
                Useful Videos for FAQ
            </h2>
        </div>
        <div class="row">

            <div class="col-md-4 text-center">
                <div class="justify-content-center">
                    <iframe class="mr-2 youtubeimg" style=" "
                        src="https://www.youtube.com/embed/TrnLCFsN5i8" title="Plane Overhead" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <button class="text-white payp">Generate Paystubs with Accurate Tax Calculations</button>
                </div>

            </div>

            <div class="col-md-4 text-center ">
                <div class="justify-content-center">
                    <iframe class="mr-2 youtubeimg" style=" "
                        src="https://www.youtube.com/embed/TrnLCFsN5i8" title="Plane Overhead" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <button class="text-white payp">How to Create PayStubs for Independent Contractors</button>
                </div>

            </div>

            <div class="col-md-4 text-center">
                <div class="justify-content-center">
                    <iframe class="mr-2  youtubeimg" style=" "
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
                <div class="mt-5 " style="font-size: 32px; font-family: 'Futura LT'; font-weight:600;">
                    Ready to Explore our Online Paystub Generator?
                </div>
                <div>
                    <ul>


                        <li class="mt-2" style="font-weight: 200; font-size: 20px; line-height:1.5em; font-family: 'Futura LT';"> W-2 - Efile with
                            SSA, Distribute to Employees. ✅</li>


                        <li class="mt-2" style="font-weight: 200; font-size: 20px; line-height:1.5em; font-family: 'Futura LT';">1099-NEC,
                            1099-MISC - Efile with IRS, Distribute
                            Contractor✅</li>


                        <li class="mt-2" style="font-weight: 200; font-size: 20px; line-height:1.5em; font-family: 'Futura LT';">Request a small
                            business loan ✅</li>
                    </ul>
                </div>
                <div class="mt-5 pt-3  ">
                    <a class="btn btn-lg  btn-danger Generate " href="{{url('usa')}}">Generate Paystub Now</a>
                </div>
            </div>

            <div class="col-md-5 text-left mb-5 ">
                <div class="mt-5">
                    <b style="font-size: 24px; font-weight: 600; font-family: 'Futura LT';">
                        Generate Paystubs Using our<span class="text-danger"> Android or iOS
                            App</span></b>
                    <p style="font-size: 20px;line-height: 35px;font-family: 'Futura LT';" class="mt-1 ">Generate paystubs
                        instantly by using our
                        paystub
                        generator app.</br>
                        It's simple, easy, and accurate.</p>
                </div>

                <div class="mt-5  d-flex pt-5">
                    <a href="https://www.google.com/" target="_blank"><img class="storbtn ml-4"
                            src="images/Google_Play_Store_badge_EN.webp"></a>
                    <a href="https://www.google.com/" target="_blank"><img class="storbtn ml-5 "
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



<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

@endsection