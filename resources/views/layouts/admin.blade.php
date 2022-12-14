<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/logo.jpg">
    <link rel="icon" href="mg/logo.jpg">
    <link rel="mask-icon" href="img/logo.jpg" color="#666666">
    <link rel="shortcut icon" href="img/logo.jpg">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="admin/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="admin/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="admin/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="admin/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Vendor JS Files -->
    <script src="admin/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admin/vendor/chart.js/chart.min.js"></script>
    <script src="admin/vendor/echarts/echarts.min.js"></script>
    <script src="admin/vendor/quill/quill.min.js"></script>
    <script src="admin/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="admin/vendor/tinymce/tinymce.min.js"></script>
    <script src="admin/vendor/php-email-form/validate.js"></script>

    <!-- Template Main CSS & JS File -->
    <link href="admin/styleAdmin.css" rel="stylesheet">
    <script src="admin/mainAdmin.js"></script>

    <title>{{ $pagetitle }}</title>

</head>


<body>
    @include('otherComponents.ADMINheader&sidebar')
    @yield('content')

</body>
