<!doctype html>

<html lang="en">

<head>

    <!-- Basic -->
    <title>PAYSTUB</title>



    <!-- Bootstrap CSS  -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">

    <!-- Font Awesome CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <!-- Sulfur CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="newstyle.css">

    <!-- Responsive CSS Style -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css">


    <script src="js/modernizrr.js"></script>

    <!--  <link rel="icon" sizes="192x192" href="{{asset('/')}}images/favicon.png">
    <link rel="shortcut icon" href="{{asset('/')}}images/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('/')}}images/favicon.png" type="image/x-icon" /> -->
</head>

<body>

    <!-- Start Header Section -->
    <div class="row">
        <div class="col-10">

            <div class=" container ">

                <nav class="navbar navbar-expand fixed py-5">
                    <div class="row">
                        <div class="col-4">
                            <div class="mt-3">
                                <a href="{{url('/')}}"><img class="w-100" src="images/Paystub X.webp"></a>
                            </div>
                        </div>

                        <div class="col-8 mt-3">


                            <div class="row">
                                <div class="col-2">
                                    <a class="btn btn-lg  p-2 w-100  navbtn" href="{{url('/')}}">USA</a>

                                </div>
                                <div class="col-2">
                                    <a class="btn btn-lg p-2 w-100 navbtn" href="{{url('/')}}">CANADA</a>

                                </div>
                                <div class="col-2   ">
                                    <a class="btn btn-lg  p-2 w-100  navbtn" href="{{url('/')}}">UK</a>

                                </div>
                                <div class="col-2">
                                    <a class="btn btn-lg  p-2 w-100   navbtn" href="{{url('/')}}">GLOBLE</a>

                                </div>
                                <div class="col-2">
                                    <a class="btn btn-lg  p-2 w-100   navbtn" href="{{url('/')}}">FORM</a>

                                </div>
                                <div class="col-2">
                                    <a class="btn btn-md  p-2 w-100  btn-danger login" href="{{url('/')}}">Login</a>

                                </div>
                            </div>



                        </div>

                    </div>

                </nav>
            </div>
        </div>

    </div>

    <!-- End Header Section -->






    @yield('content')



    <!-- Start Footer Section -->
<div class="footerSection">

    <div class="container">

        <div class="row">
            <div class="col-2 my-5">
                <div>
                <a class="btn btn-lg  p-2 w-100 border border-white  footbtn" href="{{url('terms')}}">Terms & Conditions</a>
                </div>
                <div class="mt-3">
                <a class="btn btn-lg  p-2 w-100 border border-white  footbtn" href="{{url('privacy')}}">Privacy Policy</a>
                </div>
                <div class="mt-3">
                <a class="btn btn-lg  p-2 w-100 border border-white  footbtn" href="{{url('refund')}}">Refund Policy</a>
                </div>
                <div class="mt-3">
                <a class="btn btn-lg  p-2 w-100 border border-white  footbtn" href="{{url('contact')}}">Contact Us</a>
                </div>
            </div>

             <div class="col-1"></div>

            <div class="col-4">
                <div class="row mt-5 pt-3">
                    <div class="col-2">
                    <a href="{{url('/')}}"><img class="w-100" src="images/insta.png"></a>
                    </div>
                    <div class="col-2">
                    <a href="{{url('/')}}"><img class="w-100" src="images/fb.png"></a>
                    </div>
                    <div class="col-2">
                    <a href="{{url('/')}}"><img class="w-100" src="images/tweet.png"></a>
                    </div>
                    <div class="col-2">
                    <a href="{{url('/')}}"><img class="w-100" src="images/linkd.png"></a>
                    </div>
                    <div class="col-2">
                    <a href="{{url('/')}}"><img class="w-100" src="images/youtube.png"></a>
                    </div>
                    <div class="col-2">
                    <a href="{{url('/')}}"><img class="w-100" src="images/tiktok.png"></a>
                    </div>
                     
                </div>
            </div>

            <div class="col-1"></div>

            <div class="col-4 ">
                <div class="row mt-5 text-center">
                <p class="text-white">COPYRIGHT © 2022 PaystubX,<br> ALL RIGHTS RESERVED.</p>
                </div>
                <div class="row mt-3">
                    <a href="{{url('/')}}"><img class="w-50" src="images/satisfaction.webp"></a>
                    </div>
            </div>
        </div>




    </div>

</div>




    <!-- End Footer Section -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>