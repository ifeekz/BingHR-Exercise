<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? '' }} - BingHR</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>

        <!-- Plugin styles -->
        <link rel="stylesheet" href="{{ asset('assets/js/vendors/bundle.css') }}" type="text/css">
        
        <link rel="stylesheet" href="{{ asset('assets/css/vendors/nprogress.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/css/vendors/toastr.css') }}" type="text/css">

        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">
    </head>
    <body>

        <!-- begin::preloader-->
        {{-- <div class="preloader">
            <div class="preloader-icon"></div>
        </div> --}}
        <!-- end::preloader -->

        <x-header :page-title="$pageTitle"></x-header>

        <!-- begin::main -->
        <div id="main">

            <x-navigation></x-navigation>

            <!-- begin::main-content -->
            <div id="app" class="main-content">

                <!-- begin::page-header -->
                <div class="page-header px-4">
                    {{ $pageHeader }}
                </div>
                <!-- end::page-header -->

                <!-- begin::page content -->
                <div class="container-fluid" style="min-height: 60vh">
                    {{ $slot }}
                </div>
                <!-- end::page content -->

                <x-footer></x-footer>
                
                {{ $modal }}

            </div>
            <!-- end::main-content -->

        </div>
        <!-- end::main -->

        <!-- Plugin scripts -->
        <script src="{{ asset('assets/js/vendors/bundle.js') }}"></script>

        <!-- App scripts -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>

        <script src="{{ asset('assets/js/vendors/vue.js') }}"></script>
        <script src="{{ asset('assets/js/vendors/vue-resource.js') }}"></script>
        <script src="{{ asset('assets/js/vendors/nprogress.js') }}"></script>
        <script src="{{ asset('assets/js/vendors/toastr.min.js') }}"></script>

        {{ $scripts }}
    </body>

</html>