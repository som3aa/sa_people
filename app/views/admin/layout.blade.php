@extends('master')

@section('container')

<div class="row">

	<!-- Main Page Content -->
    <div class="large-12 columns post" role="content">
        <!-- Notifications -->
        @include('notifications') 

		<!-- Content -->
		@yield('content')
	</div>

</div>
@stop