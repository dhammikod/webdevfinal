<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="user/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="user/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="user/images/icons/favicon-16x16.png">
    <link rel="manifest" href="user/images/icons/site.html">
    <link rel="mask-icon" href="user/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="user/images/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="user/images/icons/browserconfig.xml">
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
    <!-- Main JS File -->
    <script src="user/js/main.js"></script>

    <title>{{ $pagetitle }}</title>

</head>

<body>
    @include('otherComponents.USERnavigation')
    @yield('content')



    @include('otherComponents.USERfooter')
</body>