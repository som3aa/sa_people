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
					@if (!empty($user->profile->avatar))
		              {{ HTML::image($user->profile->avatar,$user->profile->name) }}
		            @else
		              {{ HTML::image('img/avatar.jpg') }}
		            @endif </a>
			        <ul id="drop" data-dropdown-content class="f-dropdown tiny">
						@if(Entrust::hasRole('admin')) <li><a href="/../admin/stories">لوحة التحكم</a></li> @endif
			       	 	<li><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
			       	 	<li style="border-bottom:1px solid #cecece;padding-bottom:2"><a href="/../account/stories">مقالاتي</a></li>
						<li><a href="/../account/user">اعدادات الحساب</a></li>
				 		<li><a href="/../user/logout">تسجيل الخروج</a></li>
			        </ul>
				</span>
			@else 
				<a href="/../user/login">{{{ Lang::get('user.login') }}}</a> <span style="color:#eaa494; margin:0 3px;"> او </span><a href="/../user/create">{{{ Lang::get('user.register') }}}</a>
			@endif
			</div>
			<a href="/../contact" style="float:left;padding:5px 10px;color:#555;">{{{ Lang::get('site.beta') }}}</a>
		</div>
	</div><!-- End Header -->

	<!-- Main Page Content and Sidebar 
	================================================== -->
	<div class="row">
		<!-- Main Blog Content -->
		<div class="large-12 columns" role="content">

			<div class="row">
			    <div class="large-12 columns post">

			        <!-- admin menu -->
			        <dl class="sub-nav">
			        	<dd><h4><a href="{{{ URL::to('admin/stories') }}}">الشخصيات</a></h4></dd>
			        	<dd><h4><a href="{{{ URL::to('admin/categories') }}}">التصنيفات</a></h4></dd>
			        	<dd><h4><a href="{{{ URL::to('admin/comments') }}}">التعليقات</a></h4></dd>
			        	<dd><h4><a href="{{{ URL::to('admin/users') }}}">الاعضاء</a></h4></dd>
			        	<dd><h4><a href="{{{ URL::to('admin/roles') }}}">الصلاحيات</a></h4></dd>
			        </dl>
			        <!-- ./ admin menu -->

			        <!-- Notifications -->
					@include('notifications') 
					<!-- ./ notifications -->

					<!-- Content -->
					@yield('content')
					<!-- ./ content -->
				</div>
			</div>
		</div><!-- End Main Content -->
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
	{{ HTML::script('assets/foundation/js/foundation/foundation.dropdown.js') }}

	<script>
		$(document).foundation();
	</script>

	@section('javascripts')
	@show

</body>
</html>
