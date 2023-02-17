@extends('layouts.app')
@section('content')
    <!-- Modal Start -->
    <div class="modal fade" id="openEye" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src=" " class="setImage w-100">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
    <div title="Globle-Header" style="background:#ff6261;padding:50px 0px;" class="mt-2">
        <div class="container" style="max-width:1500px">
            <div class="row">

                <div class="col-lg-5  text-center" style="padding: 3px 23px 0px 0px;">

                    <div class="text-white text-padding globe-p"
                        style="font-size: 42px;font-weight: 300;font-family: 'Outfit', sans-serif;">
                        With PaystubX you can create<br> Paystub for any country
                    </div>

                    <div class="mt-4 text-left">
                        <div class="text-white PayslipsGlo ml-4 text-white2">
                            There’s no need for complex and costly desktop software. Save<br> time and money with
                            Paystubx free online pay stub maker that <br>creates pay stubs to include all companies,
                            employment, income,<br> and deduction information. No software needed for creating<br>
                            Global Payslip, Paystub or Payroll.
                        </div>
                    </div>

                    <div class="mt-5 pt-3 pl-4 globlebtn">
                        <a class="btn btn-lg  p-2 btn-danger Generate global-btn "
                            href="{{ route('global.payStub') }}">Generate
                            Paystub
                            Now</a>
                    </div>
                    <div class="mt-5 pt-4    pr-3 mr-5 ml-3 d-flex storehead global">
                        <a href="https://www.google.com/" target="_blank"><img class="storbtn mt-5"
                                src="images/Google_Play_Store_badge_EN.webp"></a>
                        <a href="https://www.google.com/" target="_blank"><img class="storbtn mt-5 ml-5"
                                src="images/Download_on_the_App_Store_Badge.webp"></a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12   " style="background-position-x:left;">
                    <img class=" globleImg" src="images/globle/qewqq22.png">
                </div>

            </div>
        </div>
    </div>
    <div style="background-color: #e9e6e6;">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-3 col-md-1"></div>
                    <div class="col-lg-9 col-md-12 pl-5 global-padding">
                        <div class="mt-5 global-heading">

                            <h2> Use Paystubx for end-to-end Global Payroll Process Management</h2>
                        </div>
                        <div class="global-p" style="font-size: 21px;font-weight: 200;">
                            With Paystubx you can customize your own Global Paystub or payroll:
                        </div>
                        <div class="mt-2">
                            <ul class="global-list" style="    font-size: 19px;font-weight: 300;">

                                <li class="mt-3">Consolidated Reporting</li>
                                <li class="mt-3">Calendar & Alerts</li>
                                <li class="mt-3">Workflow Management Tool</li>
                                <li class="mt-3">Employee Self-Service Tool</li>
                                <li class="mt-3">Payroll Provider Management Portal</li>
                                <li class="mt-3">Payslip Team's Support</li>
                            </ul>
                        </div>
                        <div class="mt-2 global-heading" style=" font-size:25px;">

                            Want to generate professional paystubs?
                        </div>
                        <div class="global-p" style="font-size: 20px;font-weight:300;">
                            We offer a wide variety of sample paystub templates to suit<br> your needs!
                        </div>
                        <div class=" pt-5">
                            <a class="btn btn-lg  mt-2 p-2 btn-danger Generate "
                                href="{{ route('global.payStub') }}">Generate
                                Paystub
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row justify-contetn-center">
                    <div class=" global-padding">
                        <div class="text-center">
                            <div class="mt-5 global-heading" style="font-size:30px;font-family: serif;padding-left: 10px;">
                                More Time For You. Less Time on Payroll and Taxes.
                            </div>
                        </div>
                        <div class="">
                            <ul class="row d-flex globe-ul" style="font-size:20px;font-weight: 200; line-height:35px;">
                                <li>Employee contracts aren’t
                                    a legal requirement, but they protect your employees and your
                                    business. Contracts can outline everything from job descriptions and expected hours
                                    of
                                    work to the date of employment and salary details. A lawyer can help you draft a
                                    contract if you have any questions as to what should be included</li>
                                <li class="mt-3 ">Whether you hire
                                    full-time
                                    employees, contractors or freelancers makes a big
                                    difference
                                    when it comes to payroll. Make sure you’re compensating them properly and according
                                    to
                                    the tax guidelines where your business operates</li>
                                <li class="mt-3 ">Wave’s small
                                    business
                                    payroll software comes with worry-free features such as
                                    automatic
                                    tax remittances, direct deposits into your employee’s bank accounts, and automatic
                                    payroll journal entries</li>
                                <li class="mt-3 ">Got questions
                                    about
                                    payroll and taxes? Check out The Ultimate Year-end Payroll
                                    Checklist
                                </li>
                                <li class="mt-3 ">Check out our
                                    other free
                                    payroll tools that can help you manage your business</li>

                                <p class="mt-4 bottom-p" style="font-weight: 300; font-size:19px;">Simply
                                    enter the
                                    information about your company, employee,
                                    income,
                                    and deductions to create
                                    an example professional pay stub instantly. Note that the start date is by default Jan.
                                    1
                                    and this tool is only for salary-based income employees. You can save the pay stub as a
                                    PDF
                                    to email to your employee or keep it for your records.Keep your records and documents in
                                    one
                                    place so you’re prepared for tax time. Here are a few other helpful tips:
                                </p>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container text-center">
                <div class="mt-5 thousand" style="font-size: xx-large;
                 font-weight: 700;">
                    <h2>Thousands of businesses have created professional paystubs with Paystub<span
                            class="text-danger">x</span><br>
                        Select the template that best suits your needs.</h2>
                </div>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-lg-2"></div>
            <div class="col-md-8 my-5">
                <div class="box-usa2">
                    <div class=" box-usa">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="col-md-5 col-sm-12 mt-5 text-center template-text">
                                <h6 class="basic1">BASIC TEMPLATES</h6>
                                <div class="mt-4">
                                    {{-- <i class="fa fa-angle-down down1"></i> --}}
                                    <div class="input-group mmenu mb-3" style="margin: auto;">
                                        <select class="form-control dropdown1 bt_id" style="border-right:none">
                                            <option selected=""> --- Select Basic Templates --- </option>
                                            @foreach ($basicType ?? [] as $data)
                                                <option value="{{ $data->title }}" data-src="{{ $data->images->file }}">
                                                    {{ $data->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <i class="fa fa-eye-slash basicTem uk-eye" data-target="#openEye"
                                            data-toggle="modal" style="font-size: 39px; position:relative;left:10px;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2  text-center sh">
                                <!-- <div style="height:240px;-webkit-box-shadow: 9px 0 4px -4px #999, 0px 0 4px -4px #999;">

                                                </div> -->
                                <img src="images/hrpng.png" style="height: 200px;">
                            </div>
                            <div class="col-md-5 col-sm-12 mt-5 text-center template-text">
                                <h6 class="basic1">ADVANCED TEMPLATES</h6>
                                <div class="mt-4">
                                    {{-- <i class="fa fa-angle-down down1"></i> --}}
                                    <div class="input-group mmenu mb-3" style="margin: auto;">
                                        <select class="form-control dropdown1 at_id" style="border-right:none">
                                            <option selected=""> --- Select Advance Template --- </option>
                                            @foreach ($advanceType ?? [] as $data)
                                                <option value="{{ $data->title }}" data-src="{{ $data->images->file }}">
                                                    {{ $data->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <i class="fa fa-eye-slash advanceTem uk-eye" data-target="#openEye"
                                            data-toggle="modal" style="font-size: 39px; position:relative;left:10px;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    <div class="container" style="max-width:1500px;">
        <div class="row">
            <div class="col-lg-7 justify-content-center global-padding">
                <div class="mt-2  mb-4 stubheading">
                    How to use the Pay<br> Stub Generator
                </div>

                <div class="global-p" style="font-size: 20px;font-weight:300;">To create a pay stub with our free pay stub
                    generator, follow
                    these instructions and you'll quickly have a professional pay stub to provide to your employee.
                </div>
                <div class="mt-2">
                    <ol class="global-list-outer" style=" font-size: 18px;font-weight:300;">
                        <li class=" mt-3">Upload
                            your company logo (optional)</li>

                        <li class=" mt-3">Enter your company's
                            information,
                            including its business name and physical address,
                            then click "Continue.</li>

                        <li class=" mt-3">Enter your employee's
                            information,
                            including their name, employee ID, and address,
                            then click "Continue.</li>
                        <li class=" mt-3">Enter the corresponding
                            pay stub
                            information for your employee, including the date
                            of payment, the pay period, and frequency, along with their annual income and an
                            associated paycheque number</li>
                        <li class=" mt-3">If you there are any
                            deductions to the
                            payment of your employee for this pay period,
                            include that along with the total amount so that it's deducted from the pay tallied
                            on the pay stub</li>
                        <li class=" mt-3">If there is more than one
                            deduction to
                            be made, click "Add new item" to include it
                        </li>
                        <li class=" mt-3">Once the above steps are
                            complete,
                            click "Generate pay stub" to receive your free
                            pay stub</li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="images/globle/yoga.gif" class="w-100">
                <div class="mt-2 d-flex ">
                    <a class="btn btn-lg  mt-2 mb-4 p-2 btn-danger Generate  global-btn"
                        href="{{ route('global.payStub') }}">Generate
                        Paystub
                        Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row saveTime">
        <div class="col-lg-6 " style="background: #03395d;">
            <img class="w-100 global-mobile-img" src="images/globle/image3s.jpeg">
        </div>
        <div class="col-lg-6 pt-2 container justify-content-center pl-5 global-content">
            <h4 style="font-family:'sans-serif">
                <b>
                    Save Time</b>
            </h4>
            <p style="font-size:18px; line-height:2em;">Automate payroll and concentrate on growing your business.</p>
            <h4 style="font-family:'sans-serif">
                <b> Save Money</b>
            </h4>
            <p style="font-size:18px; line-height:2em;">Manage payroll yourself and save while doing it. See Payroll
                Pricing </p>
            <h4 style="font-family:'sans-serif">
                <b> Happy Employees</b>
            </h4>
            <p style="font-size:18px; line-height:2em;">Pay employees accurately and on time to increase their
                productivity.</p>
            <h4 style="font-family:'sans-serif">
                <b> 100% Accuracy</b>
            </h4>
            <p style="font-size:18px; line-height:2em;">Deliver error-free paychecks, W-2s, and payroll reports.</p>
            <h4 style="font-family:'sans-serif">
                <b> Simplified Compliance</b>
            </h4>
            <p style="font-size:18px; line-height:2em;">Stay in compliance with IRS laws and reporting requirements.</p>
            <h4 style="font-family:'sans-serif">
                <b> Streamline Payroll</b>
            </h4>
            <p style="font-size:18px; line-height:1em;">Improve the efficiency of your company and employees.
            </p>
        </div>
    </div>
    <div class="row" style="background:#2c2b69;">
        <div class="col-12 container my-5 text-justify text-center text-white">
            <div class=" text-justify text-center text-white">
                <h1 class="global-heading">Generate 100% Legal UK Payslips</h1>
                <div class="my-3 d-flex">
                    <a class="btn btn-lg  btn-danger Generate " href="{{ route('global.payStub') }}">Generate Paystub
                        Now</a>
                </div>
                <h2 class="global-heading">Simple as ABC</h2>
            </div>

        </div>
    </div>
    <script>
        $('.basicTem').click(function() {
            var imageattr = $('option:selected', '.bt_id').attr('data-src');
            $('.setImage').attr('src', imageattr);
        });

        $('.advanceTem').click(function() {
            var imageattr = $('option:selected', '.at_id').attr('data-src');
            $('.setImage').attr('src', imageattr);
        });
    </script>
@endsection
