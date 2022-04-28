<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? '' }} - BingHR</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png"/>

        <!-- Plugin styles -->
        <link rel="stylesheet" href="{{ asset('assets/js/vendors/bundle.css') }}" type="text/css">

        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">
    </head>
    <body>

        <!-- begin::preloader-->
        <div class="preloader">
            <div class="preloader-icon"></div>
        </div>
        <!-- end::preloader -->

        {{-- Header component goes here --}}

        <!-- begin::main -->
        <div id="main">

            {{-- Navigation component goes here --}}

            <!-- begin::main-content -->
            <div class="main-content">

                <!-- begin::page content -->
                <div class="container-fluid">
                    {{ $slot }}
                </div>
                <!-- end::page content -->

                {{-- Footer component goes here --}}

            </div>
            <!-- end::main-content -->

        </div>
        <!-- end::main -->

        <!-- Plugin scripts -->
        <script src="{{ asset('assets/js/vendors/bundle.js') }}"></script>

        <!-- App scripts -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
    </body>

</html>