<!doctype html>
<html lang="en">

<!-- Head -->

<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        <link href="{{ asset('css/mid-year-cricket.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive-mid-year-cricket.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mid-year-cricket-s.css') }}" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../assets/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="../assets/css/theme.bundle.css" />

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

    <!-- Page Title -->
    <title>{{ config('app.name', 'Mid Year Cricket Association') }}</title>

</head>

<body class="">

    <!-- Main Section-->
    <section class="d-flex justify-content-center align-items-start pt-3 vh-100 px-3 px-md-0 dark-blue">

        <!-- Login Form-->
        <div class="d-flex flex-column w-100 align-items-center">

            <!-- Logo-->
            <a href="./index.html" class="d-table mt-5 mb-4 mx-auto">
                <div class="d-flex align-items-center">
                    <img class="mx-auto w-50" src="{{ asset('/images/logo.png') }}" alt="Mid Year Cricket Association">
                </div>
            </a>
            <!-- Logo-->
            <div class="shadow-lg rounded p-3 light-blue form family-open-sans ">

                <!-- Login Form-->
                <div class="row">
                    <div class="col-md-12">
                        <p class="font-14 text-white fw-500 family-open-sans mb-0">We will send you an email with a password reset link. Please follow the instructions.</p>
                        <br />
                        @include('admin.common.alerts')
                    </div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('web.password.reset') }}"
                    autocomplete="off">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label class="mb-2 form-label color-orange font-16 fw-500 " for="email">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="" required
                            autofocus>
                        <div class="invalid-feedback">
                            Email is invalid
                        </div>
                    </div>

                    <div class="d-flex align-items-center pt-1">

                        <button type="submit"  class="bg-orange rounded-3 text-white py-2 px-5 w-100 font-16 family-open-sans
                        border-0">
                            Send Password Reset Link
                        </button>
                    </div>
                </form>

                <!-- / Login Form -->

                <p class="d-block text-center color-orange font-13 pt-2 fw-500 pt-2">Already registered?
                    <a class="color-orange font-13  fw-500 text-decoration-underline" href="{{ url('login') }}">Login here.</a>
                </p>
            </div>
        </div>
        <!-- / Login Form-->

    </section>
    <!-- / Main Section-->

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="../assets/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="../assets/js/theme.bundle.js"></script>
</body>

</html>
