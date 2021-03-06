@extends('site.users.layout')

{{-- Web site Title --}}
@section('title')
@parent - 
الدخول
@stop

{{-- Content --}}
@section('content')
    
    <p>سجل دخولك بسرعة عن طريق الفيسبوك</p>
    <p><a class="btn-auth btn-facebook" onclick="login();return false;" href="#button">الدخول عن طريق <b>الفيسبوك</b></a></p>

    <hr />

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


@section('javascripts')

    <!-- Facebook login button -->
    <script type="text/javascript">
        var newwindow;
        var intId;
        function login(){
            var  screenX    = typeof window.screenX != 'undefined' ? window.screenX : window.screenLeft,
            screenY    = typeof window.screenY != 'undefined' ? window.screenY : window.screenTop,
            outerWidth = typeof window.outerWidth != 'undefined' ? window.outerWidth : document.body.clientWidth,
            outerHeight = typeof window.outerHeight != 'undefined' ? window.outerHeight : (document.body.clientHeight - 22),
            width    = 500,
            height   = 270,
            left     = parseInt(screenX + ((outerWidth - width) / 2), 10),
            top      = parseInt(screenY + ((outerHeight - height) / 2.5), 10),
            features = (
                'width=' + width +
                ',height=' + height +
                ',left=' + left +
                ',top=' + top
            );
         
        newwindow=window.open('/../user/fb','Login_by_facebook',features);

        if (window.focus) {newwindow.focus()}
            return false;
        }
    </script>

@stop
