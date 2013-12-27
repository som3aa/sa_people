@extends('account.layout')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ 'تعديل حسابي' }}}
@stop

{{-- Content --}}
@section('content')

{{-- Tabes --}}
<ul class="tabes">
    <li class=""><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
    <li class=""><a href="/../account/profile">تعديل بروفايلي</a></li>
    <li class=""><a href="/../account/messages">الرسائل الخاصة</a></li>
    <li class=""><a href="/../account/stories">ادارة المقالات</a></li>
    <li class="active"><a href="/../account/user">اعدادات الحساب</a></li>
</ul>

<h4>اعدادات الحساب</h4>

{{-- Form for New User --}}
{{ Form::model($user,array('action' => array('AccountUserController@postEdit',$user->id))) }}
    
    {{-- Username --}}
    <p>
    {{ Form::label('username', 'اسم المستخدم') }}
    {{ Form::text('username',Input::old('username'),array('class' => $errors->has('username') ? 'error' : '')) }}
    {{ $errors->first('username', '<small class="error">:message</small>') }}
    </p>

    {{-- Email --}}
    <p>
    {{ Form::label('email', 'الايميل') }}
    {{ Form::text('email',Input::old('email'),array('class' => $errors->has('email') ? 'error' : '')) }}
    {{ $errors->first('email', '<small class="error">:message</small>') }}
    </p>

    {{-- Password --}}
    <p>
    {{ Form::label('password', 'كلمة المرور') }}
    {{ Form::password('password','',array('class' => $errors->has('password') ? 'error' : '')) }}
    {{ $errors->first('password', '<small class="error">:message</small>') }}
    </p>

    {{-- Password Confirm --}}
    <p>
    {{ Form::label('password_confirmation', 'تاكيد كلمة المرور') }}
    {{ Form::password('password_confirmation','',array('class' => $errors->has('password_confirmation') ? 'error' : '')) }}
    {{ $errors->first('password_confirmation', '<small class="error">:message</small>') }}
    </p>

    {{-- Actions --}}
    <p>
    {{ Form::submit('تحديث',array('class'=> 'button small')) }}
    </p>

{{ Form::close() }}
{{-- ./ Form for New User --}}

@stop