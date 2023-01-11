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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" >
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;800&family=Public+Sans:wght@300&display=swap">

    <!-- Responsive CSS Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/newstyle.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <div class="container" style="max-width:1500px">
        <ul class="nav nav-justified navbar">
            <li class="nav-item">
                <a href="{{url('/')}}"><img class="mr-3 mt-5" src="images/Paystub X.webp" style="width: 222px;"></a>
            </li>
            <li class="nav-item ml-3 ">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{request()->is('usa') ? 'active' : ''}} " href="{{url('usa')}}">USA</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{request()->is('canada') ? 'active' : ''}}" href="{{url('canada')}}">CANADA</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{request()->is('uk') ? 'active' : ''}}" href="{{url('uk')}}">UK</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{request()->is('globle') ? 'active' : ''}}" href="{{url('globle')}}">GLOBLE</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2 w-100 mt-5 navbtn {{request()->is('form') ? 'active' : ''}}" href="{{url('form')}}">W<sub>-2</sub> FORM</a>
            </li>
            <li class="nav-item float-rigth ml-3 ">
                <a class="btn btn-lg py-2 w-100 mt-5 btn-danger login " href="{{url('login')}}">Login</a>
            </li>
        </ul>
    </div>

    @yield('content')

    <!-- Start Footer Section -->
    <div class="footerSection">
        <div class="container">
            <div class=" row p-5 justify-content-center">
                <div class="col-lg-3 text-center m-auto">
                    <div class="container justify-content-center text-left">
                        <div>
                            <a class="w-100 footbtn" style="font-family: Futura,Trebuchet MS,Arial,sans-serif; font-size:20px;" href="{{url('terms')}}">Terms & Conditions</a>
                        </div>
                        <div class="mt-3">
                            <a class="w-100 footbtn" style="font-family: Futura,Trebuchet MS,Arial,sans-serif; font-size:20px;" href="{{url('privacy')}}">Privacy Policy</a>
                        </div>
                        <div class="mt-3">
                            <a class="w-100 footbtn" style="font-family: Futura,Trebuchet MS,Arial,sans-serif; font-size:20px;" href="{{url('refund')}}">Refund Policy</a>
                        </div>
                        <div class="mt-3">
                            <a class="w-100 footbtn" style="font-family: Futura,Trebuchet MS,Arial,sans-serif; font-size:20px;" href="{{url('contact')}}">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-3 ">
                    <div class="container justify-content-center m-auto">
                        <a href="{{url('/')}}"><img class="w-100" src="images/satisfaction.webp"></a>
                    </div>
                </div>
                <div class="col-lg-5 text-center m-auto ">
                    <div class="container  justify-content-center">
                        <p class="text-white" style="font-family: Futura,Trebuchet MS,Arial,sans-serif; font-size:20px;">COPYRIGHT © 2022 PaystubX,<br> ALL RIGHTS RESERVED.</p>
                        <div class="container">
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-facebook   fbicon " aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-instagram ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-twitter ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-linkedin ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-youtube ml-2 socialicon" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Section -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- <popup link> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <popup link> -->
</body>

</html>
