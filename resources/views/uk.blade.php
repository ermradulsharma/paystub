@extends('layouts.app')
@section('content')



<div title="Uk-header" style="background: #ff6261; " class="mt-2">
    <div class="container-fluid">
        <div class="container" style="max-width: 1613px">
            <div class="row">
                <div class="col-lg-6  col-md-12 mt-3 text-center2">
                    <div class="text-white"
                        style="font-family:futura-lt-w01-light,futura-lt-w05-light,sans-serif; font-size:39px; line-height:60.5px; font-weight: 100;">
                        <p class="mainhead" style="text-align:center;"> Generate 100% Legal UK <br>Payslips
                            Instantly</p>
                    </div>

                    <div class="mt-3 pt-2">
                        <div class="text-white Payslips" style="">
                            Join Paystubx: we’re the best payslip maker for a<br> reason. Join thousands of
                            satisfied
                            independent<br> contractors and small business owners and get the<br> highest quality UK
                            payslips — right to your inbox! We<br> make it easy. Guaranteed. A simple way to make<br>
                            check
                            stubs online. Generate, print and use. It’s that<br> simple!
                        </div>
                    </div>

                    <div class="mt-5 pt-3 pl-5" style="">
                        <a class="Generate btn-lg btn" href="{{route('uk.payStub') }}">Generate Paystub Now</a>
                    </div>
                    <div class="mt-5 pt-3 d-flex uk-goo" style="padding: 25px 49px; ">
                        <a href="https://www.google.com/" target="_blank"><img class="storbtn" src="images/Google_Play_Store_badge_EN.webp"></a>
                        <a href="https://www.google.com/" target="_blank"><img class="storbtn ml-3" src="images/Download_on_the_App_Store_Badge.webp"></a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 ukimg1">
                    <div class="">
                        <img class=" my-2 pt-1 imguk" src="images/uk/payslip_uk.png ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-5" style="background:#e9e6e6;">

        <div class=" container  mt-3  paddingleft" style="">

            <div class="ukp">Create Payslips For Yourself</div>


            <div style="font-size:34px" class="uktext">
                Create Payslips For Your Employees</div>


            <ul class="mt-4">
                <li class="mt-1 ukli">Help employees qualify for loans, housing & mor</li>


                <li class="mt-1  ukli">Comply with UK employment la</li>


                <li class="mt-1  ukli">Be transparent with compensatio</li>


                <li class="mt-1  ukli">Trust auto-calculation for every pay sli</li>


                <li class="mt-1  ukli">Manage all payroll documents in one plac</li>
            </ul>


            <div class="uktext">Show proof of income.</div>


            <ul>


                <li class=" mt-1 ukli">Rent an apartmen </li>


                <li class=" mt-1 ukli">Qualify for a mortgag </li>


                <li class=" mt-1 ukli">Request a small business loa </li>


                <li class=" mt-1 ukli">Verify income for child support or alimon </li>


                <li class=" mt-1 ukli">Apply for medical insuranc </li>

            </ul>


            <div class="uktext">Online payroll No software require</div>


            <div class="m-auto create-p ">Most payroll systems
                were
                developed in the last century to ,<br> run on a PC. Our software works online
                (aka cloud or SaaS)<br> and is accessed with any web browser on any device e.g.<br> Mac, PC,
                Tablet or
                Mobile. That means no software to install,<br> no updates, backup or archive – we take care of
                it all for you.<br>Multi-user enables any number of administrators or employees.</br>
            </div>
        </div>






    </div>

    <div class="col-lg-7 justify-content-center p-0"  style="background: #473b8f;"   >

        <img class="w-100 " src="images/uk/5f7a31_55ea9a38453f43069cf299e6a0617f08_mv2.jpeg">

    </div>
</div>


<div class="row">
    <div class="col-6 p-0">
        <img class="w-100 " src="images/uk/5f7a31_d7bc4a65fef4440895857b939a506ed4_mv2.jpeg">

    </div>
    <div class="col-6 p-0">
        <img class="w-100 " src="images/uk/5f7a31_a5696d4a3b6345d99d19a85129ccfdd7_mv2.png">

    </div>
</div>


