<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) {
        Session::put('loginRedirect', Request::url());
        return Redirect::to('user/login/')->with( 'notice', 'يجب عليك تسجيل الدخول اولا' );
    }
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


/*
|--------------------------------------------------------------------------
| Role Permissions
|--------------------------------------------------------------------------
|
| Access filters based on roles.
|
*/

// Check for permissions on admin actions
Entrust::routeNeedsPermission( 'admin/stories*', 'manage_stories', Redirect::to('/') );
Entrust::routeNeedsPermission( 'admin/categories*', 'manage_categories', Redirect::to('/') );
Entrust::routeNeedsPermission( 'admin/comments*', 'manage_comments', Redirect::to('/') );
Entrust::routeNeedsPermission( 'admin/users*', 'manage_users', Redirect::to('/') );
Entrust::routeNeedsPermission( 'admin/roles*', 'manage_roles', Redirect::to('/') );


/*
|--------------------------------------------------------------------------
| account Access
|--------------------------------------------------------------------------
|
| test
|
*/

Route::filter('account-auth', function()
{
    list($user,$redirect) = User::checkAuthAndRedirect(Request::url());
    if($redirect){return $redirect;}
});

// Check for permissions on account actions
Entrust::routeNeedsPermission( 'account/profile*', 'manage_his_profile', Redirect::to('/') );
Entrust::routeNeedsPermission( 'account/stories*', 'manage_hist_stories', Redirect::to('/') );
Entrust::routeNeedsPermission( 'account/user*', 'manage_his_user', Redirect::to('/') );