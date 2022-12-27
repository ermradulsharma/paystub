@extends('layouts.app')
@section('content')



<div title="Uk-header" style="background: #ff6261; ">

    <div class="row pb-5">

        <div class="col-lg-6 text-center  mt-5 pt-5 m-auto ">
            <div class="row m-auto" style="justify-content: center;">
                
                    <div class="container-fluid">
                        <div class="container">

                            <h1 class="text-white" style="font-family:'serif;"><b>Generate 100% Legal UK Payslips
                                    Instantly</b>
                            </h1>

                            <div class="mt-5 pt-3">
                                <div class="text-white Payslips" style="">
                                    Join Paystubx: we’re the best payslip maker for a reason. Join thousands of
                                    satisfied
                                    independent contractors and small business owners and get the highest quality UK
                                    payslips — right to your inbox! We make it easy. Guaranteed. A simple way to make
                                    check
                                    stubs online. Generate, print and use. It’s that simple!
                                </div>
                            </div>

                            <div class="mt-5 pt-3">
                            <a class="Generate btn-lg btn" href="{{url('uk-paystub') }}">Generate Paystub
                    Now</a>
                            </div>
                            <div class="mt-5 pt-3 d-flex" style="margin: auto;
                                justify-content: center;">
                                <a href="https://www.google.com/"><img class="storbtn "
                                        src="images/Google_Play_Store_badge_EN.webp"></a>
                                <a href="https://www.google.com/"><img class="storbtn ml-3"
                                        src="images/Download_on_the_App_Store_Badge.webp"></a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 justify-content-center">
            <img class="w-100 mt-5 pt-3" src="images/uk/payslip_uk.png">
        </div>
        </div>


        

    </div>



</div>


<div class="row">
    <div class="col-lg-6  justify-content-center create-container" style="background:#e9e6e6;">
        
            <div class=" container m-auto ">
                    <h3 style="font-family:'sans-serif">
                        <b>Create Payslips For Yourself</b>
                    </h3>

                    <h5 style="font-family:'sans-serif;">

                        Create Payslips For Your Employees</h5>

                    <div>
                    
                            <li class="mt-1">Help employees qualify for loans, housing & mor</li>
                        
                    
                            <li class="mt-1">Comply with UK employment la</li>
                        
                    
                            <li class="mt-1">Be transparent with compensatio</li>
                        
                    
                            <li class="mt-1">Trust auto-calculation for every pay sli</li>
                        
                    
                            <li class="mt-1">Manage all payroll documents in one plac</li>
                        
                    </div>

                    <h3 style="font-family:'sans-serif">
                        <b>Show proof of income.</b>
                    </h3>

                    <div>

                    
                            <li class=" mt-1">Rent an apartmen </li>
                        
                    
                            <li class=" mt-1">Qualify for a mortgag </li>
                        
                    
                            <li class=" mt-1">Request a small business loa </li>
                        
                    
                            <li class=" mt-1">Verify income for child support or alimon </li>
                        
                    
                            <li class=" mt-1">Apply for medical insuranc </li>
                        
                    </div>

                    <h3 class="mt-2" style="font-family:'sans-serif">
                        <b>Online payroll No <br> software require</b>
                    </h3>

                    <p class="m-auto create-p" style="font-family:'sans-serif; font-size:50px;">Most payroll systems were
                        developed in the last century to ,<br> run on a PC. Our software works online
                        (aka cloud or SaaS)<br> and is accessed with any web browser on any device e.g.<br> Mac, PC,
                        Tablet or
                        Mobile. That means no software to<br> install, no updates, backup or archive – we take care of
                        it<br>
                        all for you.
                    </p>
                </div>



    


    </div>

    <div class="col-lg-6  justify-content-center p-0">
       
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
            <h1>Generate 100% Legal UK Payslips</h1>
            <div class="my-3">
            <a class="Generate btn-lg btn" href="{{url('uk-paystub') }}">Generate Paystub
                    Now</a>

               
            </div>
            <h2>Simple as ABC</h2>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-12">
        <img class="w-100 " src="images/uk/paystubx_uk_picture.png">
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-10 mt-3">
            <p>
                Basic pay: this is your earnings before deductions. A ‘deduction’ is money taken off, like a tax for
                example.

                Net pay: this is your earnings after deductions. This tends to be the most interesting number since it’s
                what
                will actually be paid into your bank account.

                Variable deductions: these are deductions that may change each time you’re paid, such as sick pay.</p>


            <h1>Personal information</h1>
            <p>Your payroll number: some companies use payroll numbers to help them identify employees on their payroll.<br>

                Your tax code: This code normally starts with a number and ends with a letter. It tells your employer
                how much tax you should pay – so if it’s wrong, you may pay too much.<br>
                Your National Insurance (NI) number: This is used to help HMRC track your income so they can tax you the
                correct amount. It never changes, so it should be exactly the same on all your payslips.</p>

            <h1>Earnings</h1>
            <p>Your payslip must show the total amount you’ve earned. Sometimes, your employer breaks this down into
                categories, such as:

                Basic pay: this is how much you’ve earned before any ‘extras’ (for example, commission)<br>

                Commission and bonuses: this may be what you’ve earned on top of your usual salary, usually for doing
                well at your job.<br>

                Overtime: some employers may pay you extra for working overtime, or a higher rate for working on
                weekends for example.<br>

                Expenses reimbursement: if you bought something you need for your job – such as petrol or stationery –
                some employers will pay you back. They may include this in your payslip or do it separately.<br>

                Sick pay: if you’re too ill to work, you may be entitled to Statutory Sick Pay and/or occupational sick
                pay. This would replace your usual pay while you’re off ill.<br>

                Maternity, paternity and adoption pay: these may replace your usual pay if you’re off work because you
                have a new child.<br>

                Workplace benefits: these might include things like healthcare insurance or a company car.</p>



            <h1>Deductions</h1>
            <p>A deduction is money taken off your earnings before you’re paid.<br>

                Income tax: this may also appear as ‘PAYE tax’ on your payslip. How much income tax you should pay
                depends on your tax code.<br>

                Pension contributions: some employees give up part of their salary to be paid into a workplace pension.
                Pension contributions from your employer may also be shown.<br>

                Student loan payments: if you’re repaying a student loan, your employer will take the money directly out
                of your salary to give to the Student Loans Company.<br>

                Court orders and child maintenance: your employer may be asked to take money directly from your pay
                packet for things like unpaid fines, debt repayments and child maintenance.<br>

                Repayments for workplace benefits: some employers offer loans for things like rail season tickets.
                They’ll usually take the repayments directly from your earnings.<br>

                Payroll Giving: this is a scheme that allows employees to donate to charity directly from their pay.</p>
            <h1>Other information</h1>
            <p>Pay date: this is the date the money should be paid into your bank account.<br>

                Pay method: this is how you’ll be paid, for example by BACS (i.e. directly into your bank account).<br>

                Tax period: this is the period of time you’ve been taxed for. It’s usually shown as the month number,
                e.g. ‘02’ to mean February.<br>

                Summary of the year to date: Your payslip may show your total earnings, deductions and pay for the
                current financial year (which runs from 6 April to 5 April). This can be particularly helpful for
                checking if you’ve been taxed correctly.</p>

            <div class="my-3">
            <a class="Generate btn-lg btn" href="{{url('uk-paystub') }}">Generate Paystub
                    Now</a>
            </div>
        </div>

    </div>

</div>



@endsection