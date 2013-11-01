<!DOCTYPE html>
<!--[if IE 8]> 		   <html class="no-js lt-ie9" lang="ar" dir="rtl"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="ar" dir="rtl"> <!--<![endif]-->

<head>
	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8" />
	<title>
		@section('title')
		{{{ Lang::get('site.sudactive')}}}
		@show
	</title>
	<meta name="keywords" content="شخصيات,سودانية,سودان,سوداني,سودانين,سوداكتف,sudactive,sudan,sudanese" />
	<meta name="author" content="Sudactive.com" />
	@yield('meta_data')

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width">

	<!-- CSS
	================================================== -->
	{{ HTML::style('assets/foundation/css/foundation.min.css') }}
	{{ HTML::style('assets/foundation/css/normalize.css') }}
	{{ HTML::style('assets/style.css') }}

	<!-- javascript
	================================================== -->
	{{ HTML::script('assets/foundation/js/vendor/custom.modernizr.js') }}

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>

	<!-- header
	================================================== -->
	<div class="row header">
		<div class="large-5 columns">

			<div class="row">
				<div class="large-12 columns">
					<h1 class="logo"><a href="/">{{ HTML::image('img/sudactive.png') }}</a></h1>
				</div>
			</div>

			<div class="row">
				<div class="large-12 columns">

					<div class="slogan">
						<h2><a href="/">{{{ Lang::get('site.slogan')}}}</a></h2>
						 <!-- search bar -->
						  <div class="row">
						      <div class="large-10 columns">
						          	<form method="get" action="/../s/" class="search">
						              <input type="text" name="keyword" placeholder="{{{ Lang::get('site.search') }}}">
						              <img src="/../img/search.png" />
						        	</form>
						      </div>
						  </div><!-- end search bar -->
					</div>

				</div>
			</div>

		</div>
		<div class="large-7 columns">

			<div class="row">
				<div class="large-12 columns">

					<div class="login_bar">
					@if( !Auth::check())
						<a href="/../user/login">{{{ Lang::get('user.login') }}}</a> <span style="color:#eaa494; margin:0 3px;"> او </span><a href="/../user/create">{{{ Lang::get('user.register') }}}</a>
					@else 
						<span>{{{ Lang::get('user.welcome') }}} {{ link_to('/user/profile/'.Auth::user()->username,Auth::user()->username)   }}</span>
					@endif
					</div>
					<a href="/../contact" style="float:left;padding:5px 10px;color:#555;">{{{ Lang::get('site.beta') }}}</a>

				</div>
			</div>

			<div class="row">
				<div class="large-12 columns">
				
					<div class="slider">
						<a href="/../pt/1/p/1"><img src="/img/p1.png" class="person" style="left:25px; bottom:4px; z-index:2"></a>
						<a href="/../pt/1/p/2"><img src="/img/p2.png" class="person" style="left:140px; bottom:4px; z-index:1"></a>
						<a href="/../pt/1/p/2"><img src="/img/p3.png" class="person" style="left:240px; bottom:4px ; z-index:4"></a>
						<a href="/../pt/1/p/1"><img src="/img/p4.png" class="person" style="left:345px; bottom:4px ; z-index:3"></a>
						<img src="/img/curve.png" class="curve" />	
					</div>
					
				</div>
			</div>
		</div>
	</div><!-- End Header -->

	<!-- Main Page Content and Sidebar 
	================================================== -->
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
					<h4>مرحبا , {{ Auth::user()->username }}</h4>

					<ul class="side-nav">
						<li><a href="/../admin/stories">لوحة التحكم</a></li>
				 		<li><a href="/../user/logout">تسجيل الخروج</a></li>
					</ul>
				</section>
			@endif
			<!-- ./ Memeber Area -->

			<!-- categories list -->
			<section>
				<h4>التصنيفات</h4>
				<ul class="side-nav">
				@foreach(Category::all()  as $category)
					<li>{{ Link_to('/c/'.$category->slug,$category->name.' ('.$category->story()->count().')') }}</li>
				@endforeach
				</ul>
			</section>
			<!-- ./ categories list -->

			<!-- join us call -->
			@if( !Auth::check() )
			<section>
				<p>{{{ Lang::get('site.sidebar.join_call') }}}</p>
				<div class="get_in">
					<a href="/../join-us" class="button small">{{{ Lang::get('site.sidebar.join_now') }}}</a>
				</div>
			</section>
			@endif
			<!-- ./ join us call -->

			<!-- last stories -->
			<section>
				<h4>اخر الشخصيات</h4>
				<ul class="side-nav">
				@foreach(story::all()->take(5) as $story)
					<li>{{ Link_to($story->slug,$story->title) }}</li>
				@endforeach
				</ul>
			</section>
			<!-- ./ last stories -->
		</aside><!-- End Sidebar -->
	</div><!-- End Main Content and Sidebar -->

	<!-- footer 
	================================================== -->
	<footer class="row footer">
		<div class="large-12 columns">
		  
		  <div class="row">
		    <div class="large-6 columns">
		    	<p>{{{ Lang::get('site.copyrights') }}}</p>
		    </div>

		    <div class="large-6 columns">
			    <ul class="inline-list left">
			        <li><a href="/../about/">{{{ Lang::get('site.about') }}}</a></li>
			        <li><a href="/../join-us/">{{{ Lang::get('site.join-us') }}}</a></li>
			        <li><a href="/../policy">{{{ Lang::get('site.policy') }}}</a></li>
			        <li><a href="/../contact">{{{ Lang::get('site.contact') }}}</a></li>
			    </ul>
		    </div>
		  </div>

		</div>
	</footer><!-- End Footer -->


	<!-- Javascripts
	================================================== -->
	<script>
		document.write('<script src=/../' +
		('__proto__' in {} ? 'assets/foundation/js/vendor/zepto' : 'assets/foundation/js/vendor/jquery') +
		'.js><\/script>')
	</script>

	{{ HTML::script('assets/foundation/js/foundation.min.js') }}

	<script>
		$(document).foundation();
	</script>

	@section('javascripts')
	@show

</body>
</html>
