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

    <header >

        <nav class="navbar navbar-expand fixed py-5">
            <div class="container ">
                <div class="mt-3">
                <a href="{{url('/')}}"><img class="logo" src="images/Paystub X.webp"></a>
                </div>

                 <div class="collapse navbar-collapse ml-3">
                        <ul class="navbar-nav  mt-2 ">
                           
                            <li class="nav-item">
                                <a class="btn btn-lg mx-2 p-2 navbtn" href="{{url('usa')}}">USA</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-lg mx-2 p-2 navbtn" href="{{url('canada')}}">CANADA</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-lg mx-2 p-2 navbtn" href="{{url('uk')}}">UK</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-lg mx-2 p-2 navbtn" href="{{url('globle')}}">GLOBLE</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-lg mx-2 p-2 navbtn" href="{{url('forms')}}">W-2 FORM</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-md mx-2 p-2 btn-danger login" href="{{url('/')}}">Login</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>

    </header>


    @yield('content')

    <!-- Start Footer Section -->
 <section id="footer-section" class="footer-section fixed-footer ">
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                    <div class="btn">
                        <a href="{{ url('/privacy') }}" target="_self" aria-disabled="false"><button type="button"
                                class="btn btn-success" style="margin-right:10px">Privacy</button></a>
                        <a href="{{ url('/term') }}" target="_self" aria-disabled="false"><button type="button"
                                class="btn btn-success">Terms</button></a>
                    </div>


                </div>

                <div class="col-md-5 copy">
                    <h4 class="" style="letter-spacing:2px; font-size:16px;">© 2011-2022 Christapp. All Rights Reserved
                        Worldwide</h4>
                </div>

                <div class="col-md-5">
                    <ul class="d-inline-flex py-4">
                        <li> <a href="https://www.instagram.com/wix/" target="_blank"><img src="images/icons/instaa.png"
                                    style="color:white;width:35px;"></a> </li>&nbsp
                        <li> <a href="https://www.facebook.com/wix" target="_blank"><img src="images/icons/fb.png"
                                    style="color:white;width:35px;"></a> </li> &nbsp
                        <li> <a href="https://twitter.com/wix" target="_blank"><img src="images/icons/tw.png"
                                    style="color:white;width:35px;"></a> </li> &nbsp
                        <li><a href="https://il.linkedin.com/company/wix-com?trk=public_jobs_topcard_logo"
                                target="_blank"><img src="images/icons/linkin.png" style="color:white;width:35px;"></a>
                        </li> &nbsp
                        <li><a href="https://www.tiktok.com/notfound" target="_blank"><img src="images/icons/tiktok.png"
                                    style="color:white;width:35px;"></a> </li> &nbsp
                        <li><a href="https://www.youtube.com/user/Wix" target="_blank"><img
                                    src="images/icons/youtube.png" style="color:white;width:35px;"></a> </li> &nbsp
                    </ul>

                </div>

            </div>
            <!--/.row 
    </div>
    <!-- /.container 

    </section> -->
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