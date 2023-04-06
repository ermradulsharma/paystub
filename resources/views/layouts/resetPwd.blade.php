<!doctype html>
<html lang="en">

<head>
    <title> PAYSTUB X </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        select,
        select option {
            text-transform: capitalize
        }
    </style>
    @yield('style')
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://apis.google.com/js/api:client.js" async defer></script>
</head>

<body>
    <div class="container" style="max-width:1500px">
        <ul class="nav nav-justified navbar" style="max-width: 1445px;">
            <li class="nav-item"> <a href="{{ route('welcome') }}"><img class="mr-3 mt-5"
                        src="{{ asset('images/Paystub X.webp') }}" style="width: 222px;"></a> </li>
        </ul>
    </div>


    @yield('content')


    <!-- End Footer Section -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    @yield('script')
    @yield('checked')


    <div id="loaderDiv" style="display: none;">
        <div id="loader"></div>
    </div>


</body>
@if ($errors->first())
        <script>
            toastr.error('{{ $errors->first() }}');
        </script>
    @endif

    @if (Session::has('message'))
        <script>
            toastr.success("{{ Session::get('message') }}");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif
<script>

    $(document).on('click', '.new-toggle-password', function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
       var input = $("#new_password");
       input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
    });
    $(document).on('click', '.confirm-toggle-password', function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
       var input = $("#confirm_password");
       input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
    });


</script>

</html>
