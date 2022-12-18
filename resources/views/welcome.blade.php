@extends('layouts.maintemp')


@section('content')
    <div class="progress-bar-container">
        <label for="progress-bar">loading ...</label>
        <progress id="progress-bar" value="0" max="100"></progress>
    </div>

    @guest
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="js/main.js" type="module"></script>
    @endguest
    @auth<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="js/login.js" type="module"></script>
        
    @endauth
@endsection
