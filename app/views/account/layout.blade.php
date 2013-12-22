@extends('master')

@section('container')

<div class="row">

	<!-- Sidebar -->
	<aside class="large-3 columns sidebar">
		{{-- avatar --}}
		<section>
			<div class="th radius">
				@if (!empty($user))
					@if(!empty($user->profile->avatar ))
						{{ HTML::image($user->profile->avatar,$user->profile->name) }}
					@else
						{{ HTML::image('img/avatar.jpg') }}
					@endif
				@else
					@if (!empty(Auth::user()->profile->avatar))
						{{ HTML::image(Auth::user()->profile->avatar,Auth::user()->profile->name) }}
					@else 
						{{ HTML::image('img/avatar.jpg') }}
					@endif
				@endif
			</div>
		</section>
	</aside>

	<!-- Main Page Content -->
	<div class="large-9 columns post" role="content">
		<!-- Notifications -->
		@include('notifications') 

		<!-- Content -->
		@yield('content')
	</div>

</div>

@stop