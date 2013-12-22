@extends('site.users.layout')

{{-- Web site Title --}}
@section('title')
@parent - 
نسيت كلمة المرور
@stop

{{-- Content --}}
@section('content')

    <h2>نسيت كلمة المرور</h2>
	
	<form method="POST" action="{{ (Confide::checkAction('UserController@do_forgot_password')) ?: URL::to('/user/forgot') }}" accept-charset="UTF-8">
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">

	    <label for="email">{{{ Lang::get('confide::confide.e_mail') }}}</label>
	    <input placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">

	    <input class="button small" type="submit" value="{{{ Lang::get('confide::confide.forgot.submit') }}}">
	</form>

@stop
