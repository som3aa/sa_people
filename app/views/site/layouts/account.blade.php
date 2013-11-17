@extends('site.layouts.default')

@section('container')

<div class="row post">

	@yield('tabes')

	<!-- Sidebar -->
	<aside class="large-3 columns">

		<!-- Side bar -->
		@yield('sidebar')

	</aside><!-- End Sidebar -->

	<!-- Content -->
	<div class="large-9 columns account" role="content">

		<!-- Notifications -->
		@include('notifications') 

		<!-- Content -->
		@yield('content')

	</div><!-- End Main Content -->

</div><!-- End Main Content and Sidebar -->

@stop