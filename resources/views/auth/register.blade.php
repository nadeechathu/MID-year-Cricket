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
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="./assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="./assets/css/libs.bundle.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/theme.bundle.css" />

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

    <style>

      .form{
        width:70% !important;
      }
    </style>
    <!-- Page Title -->
    <title>{{ config('app.name', 'CMS') }}</title>
    
</head>
<body class="">

  <!-- Main Section-->
  <section class="d-flex justify-content-center align-items-start vh-100">

    <!-- Login Form-->
    <div class="d-flex flex-column w-100 align-items-center">

      <!-- Logo-->
      <a href="{{url('/')}}" class="d-table mt-5 mb-4 mx-auto">
        <div class="d-flex align-items-center">
            <span class="fw-black text-uppercase tracking-wide fs-6 lh-1">REGISTER FOR CMS</span>
        </div>      </a>
      <!-- Logo-->

      <div class="shadow-lg rounded p-4  bg-white form">
       

        <!-- Register Form-->
        <form class="mt-4" method="post" action="{{ route('register') }}">
        @csrf 

        <div class="row">
          <div class="col-md-6" style="border-left:1px solid #ececec; border-right:1px solid #ececec;">
              <div class="form-group">
                <label class="form-label" for="first_name">First name</label>
                <input type="text"
                              name="first_name"
                              id="first_name"
                              class="form-control @error('first_name') is-invalid @enderror"
                              value="{{ old('first_name') }}"
                              placeholder="First Name">
                              @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="last_name">Last name</label>
                <input type="text"
                              id="last_name"
                              name="last_name"
                              class="form-control @error('last_name') is-invalid @enderror"
                              value="{{ old('last_name') }}"
                              placeholder="Last Name">

                              @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="phone">Phone</label>
                <input type="text"
                              id="phone"
                              name="phone"
                              class="form-control @error('phone') is-invalid @enderror"
                              value="{{ old('phone') }}"
                              oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                              maxlength="10"
                              placeholder="Phone">

                              @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="dob">Date Of Birth</label>
                <input type="date"
                              name="dob"
                              id="dob"
                              class="form-control @error('dob') is-invalid @enderror"
                              value="{{ old('dob') }}"
                              placeholder="Date of Birth">

                              @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
              </div>
          </div>
          <div class="col-md-6" style="border-left:1px solid #ececec; border-right:1px solid #ececec;">
              <div class="form-group">
                <label class="form-label" for="email">Email address</label>
                <input type="email"
                              name="email"
                              id="email"
                              value="{{ old('email') }}"
                              class="form-control @error('email') is-invalid @enderror"
                              placeholder="Email">

                              @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password"
                              name="password"
                              id="password"
                              class="form-control @error('password') is-invalid @enderror"
                              placeholder="Password">

                              @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="password_confirmation">Confirm Password</label>
                <input type="password"
                              name="password_confirmation"
                              id="password_confirmation"
                              class="form-control @error('password_confirmation') is-invalid @enderror"
                              placeholder="Confirm Password">

                              @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
              </div>
              <button type="submit" style="margin-top:50px !important;" class="btn btn-primary d-block w-100 my-4">Sign Up</button>
              <p class="d-block text-center text-muted small">Already registered? <a
            class="text-muted text-decoration-underline" href="{{url('login')}}">Login here.</a></p>
          </div>
        </div>
         
          
        </form>
        <!-- / Register Form-->

       
      </div>
    </div>
    <!-- / Login Form-->

  </section>
  <!-- / Main Section-->

  <!-- Theme JS -->
  <!-- Vendor JS -->
  <script src="./assets/js/vendor.bundle.js"></script>
  
  <!-- Theme JS -->
  <script src="./assets/js/theme.bundle.js"></script>
</body>

</html>
