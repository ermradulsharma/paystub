<!doctype html>
<html lang="en">

<head>
    <!-- Basic -->
    <title>PAYSTUB</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;800&family=Public+Sans:wght@300&display=swap">


    <!-- Responsive CSS Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/newstyle.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/user-dashboard.css">

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}
    <style>
        select,
        select option {
            text-transform: capitalize
        }
    </style>
    @yield('style')
</head>

<body>
    <div class="container" style="max-width:1500px">
        <ul class="nav nav-justified navbar" style="max-width: 1445px;">
            <li class="nav-item">
                <a href="{{ url('/') }}"><img class="mr-3 mt-5" src="images/Paystub X.webp" style="width: 222px;"></a>
            </li>
            <li class="nav-item ml-3 ">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('usa') ? 'active' : '' }} " href="{{ url('usa') }}">USA</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('canada') ? 'active' : '' }}" href="{{ url('canada') }}">CANADA</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('uk') ? 'active' : '' }}" href="{{ url('uk') }}">UK</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('globle') ? 'active' : '' }}" href="{{ url('globle') }}">GLOBEL</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('form') ? 'active' : '' }}" href="{{ url('form') }}">W-2 FORM</a>
            </li>

            <li class="nav-item  ml-3 ">
                @guest
                <a class="btn btn-lg py-2 w-100 mt-5 btn-danger login registerBtn" href="javascript:void(0);">Login</a>
                <div class="d-none logoutDiv">
                    <a class="btn btn-lg py-2 w-100 mt-5 btn-danger " href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Log out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{csrf_field()}}
                    </form>
                </div>
                @else
                <a class="btn btn-lg py-2 w-100 mt-5 btn-danger " href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{csrf_field()}}
                </form>
                @endguest
            </li>

        </ul>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="{{ url('/') }}"><img class="mr-3 mt-5 toggle-logo" src="images/Paystub X.webp" style="width: 222px;"></a>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('usa') ? 'active' : '' }} " href="{{ url('usa') }}">USA</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('canada') ? 'active' : '' }}" href="{{ url('canada') }}">CANADA</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('uk') ? 'active' : '' }}" href="{{ url('uk') }}">UK</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('globle') ? 'active' : '' }}" href="{{ url('globle') }}">GLOBEL</a>
        <a class="btn btn-lg py-2 w-100 mt-5 navbtn nav-btn {{ request()->is('form') ? 'active' : '' }}" href="{{ url('form') }}">W-2 FORM</a>
    </div>
    <span style="font-size:30px;cursor:pointer" class="openbtn" onclick="openNav()">&#9776;</span>

    @yield('content')

    <!-- The Modal -->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title"><img src="images/Paystub X.webp" class="icon"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="google-btn mt-4">
                        <div class="google-icon-wrapper">
                            <img class="google-icon" src="data:image/png;base64,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" />
                        </div>
                        <a class="btn-text pr-1" href="{{ route('login.google') }}">Sign up with google</a>

                    </div>

                    <div class="text-center mt-4 mb-4">
                        <img src="images/Group 3.png" style="width:130px;">
                    </div>
                    <h6 class="text-center" style="color: #457bbe;">Sign Up Using Email</h6>
                    <p class="text-center"></p>

                    <form id="sendOTPForm" action="{{ url('sendOtp') }}" method="POST" class="text-center">
                        @csrf
                        <div class="px-lg-5">
                            <input type="email" id="email" name="email" class="form-control py-4" placeholder="Email *">
                        </div>

                        <button class="previewbtn mt-5" type="submit">Continue</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade otpModal" id="otpModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title"><img src="{{asset('/')}}images/Paystub X.webp" class="icon"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h5 class="text-center">Verify your Email Address</h5>
                    <div class=" text-center mt-4">
                        <div class="mail">
                            <img src="https://cdn4.iconfinder.com/data/icons/social-media-logos-6/512/112-gmail_email_mail-512.png" class="mailpic">
                        </div>

                        <h5 style="color: #457bbe;" class="mt-4 text-center">Almost There!</h5>
                        <p style="color: #02030359;font-size: 14px;font-family: serif;" class="text-center">Enter the Verification code to sent</p>
                        <form id="loginOtp" action="{{ url('loginWithOtp') }}" method="POST" class="text-center">
                            @csrf
                            <div class="px-lg-5">
                                <input type="hidden" id="hidden_email" name="email" class="d-none">
                                <input type="text" id="Verificationcode" name="code" class="form-control py-4" placeholder="Verification code *">
                            </div>

                            <button class="previewbtn mt-5" type="submit">Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer Section -->
    <div class="footerSection">
        <div class="container" style="max-width:1550px; margin:0 auto; padding:0px 20px;">
            <div class=" row py-5 justify-content-center" style="margin:0 auto;">
                <div class="col-lg-3 text-center m-auto">
                    <div class="container justify-content-center text-left">
                        <div class="flex-row">
                            <div style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center; margin-bottom:15px;">
                                <a class="w-100 footbtn font" href="{{ url('terms') }}">Terms & Conditions</a>
                            </div>
                            <div class="mt-3 " style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center; margin-bottom:15px;">
                                <a class="w-100 footbtn font" href="{{ url('privacy') }}">Privacy Policy</a>
                            </div>
                            <div class="mt-3 " style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center; margin-bottom:15px;">
                                <a class="w-100 footbtn font" href="{{ url('refund') }}">Refund Policy</a>
                            </div>
                            <div class="mt-3 " style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center;">
                                <a class="w-100 footbtn font" href="{{ url('contact') }}">Contact Us</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 text-center" style="margin-top:15px;">
                    <div class="container  justify-content-center">
                        <div class="container">
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-facebook   fbicon " aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-instagram ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-twitter ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-linkedin ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-youtube ml-2 socialicon" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-3 ">
                    <p class="text-white footer-text">COPYRIGHT © 2022
                        PaystubX, ALL RIGHTS RESERVED.</p>
                    <div class="container justify-content-center m-auto text-center">
                        <a href="{{ url('/') }}"><img class="footimg" src="images/satisfaction.webp"></a>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Footer Section -->
    <!-- End Footer Section -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $('.registerBtn').click(function() {
            $('#loginModal').modal('show');
        });
        $('.close').click(function() {
            $('.modal').modal('hide');
        });
        $('#sendOTPForm').on('submit', function() {
            $.ajax({
                url: "{{ url('sendOtp') }}",
                type: "POST",
                data: $('#sendOTPForm').serialize(),
                success: function(response) {
                    console.log('response ', response);
                    $("#loginModal").modal("hide");
                    $("#otpModal").modal("show");
                    toastr.success(response.message);
                    $('#hidden_email').val(response.email);
                },
                error: function(err) {
                    error = err.responseJSON;
                    console.log('err ', error);
                    toastr.error(error.message);
                }
            });
            return false;
        });
    </script>

    <script>
        $('#loginOtp').on('submit', function() {
            $.ajax({
                url: "{{ url('loginWithOtp') }}",
                type: "POST",
                data: $('#loginOtp').serialize(),
                success: function(response) {
                    console.log('response ', response);
                    $("#otpModal").modal("hide");
                    $("#loginModal").modal("hide");
                    toastr.success(response.message);
                    $('.registerBtn').removeClass('d-block');
                    $('.registerBtn').addClass('d-none');
                    $('.sendMailButton').removeClass('d-none');
                    $('.sendMailButton').addClass('d-block');
                    $('.logoutDiv').removeClass('d-none');
                },
                error: function(err) {
                    error = err.responseJSON;
                    console.log('err ', error);
                    toastr.error(error.message);
                }
            });
            return false;
        });
    </script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <script>
        $('.viewTempTemplate').click(function() {
            viewPDF();
        });


        $('.sendMailButton').click(function() {
            usaStoreData();
        });

        function viewPDF() {
            $.ajax({
                url: "{{ route('templates') }}",
                type: 'post',
                data: $('#usa_paystubx').serialize(),
                success: function(response) {
                    console.log('response ', response);
                    $('#tempView').attr('src',response.pdf);
                    $('#tempViewModal').modal('show');
                },
                error: function(err) {
                    data = err.responseJSON;
                    console.log('err ', data);
                }
            });
            return false;
        }

        function usaStoreData() {
            $.ajax({
                url: "{{ route('usaStoreData') }}",
                type: 'post',
                data: $('#usa_paystubx').serialize(),
                success: function(response) {
                    console.log('response ', response);
                    toastr.success(response.message);
                    setTimeout(function() {
                        window.location.href = "{{route('invoiceList')}}";
                    }, 1000);
                },
                error: function(err) {
                    error = err.responseJSON;
                    toastr.error(error.message);
                }
            });

        }
    </script>
    @yield('script')
</body>

</html>
