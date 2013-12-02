@extends('layouts.master')

@section('container')

@if(Route::getCurrentRoute()->getPath() == '/')
	<div class="row">
		<div class="large-10 large-centered columns">
			<ul class="orbit" data-orbit  data-options="
				animation:slide;
				pause_on_hover:false;
				navigation_arrows:false;
				slide_number: false;">
				<li><img src="/../img/orbit-3.jpg" alt="slide 1" /></li>
				<li><img src="/../img/orbit-1.jpg" alt="slide 2" /></li>
				<li><img src="/../img/orbit-2.jpg" alt="slide 3" /></li>
			</ul>	
		</div>
	</div>
@endif


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

		<!-- Facebook Like Box -->
		@if( !Auth::check() )
			<div class="fb-like-box" style="margin-bottom:0.5em" data-href="https://www.facebook.com/Sudactive.network?" data-width="221" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
		@endif
		
		<!-- join us call -->
		@if( Auth::check() )
		<section>
			<p>ساهم في تنمية المحتوى السوداني</p>
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

@section('javascripts')
	
	{{-- Facebook Like Box --}}
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=363335887072007";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>

@stop