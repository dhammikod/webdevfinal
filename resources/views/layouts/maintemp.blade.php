<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @vite(['resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
    
    

</body>
</html>