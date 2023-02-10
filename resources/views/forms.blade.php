@extends('layouts.app')
@section('content')

<div title="W2Forms-Header" class="mt-2" style="background:#ff6261;">

    <div class="container" style="max-width: 1452px;">
        <div class="row">
            <div class="col-lg-6 text-center  p-4  m-auto ">


                <div class="d-flex text-left">
                    <img class="fromimg" src="images/w2form/irslogo.png">
                    <div style="font-size:30px;
                    font-weight: 800;" class="text-white ml-2">
                        File Form W-2 Online for<br> 2021 Tax Year
                    </div>
                </div>



                <div class=" text-left pt-5">
                    <div class="text-white" style="font-size: 30px;font-weight: 500;">
                        What is a W-2 Form?
                    </div>
                    <p class="text-white formp"> A W-2, known
                        officially as a “Wage and Tax<br> Statement,” is a tax form employees use
                        to file federal<br> and state taxes. The form shows the amount of taxes<br> withheld from
                        the employee’s paycheck for the year,<br> and paid directly to the IRS and state
                        government by <br>their employer.</p>

                </div>

                <div class="mt-2 text-left d-flex">
                    <a class="btn btn-lg   btn-danger Generate1 " href="{{route('w2form.paystub')}}">Create W-2
                        Form</a>
                </div>





            </div>
            <div class="col-lg-6 justify-content-center form-main-img">
                <img class=" p-3 formimg1 " src="images/w2form/forms.png">
            </div>
        </div>

    </div>
</div>






<div style="background: #e9e6e6;">

    <div class="container" style="max-width: 1452px;">
        <div class="row">
            <div class="col-md-12 mt-4 mb-4">
                <div class=" text-center" style="font-size: 32px;
                font-weight: 700;"> What do you need to fill out a <span class="text-danger">W-2</span>?
                </div>
            </div>

            <div class="col-md-5 m-auto">
                <div class="container m-auto justify-content-center">
                    <p style="font-size: 20px; font-weight: 400;">When you’re ready to complete<br>your
                        W-2s for the year, you will<br> need the following information at<br> your fingertips:
                    </p>

                    <p style="" class="pt-5 formp1">Have this information ready? File your Form W-2
                        in less than 2 minutes.
                    </p>
                    <div class=" mt-5 justify-content-center d-flex">
                        <a class="btn btn-lg  btn-danger Generate " href="{{route('w2form.paystub')}}">Create W-2
                            Form</a>
                    </div>


                </div>
            </div>
            <div class="col-md-7 needw2 justify-content-center">

                <div class="mt-3">
                    <ul style="font-size: 20px;
                    color: white;
                    font-weight: 200;
                    line-height: 1.7em;">
                        <li class="">Personal
                            information
                            for
                            each employee, including name, address, and</br> Social Security number</li>
                        <li class="">Your employer
                            EIN
                            number
                        </li>
                        <li class="">Total amount of
                            wages
                            and/or tips paid for each employe</li>
                        <li class="">Total federal,
                            state,
                            and
                            local taxes withheld for each employe
                        </li>
                        <li class="">Total Social
                            Security
                            and
                            Medicare taxes withheld for each employe</li>
                        <li class="">Deductions for
                            dependent
                            care assistance programs for each employe</li>
                        <li class="">Other
                            compensation and
                            benefits including elective deferrals for</br> retirement plans and the cost of
                            employer-sponsored
                            health
                            coverage for</br> each employe</li>

                    </ul>



                </div>


            </div>
        </div>
    </div>
</div>


<div class="container-fluid" style="background: #e9e6e6;">
    <div class="container py-5" style="max-width: 1452px;">
        <div class=" text-center my-5" style="font-size: 32px;
        font-weight: bold;">Instructions for filling out Form <span class="text-danger">W-2</span>
        </div>


        <div class="row">

            <div class="col-lg-6 col-sm-12 col-md-12 pr-2">
                <div class=" pb-3">
                    <img class="w-100" src="images/w2form/5f7a31_51cacfb55402495080cabfc7162c18a5_mv2.webp">
                </div>
            </div>


            <div class="col-lg-6 col-sm-12 col-md-12 p-0 ">
                <div class="container justify-content-center p-0">
                    <p class=" text-left" style="font-size:20px; font-weight: 200;color:black;">
                        Remember that you’ll need to prepare and deliver a different W-2 form for<br> each employee.
                    </p>

                    <p style="font-size:20px; font-weight: 200;color:black; margin-bottom0;">Boxes A-F on a W-2 represents
                        employee/employer information:
                    </p>
                    <ul class="justify-content-center" style="font-size:20px; font-weight: 200;color:black;">
                        <li class="mt-1">Box A – Be
                            careful to ensure your employee’s social security number is<br> entered correctly her</li>
                        <li class="mt-1">Box B – Enter
                            your EIN number</li>
                        <li class="mt-1">Box C – Enter
                            the name and address of your business</li>
                        <li class="mt-1">Box D – This is
                            the control number, and is not necessary to us</li>
                        <li class="mt-1">Box E & F –
                            Enter your employee’s name and address</li>
                        <div class="my-3">
                            <a class="btn btn-lg  btn-danger Generate " href="{{route('w2form.paystub')}}">Create W-2
                                Form</a>
                        </div>
                    </ul>

                </div>



            </div>

        </div>


    </div>
