<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link href="{{ asset('img/logo.jpg') }}" rel="apple-touch-icon" sizes="180x180">
    <link href="{{ asset('img/logo.jpg') }}" rel="icon">
    <link href="{{ asset('img/logo.jpg') }}" rel="mask-icon" color="#666666">
    <link href="{{ asset('img/logo.jpg') }}" rel="shortcut-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">



    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/styleAdmin.css') }}" rel="stylesheet">

    <title>{{ $pagetitle }}</title>

</head>


<body>
    @include('otherComponents.ADMINheader&sidebar')
    @yield('content')




    <!-- Vendor JS Files -->
    <script src="{{ asset('admin/vendor/apexcharts/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/chart.js/chart.min.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/echarts/echarts.min.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/quill/quill.min.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/simple-datatables/simple-datatables.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/tinymce/tinymce.min.js') }}" defer></script>
    <script src="{{ asset('admin/vendor/php-email-form/validate.js') }}" defer></script>
    <script src="{{ asset('admin/mainAdmin.js') }}" defer></script>

    <script src="{{ asset('admin/js/jquery.min.js') }}" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


</body>
