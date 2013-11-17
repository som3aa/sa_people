@extends('site.layouts.default')

@section('container')
<!-- Main Page Content and Sidebar 
================================================== -->
<div class="row">
	<!-- Main Blog Content -->
	<div class="large-12 columns" role="content">

		<div class="row">
		    <div class="large-6 large-centered columns post">
		        <!-- Notifications -->
		        @include('notifications') 
		        <!-- ./ notifications -->
				<!-- Content -->
				@yield('content')
				<!-- ./ content -->
			</div>
		</div>
		
	</div>
</div><!-- End Main Content and Sidebar -->
@stop