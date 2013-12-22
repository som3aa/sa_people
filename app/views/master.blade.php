<!DOCTYPE html>
<!--[if IE 8]> 		   <html class="no-js lt-ie9" lang="ar" dir="rtl"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="ar" dir="rtl"> <!--<![endif]-->

<head>
	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8" />
	<title>
		@section('title')
		سوداكتف
		@show
	</title>
	<meta name="keywords" content="شخصيات,سودانية,سودان,سوداني,سودانين,سوداكتف,sudactive,sudan,sudanese" />
	<meta name="author" content="Sudactive.com" />
	@yield('meta_data')

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- CSS
	================================================== -->
	{{ HTML::style('assets/foundation/css/normalize.css') }}
	{{ HTML::style('assets/foundation/css/foundation.css') }}
	{{ HTML::style('assets/style.css') }}
	{{ HTML::style('assets/auth-buttons.css') }}

	<!-- javascript
	================================================== -->
	{{ HTML::script('assets/foundation/js/vendor/custom.modernizr.js') }}

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Google Tracking Snippit -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-45971520-1', 'sudactive.com');
	  ga('send', 'pageview');
	</script>

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
			<div class="login_bar">
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
						@if(Entrust::hasRole('admin') or Entrust::hasRole('reviewer')) <li><a href="/../admin/stories">لوحة التحكم</a></li> @endif
			       	 	<li><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
			       	 	<li><a href="/../account/stories">ادارة المقالات</a></li>
						<li style="border-bottom:1px solid #cecece;padding-bottom:2"><a href="/../account/user">اعدادات الحساب</a></li>
				 		<li><a href="/../user/logout">تسجيل الخروج</a></li>
			        </ul>
				</span>
			@else 
				<a href="/../user/login">الدخول</a> <span style="color:#eaa494; margin:0 3px;"> او </span><a href="/../user/create">التسجيل</a>
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
				<h2><a href="/">شخصيات سودانية</a></h2>
				 <!-- search bar -->
				  <div class="row">
				      <div class="large-10 columns">
				          	<form method="get" action="/../search/" class="search">
				              <input type="text" name="keyword" placeholder="ابحث عن اي اسم">
				              <img src="/../img/search.png" />
				        	</form>
				      </div>
				  </div><!-- end search bar -->
			</div>
		</div>

		<!-- Account Tob Bar  -->
		<div class="large-7 columns">
			<div class="slider">
				<a href="/../مصطفى-عبدالله-محمد-صالح"><img src="/img/p1.png" class="person" style="left:25px; bottom:4px; z-index:2"></a>
				<a href="/../الطيب-صالح"><img src="/img/p2.png" class="person" style="left:140px; bottom:4px; z-index:1"></a>
				<a href="/../بلقيس-محمد-الحسن"><img src="/img/p5.png" class="person" style="left:250px; bottom:4px ; z-index:4"></a>
				<a href="/../عبد-القادر-سالم"><img src="/img/p4.png" class="person" style="left:345px; bottom:4px ; z-index:3"></a>
				<img src="/img/curve.png" class="curve" />	
			</div>
		</div>
	</div><!-- End sub-header -->

	<!-- Middel Container
	================================================= -->
	@yield('container')

	<!-- footer 
	================================================== -->
	<footer class="row footer">
		<div class="large-12 columns">
		  
		  <div class="row">
		    <div class="large-6 columns">
		    	<p>جميع الحقوق محفوظة لشبكة سوداكتف 2013 &copy;</p>
		    </div>

		    <div class="large-6 columns">
			    <ul class="inline-list left">
			        <li><a href="/../about/">عن سوداكتف</a></li>
			        <li><a href="/../team/">فريق العمل</a></li>
			        <li><a href="/../policy">سياسة الموقع</a></li>
			        <li><a href="/../contact">اتصل بنا</a></li>
			    </ul>
		    </div>
		  </div>

		</div>
	</footer><!-- End Footer -->


	<!-- Javascripts
	================================================== -->
	{{ HTML::script('assets/foundation/js/vendor/jquery.js') }}

	{{ HTML::script('assets/foundation/js/foundation/foundation.js') }}
	{{ HTML::script('assets/foundation/js/foundation/foundation.alert.js') }}
	{{ HTML::script('assets/foundation/js/foundation/foundation.dropdown.js') }}

	@section('javascripts')
	@show

	<script>
		$(document).foundation();
	</script>

</body>
</html>
