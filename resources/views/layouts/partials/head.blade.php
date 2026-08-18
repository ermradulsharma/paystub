<title>PAYSTUB X</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- FontAwesome 4.7.0 & Google Fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Open+Sans:wght@400;600&family=Outfit:wght@100;200;300;800&family=Public+Sans:wght@300&display=swap">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- Application Stylesheets -->
<link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/style.css">
<link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/newstyle.css">
<link rel="stylesheet" type="text/css" href="{{ asset('user') }}/css/user-dashboard.css">

<style>
    select,
    select option {
        text-transform: capitalize;
    }
</style>
<script>
    window.initAutocomplete = window.initAutocomplete || function() {
        // Global fallback for pages without custom Google Places autocompletion
    };
</script>
