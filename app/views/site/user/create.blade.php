@extends('site.layouts.user')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ Lang::get('user.register') }}}
@stop

{{-- Content --}}
@section('content')

	<h1>{{{ Lang::get('user.register') }}}</h1>
	
	<form method="POST" action="{{{ (Confide::checkAction('UserController@store')) ?: URL::to('user')  }}}" accept-charset="UTF-8">
	    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

	        <label for="username">{{{ Lang::get('confide::confide.username') }}}<small> ( بالنجليزي فقط )</small></label>
	        <input placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">

	        <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} <small> ( {{ Lang::get('confide::confide.signup.confirmation_required') }} )</small></label>
	        <input placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">

	        <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
	        <input placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">

	        <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
	        <input placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">

	        <button type="submit" class="button small">{{{ Lang::get('confide::confide.signup.submit') }}}</button>

	</form>
		
@stop
