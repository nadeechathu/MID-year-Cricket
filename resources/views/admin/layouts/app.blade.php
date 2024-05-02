<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mid Year Cricket Association') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}">
    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{url('/assets/css/libs.bundle.css')}}" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{url('/assets/css/theme.bundle.css')}}" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Custom Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
          /**
          * Reinstate scrolling for non-JS clients
          */
          .simplebar-content-wrapper {
            overflow: auto;
          }

        </style>
    </noscript>

</head>
<body class="">

   @include('admin.layouts.header')

    <!-- Page Content -->
    <main id="main">


            @yield('content')

        <!-- / Content-->

    </main>
    <!-- /Page Content -->

    @include('admin.layouts.sidebar')

    <!-- jQuery -->
    <script src="{{url('/plugins/jquery/jquery.min.js')}}"></script>
    
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="{{url('/assets/js/vendor.bundle.js')}}"></script>

    <script src="{{url('/assets/js/category1.js')}}"></script>
    <!-- Theme JS -->
    <script src="{{url('/assets/js/theme.bundle.js')}}"></script>



    <!-- CKEditor -->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    @yield('scripts')
</body>
</html>
