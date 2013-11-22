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

		<!-- join us call -->
		@if( Auth::check() )
		<section>
			<p>ساهم في انماء المحتوى السوداني</p>
			<div class="get_in">
				<a href="{{{ URL::to('account/stories/create') }}}" class="button small">اكتب عن شخصية</a>
			</div>
		</section>
		@endif

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
			<p>اذا رغبت ان تكون عضوا في سوداكتف ما عليك الا التسجيل حتى تستطيع المساهمة بمقالاتك</p>
			<div class="get_in">
				<a href="/../user/create" class="button small">انضم الان</a>
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