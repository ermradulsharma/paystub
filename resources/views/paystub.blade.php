@extends('layouts.app')
@section('content')
<div class="paystub">
    <div class="container">
        <div class="row">
            <div class="col-6 mt-5 pt-5">
                <h1 class="instant">
                    Instant Online Professional PayStub Generator
                </h1>
                <h4 class="QUICK">
                    QUICK AND EASY. Download now.
                </h4>
                <div class="mt-5 pt-5">
                    <a class="btn btn-lg  mt-2 p-2 btn-danger Generate " href="{{url('/')}}">Generate Paystub Now</a>
                </div>
                <div class="mt-5">
                    <a href="{{url('/')}}"><img class="storbtn " src="images/Google_Play_Store_badge_EN.webp"></a>
                    <a href="{{url('/')}}"><img class="storbtn ml-3"
                            src="images/Download_on_the_App_Store_Badge.webp"></a>
                </div>
            </div>
            <div class="col-6" text-left>
                <div class="mt-5">
                    <a href="{{url('/')}}"><img class="img1 ml-3" src="images/paystub_image.webp"></a>
                </div>
            </div>

        </div>

    </div>
</div>
<div class="mt-2 ">
    <div class="container">
        <div class="row">
            <a href="{{url('/')}}"><img class="img2" src="images/2022-12-14_174735.webp"></a>
        </div>

    </div>
</div>

<div class="mt-2 createSample">
    <div class="container">
        <div class="row">
            <a href="{{url('/')}}"><img class="img3" src="images/Create me.webp"></a>
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
                    <p>
                        <li class="proof"> Rent an apartment ✅</li>
                    </p>
                    <p>
                        <li class="proof"> Qualify for a mortgage ✅</li>
                    </p>
                    <p>
                        <li class="proof">Request a small business loan ✅</li>
                    </p>
                    <p>
                        <li class="proof"> Verify income for child support or alimony ✅</li>
                    </p>
                    <p>
                        <li class="proof"> Apply for health insurance ✅</li>
                    </p>
                    <div class="mt-3">
                        <p style="font-family:sans-serif; font-size:25px;">Generate 100% Legal Pay Stubs in seconds.</p>
                        <img class="img4" src="images/previewed.webp">
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
                <p>
                    <li class="proof">Help employees qualify for loans, housing & more ✅</li>
                </p>
                <p>
                    <li class="proof">Comply with state and local employment laws ✅</li>
                </p>
                <p>
                    <li class="proof">RequestBe transparent with compensation ✅</li>
                </p>
                <p>
                    <li class="proof">Trust auto-calculation for every pay stub, for every state ✅</li>
                </p>
                <p>
                    <li class="proof">Manage all payroll documents in one place ✅</li>
                </p>
                <img class="img5" src="images/paystubx_images.webp">
                <div class="mt-3">
                    <p class="OnPaystub ml-2">On Paystub X Join thousands of satisfied independent contractors and small
                        business owners and
                        get the highest quality pay stubs, W2s and 1099s — right to your inbox! We make it easy.
                        Guaranteed.</p>
                </div>

            </div>
        </div>
    </div>
</div>
<div>
<div class="container">
<div class="row" style="margin-top:30px;">

<div class="col-md-4">
    <img src="images/Missions/icons8-bible-99.webp" style=" width: 121px; height: 121px; object-fit: cover; object-position: 50% 50%;">
    <h4 style="font-size:20px; margin-top:35px;">TWI BIBLE VERSIONS</h4>
    <p style="margin-top:40px;color:white;">Choose from more than 1000 <br> Bible versions in over 50
        <br> languages on your computer, <br> phone, or tablet -- with many <br>
        available as audio Bibles.</p>
</div>

<div class="col-md-4">
    <img src="images/Missions/icons8-marker-pen-64.webp" style=" width: 121px; height: 121px; object-fit: cover; object-position: 50% 50%;">
    <h5 style="font-size:20px; margin-top:35px;">BIBLE STUDIES</h5>
    <p style="margin-top:40px;color:white;">Highlight or Bookmark your <br> favorite verses,make Verse
        <br>Images that you can share, and <br> attach public or private Notes to <br>
        Bible passages.</p>
</div>

<div class="col-md-4">
    <img src="images/Missions/icons8-phone-64.webp" style=" width: 121px; height: 121px; object-fit: cover; object-position: 50% 50%;">
    <h5 style="font-size:20px; margin-top:35px;">Service Name</h5>
    <p style="margin-top:40px;color:white;">Twi Bible App is completely free,<br> and available on iOS
        and Android <br> devices.<br>Download the Free Bible App <br>NOW</p>
</div>
</div>
 </div>
</div>


</div>




@endsection