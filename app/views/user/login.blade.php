@extends('layouts.user')

{{-- Web site Title --}}
@section('title')
@parent - 
الدخول
@stop

{{-- Content --}}
@section('content')

	<h2>الدخول</h2>

    <form method="POST" action="{{ URL::to('user/login') }}" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <label for="email">{{ Lang::get('confide::confide.username_e_mail') }}</label>
            <input tabindex="1" placeholder="{{ Lang::get('confide::confide.username_e_mail') }}" type="text" name="email" id="email" value="{{ Input::old('email') }}">

            <label for="password">{{ Lang::get('confide::confide.password') }}</label>
            <input tabindex="2" placeholder="{{ Lang::get('confide::confide.password') }}" type="password" name="password" id="password">

            <label for="remember">{{ Lang::get('confide::confide.login.remember') }}
                <input type="hidden" name="remember" value="0">
                <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
            </label>

            <button tabindex="3" type="submit" class="button small">{{ Lang::get('confide::confide.login.submit') }}</button>
            <a class="button small secondary" href="forgot">{{ Lang::get('confide::confide.login.forgot_password') }}</a>
    </form>

@stop
