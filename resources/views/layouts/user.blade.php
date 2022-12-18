<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="p-themes">

    <!-- Favicon -->
    <link href="{{ asset('img/logo.jpg') }}" rel="apple-touch-icon" sizes="180x180">
    <link href="{{ asset('mg/logo.jpg') }}" rel="icon">
    <link href="{{ asset('img/logo.jpg') }}" rel="mask-icon" color="#666666">
    <link href="{{ asset('img/logo.jpg') }}" rel="shortcut-icon">

    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="theme-color" content="#ffffff">

    <!-- Plugins CSS File -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/plugins/nouislider/nouislider.css') }}" rel="stylesheet">

   

    <title>{{ $pagetitle }}</title>

</head>

<body>
    @include('otherComponents.USERnavigation')
    @yield('content')



    @include('otherComponents.USERfooter')

     <!-- Plugins JS File -->
     <script src="{{ asset('user/js/jquery.min.js') }}" defer></script>
     <script src="{{ asset('user/js/bootstrap.bundle.min.js') }}" defer></script>
     <script src="{{ asset('user/js/jquery.hoverIntent.min.js') }}" defer></script>
     <script src="{{ asset('user/js/jquery.waypoints.min.js') }}" defer></script>
     <script src="{{ asset('user/js/superfish.min.js') }}" defer></script>
     <script src="{{ asset('user/js/owl.carousel.min.js') }}" defer></script>
     <script src="{{ asset('user/js/wNumb.js') }}" defer></script>
     <script src="{{ asset('user/js/bootstrap-input-spinner.js') }}" defer></script>
     <script src="{{ asset('user/js/jquery.magnific-popup.min.js') }}" defer></script>
     <script src="{{ asset('user/js/nouislider.min.js') }}" defer></script>
     <script src="{{ asset('user/js/jquery.countTo.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

    <script src="{{ asset('admin/js/jquery.min.js') }}" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

     <!-- Main JS File -->
     <script src="{{ asset('user/js/main.js') }}" defer></script>
</body>
