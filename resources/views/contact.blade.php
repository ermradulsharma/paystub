@extends('layouts.app')
@section('content')
<div>
    <div class="container mb-5 p-5 mt-2" style="background:#f6ebe4;">
        <div class="row " style="justify-content: center;">
            <div class="col-md-6">
                <h4 class="text-center">How can we help?</h4>

                <label for="fname" class="finame">First name:</label><br>
                <input type="text" id="name" name="fname" class="w-100"><br>

                <label for="fname" class="finame mt-5">Email *</label><br>
                <input type="text" id="name" name="fname" class="w-100"><br>

                <label for="w3review" class="finame mt-5">Tell us what you need help with</label>
                <textarea id="name" name="w3review" rows="7" cols="56"></textarea>
                <div class="text-center"><button class="sendbtn">Send</button></div>
            </div>
        </div>
    </div>
</div>
@endsection
