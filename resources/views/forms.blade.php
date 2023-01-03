@extends('layouts.app')
@section('content')

<div title="W2Forms-Header" style="background:#ff6261;">

    <div class="container" style="max-width: 1452px;">
        <div class="row">
            <div class="col-lg-6 text-center  p-4  m-auto ">


                <div class="d-flex text-left">
                    <img class="fromimg" src="images/w2form/irslogo.png">
                    <h3 class="text-white">
                        File Form W-2 Online for<br> 2021 Tax Year
                    </h3>
                </div>



                <div class=" text-left pt-5">
                    <h3 class="text-white" style="font-family:'serif;">
                        <b>What is a W-2 Form?</b>
                    </h3>
                    <p class="mt-2 text-white formp"> A W-2, known
                        officially as a “Wage and Tax<br> Statement,” is a tax form employees use
                        to file federal<br> and state taxes. The form shows the amount of taxes<br> withheld from
                        the employee’s paycheck for the year,<br> and paid directly to the IRS and state
                        government by <br>their employer.</p>

                </div>

                <div class="mt-4 text-left d-flex">
                    <a class="btn btn-lg  mt-2  btn-danger Generate1 " href="{{url('w2paystub')}}">Create W-2
                        Form</a>
                </div>





            </div>
            <div class="col-lg-6 justify-content-center form-main-img">
                <img class=" p-3 formimg1 " src="images/w2form/5f7a31_5b45b8161f504caa982f334cd6edc821_mv2.png">
            </div>
        </div>

    </div>
</div>






<div style="background: #e9e6e6;">

    <div class="container" style="max-width: 1452px;">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h2 class=" text-center " style="font-family:'serif;"><b>
                        What do you need to fill out a <span class="text-danger">W-2</span>?</b>
                </h2>
            </div>

            <div class="col-md-5 m-auto">
                <div class="container m-auto justify-content-center">
                    <p style="font-size: 19px;
    font-weight: 500;">When you’re ready to complete<br>your
                        W-2s for the year, you will<br> need the following information at<br> your fingertips:
                    </p>

                    <p style="font-size:16px;" class="mt-5 pt-5">Have this information ready? File your Form W-2
                        in less than 2 minutes.s:
                    </p>
                    <div class=" mt-5 justify-content-center d-flex">
                        <a class="btn btn-lg  btn-danger Generate " href="{{url('w2paystub')}}">Create W-2
                            Form</a>
                    </div>


                </div>
            </div>
            <div class="col-md-7 needw2 justify-content-center">

                <div class="mt-3">
                    <ul>
                        <li class="mt-2 text-white" style="font-size:18px; font-family:'sans-serif;">Personal
                            information
                            for
                            each employee, including name, address, and Social Security number</li>
                        <li class="mt-2 text-white" style="font-size:18px; font-family:'sans-serif;">Your employer
                            EIN
                            numbes
                        </li>
                        <li class="mt-2 text-white" style="font-size:18px; font-family:'sans-serif;">Total amount of
                            wages
                            and/or tips paid for each employe</li>
                        <li class="mt-2 text-white" style="font-size:18px; font-family:'sans-serif;">Total federal,
                            state,
                            and
                            local taxes withheld for each employe
                        </li>
                        <li class="mt-2 text-white" style="font-size:18px; font-family:'sans-serif;">Total Social
                            Security
                            and
                            Medicare taxes withheld for each employe</li>
                        <li class="mt-2 text-white" style="font-size:18px; font-family:'sans-serif;">Deductions for
                            dependent
                            care assistance programs for each employe</li>
                        <li class="mt-2 text-white" style="font-size:18px; font-family:'sans-serif;">Other
                            compensation and
                            benefits including elective deferrals for retirement plans and the cost of
                            employer-sponsored
                            health
                            coverage for each employe</li>

                    </ul>



                </div>


            </div>
        </div>
    </div>
</div>


