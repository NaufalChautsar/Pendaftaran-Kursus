<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" sizes="76x76" href="{{asset ('assets/front-end/img/javie/Javie.jpg')}}">
		<link rel="icon" type="image/png" href="{{asset ('assets/front-end/img/javie/Javie.jpg')}}">
		<title>Masuk Admin Pendaftaran Kursus</title>
		<!-- Bootstraps -->
		<link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css') }}">
		<!-- Font Awesome -->
		<script src="{{ asset('https://kit.fontawesome.com/5401602ad2.js') }}" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="{{ asset('assets/front-end/css/login.css') }}">
	</head>
	<body>
		
		<div class="container">
            @if (session('fail'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>{{ session('fail') }}</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif
			<div class="forms-container">
				<form action="{{ route('admin.login') }}" method="POST">
					@csrf
					<h2 class="title">Masuk</h2>
					<p class="sub-title">Silahkan masuk dengan akun anda</p>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="email" name="email" autofocus placeholder="Email" required/>
                        @error('email')
                            <label for="exampleFormControlInput1" class="form-label">{{ $message }}</label>
                        @enderror
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" name="password" placeholder="Password" required/>
					</div>
					<div class="button-group">
						<a class="btn-back solid" href="{{ route('Beranda.index') }}" data-bs-toggle="tooltip" title="Kembali">
							<i class="fa-solid fa-arrow-left-long"></i>
						</a>
						<input type="submit" value="Masuk" class="btn-submit solid" />
					</div>
				</form>
			</div>
		</div>

		<!-- Javascript -->
		<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js') }}"></script>
		<script>
			const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
			const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
		</script>
	</body>
</html>