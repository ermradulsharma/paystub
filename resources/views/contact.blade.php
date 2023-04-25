@extends('layouts.app')
@section('content')
<div>
    <div class="container mb-5 p-5 mt-2" style="background:#f6ebe4;">
        <div class="row " style="justify-content: center;">
            <div class="col-md-6">
                <h4 class="text-center">How can we help?</h4>
                <form id="contactForm" action="{{route('contact-form')}}" method="post">
                    @csrf
                    <label for="fname" class="finame">First name:</label><br>
                    <input type="text" id="name" name="name" class="w-100"><br>

                    <label for="fname" class="finame mt-5">Email *</label><br>
                    <input type="email" id="name" name="email" class="w-100"><br>

                    <label for="w3review" class="finame mt-5">Tell us what you need help with</label>
                    <textarea id="name" name="w3review" rows="7" cols="56"></textarea>
                    <div class="text-center"><button type="submit" class="sendbtn">Send</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
