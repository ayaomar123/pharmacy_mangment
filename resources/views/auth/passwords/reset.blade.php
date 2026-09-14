@extends('layouts.auth')

@section('content')
	<h4 class="mb-3 f-w-400">{{ __('Reset Password') }}</h4>
	<hr>

	<form method="POST" action="{{ route('password.update') }}">
		@csrf
		<input type="hidden" name="token" value="{{ $token }}">

		<div class="form-group mb-3">
			<input id="email" type="email" placeholder="{{ __('E-Mail Address') }}"
				   class="form-control @error('email') is-invalid @enderror"
				   name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group mb-3">
			<input id="password" type="password" placeholder="{{ __('Password') }}"
				   class="form-control @error('password') is-invalid @enderror"
				   name="password" required autocomplete="new-password">

			@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="form-group mb-4">
			<input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}"
				   class="form-control" name="password_confirmation" required autocomplete="new-password">
		</div>

		<button type="submit" class="btn btn-block btn-primary mb-4">
			{{ __('Reset Password') }}
		</button>
	</form>
@endsection
