@extends('layouts.app')
@section('content')

<div>
    <div class="container-fluid" style="background-color: #ff7b7bfa;">
        <div class="text-center color-light">
            <h1>Form W-2</h1>
            <p>Start entering the Form W-2 information and e-file the return. It’s super simple. Fill, Submit &
                Download.</p>
        </div>
        <div class="container bg-light">
            <div clas="recipt-box">
                <div class="rec-box-border">
                    <div class="row">

                        <div class="col-md-2" style="border-right:1px solid red;">
                            <h5>22222</h5>
                        </div>
                        <div class="col-md-2" style="border-right:2px solid red;">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <label for="vehicle1"> VOID</label><br>
                        </div>
                        <div class="col-md-4" style="border: 2px solid red;">
                            <p>a Employee's social security number</p>
                            <input type="text" id="fname" name="fname" placeholder="enter text"><br>
                        </div>
                        <div class="col-md-4">
                            <p>For offical use only</p>
                            <p>OMB No. 1545-0008</p>
                        </div>
                    </div>
                </div>
            </div>

            <div clas="recipt-box">
                <div class="rec-box-border">
                    <div class="row">

                        <div class="col-md-6" style="border-right:1px solid red;">
                            <div class="row">
                                <div class="col-md-">
                                    <p>a Employee Identification Number (EIN)</p>
                                    <input type="text" id="fname" name="fname" placeholder="enter text"><br>
                                </div>


                                <div class="col-md-3">
                                    <p> Control Number</p>
                                    <input type="text" id="fname" name="fname" placeholder="enter text"><br>
                                </div>

                                <div class="col-md-3">
                                    <p> Control Number</p>
                                    <input type="text" id="fname" name="fname" placeholder="enter text"><br>
                                </div>

                                <div class="col-md-3">
                                    <p> Control Number</p>
                                    <input type="text" id="fname" name="fname" placeholder="enter text"><br>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection