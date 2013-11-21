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
		<!-- Sudactive Header -->
		<div class="large-5 columns">
			<h1 class="logo"><a href="/">{{ HTML::image('img/sudactive.png') }}</a></h1>
		</div>

		<!-- Account Tob Bar  -->
		<div class="large-7 columns">
			<div id="login_bar">
			@if( Auth::check())
				<span>
					<a href="#" data-dropdown="drop" class="dropdown">
					{{ Auth::user()->profile->name }}
					@if (!empty(Auth::user()->profile->avatar))
		              {{ HTML::image(Auth::user()->profile->avatar,Auth::user()->profile->name) }}
		            @else
		              {{ HTML::image('img/avatar.jpg') }}
		            @endif </a>
			        <ul id="drop" data-dropdown-content class="f-dropdown tiny">
						@if(Entrust::hasRole('admin')) <li><a href="/../admin/stories">لوحة التحكم</a></li> @endif
			       	 	<li><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
			       	 	<li><a href="/../account/profile">تعديل بروفايلي</a></li>
			       	 	<li><a href="/../account/stories">ادارة المقالات</a></li>
						<li style="border-bottom:1px solid #cecece;padding-bottom:2"><a href="/../account/user">اعدادات الحساب</a></li>
				 		<li><a href="/../user/logout">تسجيل الخروج</a></li>
			        </ul>
				</span>
			@else 
				<a href="/../user/login">{{{ Lang::get('user.login') }}}</a> <span style="color:#eaa494; margin:0 3px;"> او </span><a href="/../user/create">{{{ Lang::get('user.register') }}}</a>
			@endif
			</div>
		</div>
	</div><!-- End Header -->

	<!-- sub-header
	================================================= -->
	<div class="row sub-header">
		<!-- Slider slagan -->
		<div class="large-5 columns">
			<div class="slogan">
				<h2><a href="/">{{{ Lang::get('site.slogan')}}}</a></h2>
				 <!-- search bar -->
				  <div class="row">
				      <div class="large-10 columns">
				          	<form method="get" action="/../search/" class="search">
				              <input type="text" name="keyword" placeholder="{{{ Lang::get('site.search') }}}">
				              <img src="/../img/search.png" />
				        	</form>
				      </div>
				  </div><!-- end search bar -->
			</div>
		</div>

		<!-- Account Tob Bar  -->
		<div class="large-7 columns">
			<div class="slider">
				<a href="/../pt/1/p/1"><img src="/img/p1.png" class="person" style="left:25px; bottom:4px; z-index:2"></a>
				<a href="/../pt/1/p/2"><img src="/img/p2.png" class="person" style="left:140px; bottom:4px; z-index:1"></a>
				<a href="/../pt/1/p/2"><img src="/img/p3.png" class="person" style="left:240px; bottom:4px ; z-index:4"></a>
				<a href="/../pt/1/p/1"><img src="/img/p4.png" class="person" style="left:345px; bottom:4px ; z-index:3"></a>
				<img src="/img/curve.png" class="curve" />	
			</div>
		</div>
	</div><!-- End Header -->

	<!-- Middel Container
	================================================= -->
	@yield('container')

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
	{{ HTML::script('assets/foundation/js/foundation/foundation.dropdown.js') }}

	<script>
		$(document).foundation();
	</script>

	@section('javascripts')
	@show

</body>
</html>
