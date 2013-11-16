@extends('site.layouts.account')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ 'تعديل حسابي' }}}
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs', Breadcrumbs::render('page','تعديل حسابي'))

{{-- Content --}}
@section('content')

<div class="post">

{{-- Form for New User --}}
{{ Form::model($user,array('action' => array('AccountSettingsController@postEdit',$user->id))) }}
    
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

</div>

@stop