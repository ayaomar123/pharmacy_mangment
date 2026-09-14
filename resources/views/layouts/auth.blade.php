<!DOCTYPE html>
<html lang="en">

<head>
	<title>{{ucfirst(AppSettings::get('app_name', 'App'))}} - {{ucfirst($title ?? '')}}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="@if(!empty(AppSettings::get('logo'))) {{asset('storage/'.AppSettings::get('favicon'))}} @else{{asset('img/fav.png')}} @endif">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('assetss/assets/css/style.css') }}">
</head>

<body>
<!-- [ auth ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<div class="card borderless">
			<div class="row align-items-center">
				<div class="col-md-12">
					<div class="card-body">
						<img src="@if(!empty(AppSettings::get('logo'))){{asset('storage')}}/{{ AppSettings::get('logo') }}@else{{asset('img/logo1.png')}}@endif"
							 width="200" alt="" class="img-fluid mb-4">

						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif

						@yield('content')

						<hr>
						<p class="mb-0 text-muted">
							<a href="{{ route('login') }}" class="f-w-400">Back to sign in</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth ] end -->

<!-- Required Js -->
<script src="{{ asset('assetss/assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('assetss/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assetss/assets/js/pcoded.min.js') }}"></script>

</body>

</html>
