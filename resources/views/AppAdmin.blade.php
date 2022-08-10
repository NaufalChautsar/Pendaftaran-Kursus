<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <title>Dahsboard Kursus Pemrograman</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" href="{{ asset('assets/back-end/vendor/fonts/boxicons.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/back-end/vendor/css/core.css') }}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('assets/back-end/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('assets/back-end/css/demo.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/back-end/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/back-end/vendor/libs/apex-charts/apex-charts.css') }}" />
        <script src="{{ asset('assets/back-end/vendor/js/helpers.js') }}"></script>
        <script src="{{ asset('assets/back-end/js/config.js') }}"></script>
    </head>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
  <body>

    <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                @yield('sidebar')
                @yield('content')
            </div>
        </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
        <script src="{{ asset('assets/back-end/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('assets/back-end/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('assets/back-end/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/back-end/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('assets/back-end/vendor/js/menu.js') }}"></script>
        <script src="{{ asset('assets/back-end/vendor/libs/apex-charts/apexcharts.js') }}"></script>
        <script src="{{ asset('assets/back-end/js/main.js') }}"></script>
        <script src="{{ asset('assets/back-end/js/dashboards-analytics.js') }}"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Core JS -->
  </body>
</html>
