@extends('site.layouts.user_full_width')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ Lang::get('user.forgot_password') }}}
@stop

{{-- Content --}}
@section('content')

	<h1>{{{ Lang::get('user.forgot_password') }}}</h1>
	
	<form method="POST" action="{{{ (Confide::checkAction('UserController@do_reset_password'))    ?: URL::to('/user/reset') }}}" accept-charset="UTF-8">
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">

	    <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
	    <input placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">

	    <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
	    <input placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">

		<button type="submit" class="button small">{{{ Lang::get('confide::confide.forgot.submit') }}}</button>
	</form>

@stop