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
    <section class="d-flex justify-content-center align-items-start pt-3 vh-100 pb-5 px-3 px-md-0 dark-blue">

        <!-- Login Form-->
        <div class="d-flex flex-column w-100 align-items-center">

            <!-- Logo-->
            <a href="{{ url('/') }}" class="d-table mt-5 mb-4 mx-auto">
                <div class="d-flex align-items-center">

                    <img class="mx-auto w-50" src="{{ asset('/images/logo.png') }}" alt="Mid Year Cricket Association">
                </div>
            </a>
            <!-- Logo-->

            <div class="shadow-lg rounded p-3 light-blue form family-open-sans ">

                <!-- Login Form-->
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.common.alerts')
                    </div>
                </div>
                <form method="POST" class="mt-4" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label color-orange font-16 fw-500 ">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="password"
                            class="form-label d-flex justify-content-between align-items-center color-orange font-16 fw-500 ">{{ __('Password') }}</label>


                        </label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                 <p class="pt-2">       <a href="{{ route('web.password.forgot') }}"
                    class=" ms-2 text-decoration-underline  color-orange font-13  fw-500">Forgotten
                    password?</a></p>
                    </div>

                    <div class="mb-3 mt-1">
                        <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_SITEKEY')}}"></div>
               </div>
                    <button type="submit" class="bg-orange rounded-3 text-white py-2 px-5 w-100 font-16 family-open-sans
                    border-0">Login</button>


                </form>
                <!-- / Login Form -->
{{--
                <p class="d-block text-center color-orange font-13 pt-2 fw-500">New customer?
                     <a
                        class="color-orange font-13  fw-500 text-decoration-underline" href="{{ url('register') }}">Sign up for an
                        account</a></p> --}}
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
    <!-- Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>