</div>

<div class="" style="background: #e9e6e6;">
    <div class="container" style="max-width: 1452px;">
        <div class="col-2"></div>
        <div class="col-10">
            <div class="">
                <div class=" text-left" style="font-size:20px;colour:black; font-weight:200;">
                    Once complete, enter the following in the numbered boxes:
                </div>
                <ol style="font-size:20px;color:black; font-weight: 200;">
                    <li class="mt-2">Gross wages, tips, and
                        any other compensation.</li>
                    <li class="mt-2">Total amount of federal
                        income tax withheld from employee wages for the year.</li>

                    <li class="mt-2">Total amount of Social
                        Security wages for the year. Social Security wages can be different than the figure shown in Box
                        1, as Social Security wages also include any deferrals to retirement plans as well as
                        contributions to Health Savings Accounts. This box will also reflect whether the income
                        threshold ($137,700) has been hit. Once that threshold is reached, you would no longer include
                        the wages above $137,700.</li>

                    <li class="mt-2">Total of Social
                        Security tax withhel.</li>

                    <li class="mt-2">Total of Medicare
                        Wages. Like Social Security wages, Medicare wages can also include retirement deferrals and HSA
                        contributions, but unlike Social Security, there is no income threshold to reach, so all wages
                        are included in the Medicare wage total.</li>

                    <li class="mt-2">Total Medicare tax
                        withheld for the year.</li>

                    <li class="mt-2">Report any Social
                        Security tips received.</li>

                    <li class="mt-2">For restaurants and
                        bars, enter any allocated tips that the employee received during the year. Note that there are
                        several special rules for <span class="text-danger">restaurant payroll for tipped wages</span>
                        .</li>

                    <li class="mt-2">Box 9 is left blank. It
                        was previously used for businesses that were participating in the W-2 Verification Code pilot
                        program.</li>

                    <li class="mt-2">Report any dependent
                        care assistance that was deducted from employee wages, as well as any employer contributions
                        .</li>

                    <li class="mt-2">Enter any distributions
                        from nonqualified deferred compensation plans.</li>



                </ol>

            </div>
        </div>

    </div>



    <div class="container-fluid" style="background: #e9e6e6;">
        <div class="container" style="max-width: 1452px;">
            <div class="row">
                <div class="col-md-8 my-3 p-0">
                    <img class="formimg2 w-100" src="images/w2form/5f7a31_76101bf5bf7c4aa3906e133b06665388_mv2.webp">
                </div>
                <div class="col-md-3 mt-3 p-0">
                    <ol style="font-size:18px; font-weight: 200;" class="pl-4">
                        <li>Box 12 is where a variety of tax-deferred compensation, benefits, and non-monetary compensation are recorded.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="background: #e9e6e6;">

    <div class="col-md-7 mt-5 py-5 pl-5 container">

        <h1 class="" style="font-family:'serif;">Common mistakes to avoid while filling out Form W-2
        </h1>

        <div class="text-left mt-4">
            <p style="font-size:18px; font-weight: 200;">Misspelling your name or SSN in the W-2 form will
                most
                likely result in your employer rejecting it;<br>so make sure the information is entered correctly
            </p>

            <p style="font-size:18px; font-weight: 200;">Proper entry of the wages and tips is extremely
                important to avoid surprises during the tax season as you may end up owing money to the IRS. On the
                other hand, if you overreport your deductions, you will end up with a smaller take-home amount in
                your
                paycheck, but a larger tax refund at the end of the year which is like giving the IRS a free loan
            </p>

            <p style="font-size:18px; font-weight: 200;">Make sure you enter the correct value for dependent
                care
                benefits as it will also affect the amount of tax withheld from your paycheck
            </p>
        </div>
    </div>
</div>



<div class="container-fluid p-3" style="background:#2c2b69;">
    <div class="col-lg-12 my-5 justify-content-center  text-white">
        <div class=" text-justify text-center text-white">
            <h1>Generate 100% Legal UK Payslips</h1>
            <div class="my-3" style="display: flex;
                                   justify-content: center;">
                <a class="btn btn-lg  btn-danger Generate " href="{{route('w2form.paystub')}}">Create W-2
                    Form</a>
            </div>
            <h2>Simple as ABC</h2>
        </div>

    </div>
</div>

@endsection
