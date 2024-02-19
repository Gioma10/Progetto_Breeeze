<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        @vite(['resources/css/app.css','resources/js/app.js'])

        <title>Breeze | @yield('title')</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anybody:ital,wdth,wght@0,50..150,100..900;1,50..150,100..900&display=swap" rel="stylesheet">

    </head>

    <body>
   
        {{-- <div class="container">
            @yield('content')
        </div> --}}

        <x-navbar/>

            {{$slot}}

        <x-footer/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    </body>

</html>