<div class="container-fluid" style="background: #e9e6e6;">
    <div class="container py-5" style="max-width: 1452px;">
        <h2 class=" text-center " style="font-family:'serif;"><b>

                Instructions for filling out Form <span class="text-danger">W-2</span></b>
        </h2>


        <div class="row">

            <div class="col-lg-6 col-sm-12 col-md-12">
                <div class=" pb-3">
                    <img class="w-100" src="images/w2form/5f7a31_51cacfb55402495080cabfc7162c18a5_mv2.webp">
                </div>
            </div>


            <div class="col-lg-6 col-sm-12 col-md-12 ">
                <div class="container justify-content-center ">
                    <p class=" text-left pt-3" style="font-weight: 200; font-size:18px;">
                        Remember that you’ll need to prepare and deliver a different W-2 form for<br> each employee.
                    </p>

                    <p style="font-size:18px; font-weight: 200; margin-bottom0;">Boxes A-F on a W-2 represents
                        employee/employer information:
                    </p>
                    <ul class="justify-content-center">
                        <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Box A – Be
                            careful to ensure your employee’s social security number is<br> entered correctly her</li>
                        <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Box B – Enter
                            your EIN number</li>
                        <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Box C – Enter
                            the name and address of your business</li>
                        <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Box D – This is
                            the control number, and is not necessary to us</li>
                        <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Box E & F –
                            Enter your employee’s name and address</li>
                        <div class="my-4">
                            <a class="btn btn-lg  btn-danger Generate " href="{{url('w2paystub')}}">Create W-2
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
        <div class="col-8">
            <div class="">
                <h4 class=" text-left" style="font-family:'serif;">
                    Once complete, enter the following in the numbered boxes:
                </h4>
                <ol>
                    <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;" ;">Gross wages, tips, and
                        any other compensation</li>
                    <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Total amount of federal
                        income tax withheld from employee wages for the year</li>

                    <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Total amount of Social
                        Security wages for the year. Social Security wages can be different than the figure shown in Box
                        1, as Social Security wages also include any deferrals to retirement plans as well as
                        contributions to Health Savings Accounts. This box will also reflect whether the income
                        threshold ($137,700) has been hit. Once that threshold is reached, you would no longer include
                        the wages above $137,700</li>

                    <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Total of Social
                        Security tax withhel</li>

                    <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Total of Medicare
                        Wages. Like Social Security wages, Medicare wages can also include retirement deferrals and HSA
                        contributions, but unlike Social Security, there is no income threshold to reach, so all wages
                        are included in the Medicare wage total</li>

                    <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Total Medicare tax
                        withheld for the yea</li>

                    <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Report any Social
                        Security tips received</li>

                    <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">For restaurants and
                        bars, enter any allocated tips that the employee received during the year. Note that there are
                        several special rules for <span class="text-danger">restaurant payroll for tipped wages</span>
                    </li>

                    <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Box 9 is left blank. It
                        was previously used for businesses that were participating in the W-2 Verification Code pilot
                        program</li>

                    <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Report any dependent
                        care assistance that was deducted from employee wages, as well as any employer contributions
                    </li>

                    <li class="mt-2 text-black" style="font-size:18px; font-weight: 200;">Enter any distributions
                        from nonqualified deferred compensation plans</li>



                </ol>

            </div>
        </div>

    </div>



    <div class="container-fluid" style="background: #e9e6e6;">
        <div class="container" style="max-width: 1452px;">
            <div class="row">
                <div class="col-md-8">



                    <img class="formimg2" src="images/w2form/5f7a31_76101bf5bf7c4aa3906e133b06665388_mv2.webp">


                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="background: #e9e6e6;">

    <div class="col-md-7 mt-5 container">

        <h1 class="" style="font-family:'serif;">Common mistakes to avoid while filling out Form W-2
        </h1>

        <div class="text-left mt-3">
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
                <a class="btn btn-lg  btn-danger Generate " href="{{url('w2paystub')}}">Create W-2
                    Form</a>
            </div>
            <h2>Simple as ABC</h2>
        </div>

    </div>
</div>

@endsection