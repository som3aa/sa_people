@extends('layouts.master')

@section('container')

<div class="row">

	<!-- Main Page Content -->
    <div class="large-6 large-centered columns post" role="content">
        <!-- Notifications -->
        @include('layouts.components.notifications') 

		<!-- Content -->
		@yield('content')
	</div>

</div>
@stop