@extends('layouts.master')

@section('container')

<!-- Main Page Content and Sidebar -->
<div class="row">

	<!-- Main Page Content -->
	<div class="large-9 columns" role="content">
		<!-- breadcrumbs -->
		@yield('breadcrumbs')

		<!-- Content -->
		@yield('content')
	</div>

	<!-- Sidebar -->
	<aside class="large-3 columns sidebar">

		<!-- categories list -->
		<section>
			<h4>التصنيفات</h4>
			<ul class="side-nav">
			@foreach(Category::all()  as $category)
				<li>{{ Link_to('/category/'.$category->slug,$category->name.' ('.$category->story()->whereStatus('1')->count().')') }}</li>
			@endforeach
			</ul>
		</section>

		<!-- join us call -->
		@if( !Auth::check() )
		<section>
			<p>{{{ Lang::get('site.sidebar.join_call') }}}</p>
			<div class="get_in">
				<a href="/../join-us" class="button small">{{{ Lang::get('site.sidebar.join_now') }}}</a>
			</div>
		</section>
		@endif

		<!-- last stories -->
		<section>
			<h4>اخر الشخصيات</h4>
			<ul class="side-nav">
			@foreach(story::whereStatus('1')->take(5)->get() as $story)
				<li>{{ Link_to($story->slug,$story->title) }}</li>
			@endforeach
			</ul>
		</section>
	</aside>

</div>

@stop