
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="description">
	<meta name="keywords" content="keywords">
	<title>CMS Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <style>
        body {
            font-size:0.9rem !important;
        }
       
  </style>
</head>

<body>
	
  <!-- Main Section-->
  <section class="d-flex justify-content-center align-items-start vh-100">

    <!-- Login Form-->
    <div class="d-flex flex-column w-100 align-items-center">

      <!-- Logo-->
      <a href="#" class="d-table mt-5 mb-4 mx-auto">
        <div class="d-flex align-items-center">
        </div>      </a>
      <!-- Logo-->

      <div class="shadow-lg rounded p-4  bg-white form" style="width:60%;">
       

        <!-- Register Form-->
        <form class="mt-4" method="post" action="{{ route('register') }}">
        @csrf 

              <div class="row">
								<div class="col-md-12">
									@include('common.alerts')
								</div>
							</div>
              <h1 class="fs-4 card-title fw-bold mb-4 text-center">REGISTER</h1><hr/>
        <div class="row">
          <div class="col-md-6" style="border-left:1px solid #ececec; border-right:1px solid #ececec;">
              <div class="form-group">
                <label class="form-label" for="first_name">First name</label>
                <input type="text"
                              name="first_name"
                              id="first_name"
                              class="form-control @error('first_name') is-invalid @enderror"
                              value="{{ old('first_name') }}"
                              placeholder="First Name" >
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
                              placeholder="Last Name" required>

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
                              placeholder="Phone" required>

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
                              placeholder="Date of Birth" required>

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
                              placeholder="Email" required>

                              @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="password">Password <span class="text-danger" style="font-size:0.7rem;">(Minimum 8 characters)</span></label>
                <input type="password"
                              name="password"
                              id="password"
                              class="form-control @error('password') is-invalid @enderror"
                              placeholder="Password" required>
               
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
                              placeholder="Confirm Password" required>

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
</body>
</html>
