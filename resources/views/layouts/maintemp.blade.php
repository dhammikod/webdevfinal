<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @vite(['resources/js/app.js'])
    <title>{{ $pagetitle }}</title>
    <style>

body{
    margin : 0;
}    

.progress-bar-container{
    position:absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

#progress-bar{
    width: 30%;
    height: 2%;
    margin-top: 0.5%;
}

label {
    color: white;
    font-size: 2rem;
}
        </style>
</head>
<body>
    @yield('content')
    
</body>
</html>