@props(['message'=>$message])

<div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
	<span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
	<button type="button" class="close" data-dismiss="alert" aria-label="{{ __('app.alerts.close') }}">
		<span aria-hidden="true">&times;</span>
	</button>
	<strong>{{ __('app.alerts.message_title') }}</strong> {{$message}}
</div>