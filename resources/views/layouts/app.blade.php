<!doctype html>
<html lang="en">

<head>
    <!-- Basic -->
    <title>PAYSTUB</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;800&family=Public+Sans:wght@300&display=swap">


    <!-- Responsive CSS Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/newstyle.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/user-dashboard.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
                <a href="{{ url('/') }}"><img class="mr-3 mt-5" src="images/Paystub X.webp"
                        style="width: 222px;"></a>
            </li>
            <li class="nav-item ml-3 ">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('usa') ? 'active' : '' }} "
                    href="{{ url('usa') }}">USA</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('canada') ? 'active' : '' }}"
                    href="{{ url('canada') }}">CANADA</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('uk') ? 'active' : '' }}"
                    href="{{ url('uk') }}">UK</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('globle') ? 'active' : '' }}"
                    href="{{ url('globle') }}">BLOBEL</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{ request()->is('form') ? 'active' : '' }}"
                    href="{{ url('form') }}">W-2 FORM</a>
            </li>
            <li class="nav-item  ml-3 ">
                <a class="btn btn-lg py-2 w-100 mt-5 btn-danger login " href="{{ url('login') }}">Login</a>
            </li>
        </ul>
    </div>

    @yield('content')

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
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
                            <img class="google-icon"
                                src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                        </div>
                        <a class="btn-text pr-1" href="{{ route('login.google') }}">Sign up with google</a>

                    </div>

                    <div class="text-center mt-4 mb-4">
                        <img src="images/Group 3.png" style="width:130px;">
                    </div>
                    <h6 class="text-center" style="color: #457bbe;">Sign Up Using Email</h6>
                    <p class="text-center">

                    <form id="sendOTPForm" action="{{ url('sendOtp') }}" method="POST" class="text-center">
                        @csrf
                        <input type="email" id="email" name="email" class="singup" placeholder="Email *">
                        <br><br>
                        <button class="continue mt-2" type="submit">Continue</button>
                        <a href="#" style="text-decoration: none;color: #0000007a">
                            {{--  <p class="text-center mt-3" style="color: #0000007a;font-size: 13px;">Already have
                                account?
                                <u style="color:red;">
                                    <span style="color:red;">Sign In</span>
                                </u>
                            </p> --}}
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background: #115caecf;">
                    <h4 class="modal-title"><img src="images/Paystub X.webp" class="icon"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h5 class="text-center">Verify your Email Address</h5>
                    <div class=" text-center mt-4">
                        <div class="mail">
                            <img src="images/email(3).png" class="mailpic">
                        </div>

                        <h5 style="color: #457bbe;" class="mt-4 text-center">Almost There!</h5>
                        <p style="color: #02030359;font-size: 14px;font-family: serif;" class="text-center">Enter
                            the
                            Verification code to sent</p>
                        <form id="loginOtp" action="{{ url('loginWithOtp') }}" method="post">
                            @csrf
                            <input type="text" id="code" name="code" class="singup1 text-center"
                                placeholder="enter otp">
                            <div style="color: red;font-size: 13px; font-family: serif;display:none;">
                                <i class="fa fa-exclamation-circle">
                                    Verification code required
                                </i>
                            </div>
                            <div></div>
                            {{-- <p style="color: #0000004d; font-size: 11px;">Didn't receive an email</p>
                            <p style="color: #04050778;font-size: 12px; font-family: cursive;">Check Your Spanspan
                                folder<span style="color:red;"> Or </span>resend code</p> --}}
                            <button class="continue mt-3" type="submit">verify</button>
                        </form>
                    </div>
                </div>
                </p>



            </div>
        </div>
    </div>
    <!-- Start Footer Section -->
    <div class="footerSection">
        <div class="container" style="max-width:1550px; margin:0 auto; padding:0px 20px;">
            <div class=" row py-5 justify-content-center">
                <div class="col-lg-3 text-center m-auto">
                    <div class="container justify-content-center text-left">
                        <div class="flex-row">
                        <div style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center; margin-bottom:15px;">
                            <a class="w-100 footbtn font"
                                href="{{ url('terms') }}">Terms & Conditions</a>
                        </div>
                        <div class="mt-3 " style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center; margin-bottom:15px;">
                            <a class="w-100 footbtn font"
                                href="{{ url('privacy') }}">Privacy Policy</a>
                        </div>
                        <div class="mt-3 "style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center; margin-bottom:15px;">
                            <a class="w-100 footbtn font"
                                href="{{ url('refund') }}">Refund Policy</a>
                        </div>
                        <div class="mt-3 "style="padding:12px; border:1px solid #fff; border-radius:5px;max-width:220px; text-align:center;">
                            <a class="w-100 footbtn font"
                                href="{{ url('contact') }}">Contact Us</a>
                        </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-5 text-center" style="margin-top:15px;">
                    <div class="container  justify-content-center">
                        <div class="container">
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-facebook   fbicon "
                                    aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i
                                    class="fa fa-instagram ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i
                                    class="fa fa-twitter ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i
                                    class="fa fa-linkedin ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i
                                    class="fa fa-youtube ml-2 socialicon" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-3 ">
                <p class="text-white">COPYRIGHT © 2022
                            PaystubX, ALL RIGHTS RESERVED.</p>
                    <div class="container justify-content-center m-auto text-center">
                        <a href="{{ url('/') }}"><img class="footimg" src="images/satisfaction.webp"></a>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Footer Section -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"
        integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
        integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- <popup link> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <popup link> -->
    @yield('script')

    <script>
        $('#sendOTPForm').on('submit', function() {

            $.ajax({
                url: "{{ url('sendOtp') }}",
                type: "POST",
                data: $('#sendOTPForm').serialize(),
                success: function(response) {
                    console.log('response ', response);
                    $('#myModal').modal('hide');
                    $('#myModal1').modal('show');
                },
                error: function(err) {
                    error = err.responseJSON;
                    console.log('err ', error);

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
                    $('#myModal1').modal('hide');
                    alert('login successfully');
                },
                error: function(err) {
                    error = err.responseJSON;
                    console.log('err ', error);
                }
            });
            return false;
        });
    </script>
</body>

</html>
