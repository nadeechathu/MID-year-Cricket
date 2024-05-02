
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="description">
	<meta name="keywords" content="keywords">
	<title>Password Reset</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<style>
        body {
            font-size:0.9rem !important;
        }

    </style>
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">

					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4 text-center">Reset Password</h1><hr/>
                            <p>Please enter the new password below.</p>
							<div class="row">
								<div class="col-md-12">
									@include('common.alerts')
								</div>
							</div>
							<form method="POST" enctype="multipart/form-data" action="{{route('password.change')}}" autocomplete="off">
                                {{csrf_field()}}
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input id="email" type="email" readonly class="form-control" name="email" value="{{$email}}" required>

								</div>
                                <div class="mb-3">
									<label class="mb-2 text-muted" for="email">Password</label>
									<input id="password" type="password" class="form-control" name="password" value="" required autofocus>

								</div>
                                <div class="mb-3">
									<label class="mb-2 text-muted" for="email">Confirm Password</label>
									<input id="confirm_password" type="password" class="form-control" name="confirm_password" value="" required >

								</div>
z
								<div class="d-flex align-items-center">

									<button type="submit" style="width:100%;" class="btn btn-primary ms-auto">
										Reset Password
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
                            <p class="d-block text-center text-muted small">Already registered?
                                <a class="text-muted text-decoration-underline" href="{{url('login')}}">Login here.</a></p>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2022 &mdash; Your Company
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>
