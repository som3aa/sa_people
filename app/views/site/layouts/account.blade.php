@extends('site.layouts.default')

@section('container')

<!-- Main Page Content and Sidebar -->
<div class="row">
	<!-- Main Blog Content -->
	<div class="large-9 columns" role="content">
		<!-- breadcrumbs -->
		@yield('breadcrumbs')
		<!-- ./ breadcrumbs -->

		<!-- Notifications -->
		@include('notifications') 
		<!-- ./ notifications -->

		<!-- Content -->
		@yield('content')
		<!-- ./ content -->
	</div><!-- End Main Content -->

	<!-- Sidebar -->
	<aside class="large-3 columns sidebar">
		<!-- Memeber Area -->
		@if( Auth::check() )
			<section>
				<h4>الحساب</h4>

				<ul class="side-nav">
					<li><a href="/../admin/stories">لوحة التحكم</a></li>
					<li><a href="/../account/user">حسابي</a></li>
			 		<li><a href="/../user/logout">تسجيل الخروج</a></li>
				</ul>
			</section>
		@endif

		<!-- categories list -->
		<section>
			<h4>التصنيفات</h4>
			<ul class="side-nav">
			@foreach(Category::all()  as $category)
				<li>{{ Link_to('/category/'.$category->slug,$category->name.' ('.$category->story()->count().')') }}</li>
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
			@foreach(story::all()->take(5) as $story)
				<li>{{ Link_to($story->slug,$story->title) }}</li>
			@endforeach
			</ul>
		</section>
	</aside><!-- End Sidebar -->
</div><!-- End Main Content and Sidebar -->

@stop