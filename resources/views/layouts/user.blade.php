<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="p-themes">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/logo.jpg">
    <link rel="icon" href="mg/logo.jpg">
    <link rel="mask-icon" href="img/logo.jpg" color="#666666">
    <link rel="shortcut icon" href="img/logo.jpg">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="theme-color" content="#ffffff">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="user/css/bootstrap.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="user/css/style.css">
    <link rel="stylesheet" href="user/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="user/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="user/css/plugins/nouislider/nouislider.css">

    <!-- Plugins JS File -->
    <script src="user/js/jquery.min.js"></script>
    <script src="user/js/bootstrap.bundle.min.js"></script>
    <script src="user/js/jquery.hoverIntent.min.js"></script>
    <script src="user/js/jquery.waypoints.min.js"></script>
    <script src="user/js/superfish.min.js"></script>
    <script src="user/js/owl.carousel.min.js"></script>
    <script src="user/js/wNumb.js"></script>
    <script src="user/js/bootstrap-input-spinner.js"></script>
    <script src="user/js/jquery.magnific-popup.min.js"></script>
    <script src="user/js/nouislider.min.js"></script>
    <script src="user/js/jquery.countTo.js"></script>

    <!-- Main JS File -->
    <script src="user/js/main.js"></script>

    <title>{{ $pagetitle }}</title>

</head>

<body>
    @include('otherComponents.USERnavigation')
    @yield('content')



    @include('otherComponents.USERfooter')
</body>