<div class="row" style="background:#2c2b69;">
    <div class="col-12 my-5 text-justify text-center text-white">
        <div class=" text-justify text-center text-white">
            <h1 style="font-family: 'Futura LT';">Generate 100% Legal UK Payslips</h1>
            <div class="my-3 d-flex">
                <a class="Generate btn-lg btn" href="{{route('uk.payStub') }}">Generate Paystub
                    Now</a>


            </div>
            <h2 style="font-family: 'Futura LT';">Simple as ABC</h2>
        </div>

    </div>
</div>

<div class="container-xxl" style="background: #f7f9ff;" >
   <img class="w-100 " src="images/uk/paystubx_uk_picture.png">
</div>

<div class="container" style="max-width:1613px;">
    <div class="row">
        <div class="col-lg-10 mt-3">
            <p class="ukp1">
                Basic pay: this is your earnings before deductions. A ‘deduction’ is money taken off, like a tax
                for
                example.

                Net pay: this is your earnings after deductions. This tends to be the most interesting number
                since
                it’s
                what
                will actually be paid into your bank account.

                Variable deductions: these are deductions that may change each time you’re paid, such as sick
                pay.
            </p>


            <h1 class="ukh1">Personal information</h1>
            <p class="ukp1">Your payroll number: some companies use payroll numbers to help them identify employees on
                their
                payroll.<br>

                Your tax code: This code normally starts with a number and ends with a letter. It tells your
                employer
                how much tax you should pay – so if it’s wrong, you may pay too much.<br>
                Your National Insurance (NI) number: This is used to help HMRC track your income so they can tax
                you
                the
                correct amount. It never changes, so it should be exactly the same on all your payslips.</p>

            <h1 class="ukh1">Earnings</h1>
            <p class="ukp1">Your payslip must show the total amount you’ve earned. Sometimes, your employer breaks this
                down
                into
                categories, such as:

                Basic pay: this is how much you’ve earned before any ‘extras’ (for example, commission)<br>

                Commission and bonuses: this may be what you’ve earned on top of your usual salary, usually for
                doing
                well at your job.<br>

                Overtime: some employers may pay you extra for working overtime, or a higher rate for working on
                weekends for example.<br>

                Expenses reimbursement: if you bought something you need for your job – such as petrol or
                stationery
                –
                some employers will pay you back. They may include this in your payslip or do it separately.<br>

                Sick pay: if you’re too ill to work, you may be entitled to Statutory Sick Pay and/or
                occupational
                sick
                pay. This would replace your usual pay while you’re off ill.<br>

                Maternity, paternity and adoption pay: these may replace your usual pay if you’re off work
                because
                you
                have a new child.<br>

                Workplace benefits: these might include things like healthcare insurance or a company car.</p>



            <h1 class="ukh1">Deductions</h1>
            <p class="ukp1">A deduction is money taken off your earnings before you’re paid.<br>

                Income tax: this may also appear as ‘PAYE tax’ on your payslip. How much income tax you should
                pay
                depends on your tax code.<br>

                Pension contributions: some employees give up part of their salary to be paid into a workplace
                pension.
                Pension contributions from your employer may also be shown.<br>

                Student loan payments: if you’re repaying a student loan, your employer will take the money
                directly
                out
                of your salary to give to the Student Loans Company.<br>

                Court orders and child maintenance: your employer may be asked to take money directly from your
                pay
                packet for things like unpaid fines, debt repayments and child maintenance.<br>

                Repayments for workplace benefits: some employers offer loans for things like rail season
                tickets.
                They’ll usually take the repayments directly from your earnings.<br>

                Payroll Giving: this is a scheme that allows employees to donate to charity directly from their
                pay.</p>



            <p class="ukp1"></p>
            </p>
            <h1 class="ukh1">Other information</h1>
            <p class="ukp1">Pay date: this is the date the money should be paid into your bank account.<br>

                Pay method: this is how you’ll be paid, for example by BACS (i.e. directly into your bank
                account).<br>

                Tax period: this is the period of time you’ve been taxed for. It’s usually shown as the month
                number,
                e.g. ‘02’ to mean February.<br>

                Summary of the year to date: Your payslip may show your total earnings, deductions and pay for
                the
                current financial year (which runs from 6 April to 5 April). This can be particularly helpful
                for
                checking if you’ve been taxed correctly.</p>

            <div class="my-4 mb-5 ukbtn1">
                <a class="Generate btn-lg btn" href="{{route('uk.payStub') }}">Generate Paystub
                    Now</a>
            </div>
        </div>

    </div>

</div>



@endsection
