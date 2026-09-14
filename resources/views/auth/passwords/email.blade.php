@extends('layouts.auth')

@section('content')
	<h4 class="mb-3 f-w-400">{{ __('Reset Password') }}</h4>
	<hr>

	<form method="POST" action="{{ route('password.email') }}">
		@csrf

		<div class="form-group mb-4">
			<input id="email" type="email" placeholder="{{ __('E-Mail Address') }}"
				   class="form-control @error('email') is-invalid @enderror"
				   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<button type="submit" class="btn btn-block btn-primary mb-4">
			{{ __('Send Password Reset Link') }}
		</button>
	</form>
@endsection
