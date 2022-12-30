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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Font Awesome CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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
    <span class="opennav" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; <a href="{{url('/')}}"></a></span>
    <!-- Start Header Section -->

    <div class="container" style="max-width:1500px">
     
        <ul class="nav nav-justified navbar">
            
            <li class="nav-item">
               
            <a href="{{url('/')}}"><img class="mr-3 mt-5" src="images/Paystub X.webp" style="width: 280px;"></a>
            </li>
            <li class="nav-item ml-3 ">
                <a class="btn btn-lg  py-2   w-100 mt-5 navbtn" href="{{url('usa')}}">USA</a>

            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg py-2    w-100 mt-5 navbtn" href="{{url('canada')}}">CANADA</a>
            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg  py-2   w-100 mt-5 navbtn" href="{{url('uk')}}">UK</a>
            </li>

            <li class="nav-item ml-3">

                <a class="btn btn-lg  py-2   w-100  mt-5 navbtn" href="{{url('globle')}}">GLOBLE</a>

            </li>
            <li class="nav-item ml-3">
                <a class="btn btn-lg  py-2   w-100  mt-5 navbtn" href="{{url('form')}}">W<sub>-2</sub> FORM</a>


            </li>
            <li class="nav-item float-rigth ml-3 ">

                <a class="btn btn-md  py-2   w-100 mt-5 btn-danger login" href="{{url('login')}}">Login</a>

            </li>
        </ul><br>


    </div>









    <div id="mySidenav" class="sidenav">


        <a href="javascript:void(0)" class="closebtn"></a>
        <div class="mt-">
            <a href="{{url('/')}}"><img class="w-100 mb-5 p-3" src="images/Paystub X.webp" onclick="closeNav()"></a>
        </div>
        <div class="sidebtn">
            <a class="btn btn-sm" href="{{url('usa')}}">USA</a>
        </div>

        <div class="sidebtn">
            <a class="btn btn-sm" href="{{url('canada')}}">CANADA</a>
        </div>
        <div class="sidebtn">
            <a class="btn btn-sm" href="{{url('uk')}}">UK</a>
        </div>
        <div class="sidebtn">
            <a class="btn btn-sm" href="{{url('globle')}}">GLOBLE</a>
        </div>
        <div class="sidebtn">
            <a class="btn btn-sm" href="{{url('form')}}">FORM</a>
        </div>
        <div class="sidebtn1">
            <a class="btn btn-sm     login1" href="{{url('login')}}">Login</a>

        </div>


    </div>
    <!-- End Header Section -->






    @yield('content')



    <!-- Start Footer Section -->
    <div class="footerSection">

        <div class="container">

            <div class=" row p-5 justify-content-center">

                <div class="col-lg-3 text-center m-auto">
                    <div class="container justify-content-center text-left">

                        <div>
                            <a class="w-100 footbtn" href="{{url('terms')}}">Terms &
                                Conditions</a>
                        </div>
                        <div class="mt-3">
                            <a class="w-100 footbtn" href="{{url('privacy')}}">Privacy
                                Policy</a>
                        </div>
                        <div class="mt-3">
                            <a class="w-100 footbtn" href="{{url('refund')}}">Refund
                                Policy</a>
                        </div>
                        <div class="mt-3">
                            <a class="w-100 footbtn" href="{{url('contact')}}">Contact
                                Us</a>
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

                        <p class="text-white">COPYRIGHT © 2022 PaystubX,<br> ALL RIGHTS RESERVED.</p>

                        <div class="container">
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-facebook   fbicon " aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-instagram ml-2 socialicon"
                                    aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-twitter ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-linkedin ml-2 socialicon" aria-hidden="true"></i></a>
                            <a href="https://www.google.com/" target="_blank"><i class="fa fa-youtube ml-2 socialicon" aria-hidden="true"></i></a>
                            <!--  <a href="{{url('/')}}"><i class="fa fa-tiktok text-white socialicon" aria-hidden="true"></i></a> -->
                        </div>
                    </div>
                </div>





            </div>
        </div>

    </div>

    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>

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
    <!-- <popup link> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <popup link> -->
</body>

</html>