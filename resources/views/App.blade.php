<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/front-end/css/style.css') }}" rel="stylesheet">
        <!-- Google Icon -->
        <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons') }}">
    </head>
    <body>
        @yield('navbar')
        @yield('content')
    </body>
</html>