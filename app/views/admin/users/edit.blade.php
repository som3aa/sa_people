@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

@section('u-active') class="active" @stop

{{-- Content --}}
@section('content')

<h3>{{{ $title }}}</h3>

{{-- Form for New User --}}
{{ Form::model($user) }}
	
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

	{{-- confirmed ? --}}
	<p>
	{{ Form::label('confirmed', 'مفعل؟' , array('style'=>'display:inline;margin-left:5px') ) }}
	{{ Form::checkbox('confirmed', true, false);}}
	</p>

	{{-- roles --}}
	<p>
    {{ Form::label('roles', 'الصلاحيات') }}
    <select name="roles[]" id="roles[]" multiple>
        @foreach ($roles as $role)
        	<option value="{{{ $role->id }}}"{{{ ( array_search($role->id, $user->currentRoleIds()) !== false && array_search($role->id, $user->currentRoleIds()) >= 0 ? ' selected="selected"' : '') }}}>{{{ $role->name }}}</option>
        @endforeach
	</select>
	</p>

	{{-- Actions --}}
    <p>
	{{ Form::submit('تحديث',array('class'=> 'button small')) }}
	<a href="{{{ URL::to('admin/users') }}}" class="button small secondary">الغاء</a>
	</p>

{{ Form::close() }}
{{-- ./ Form for New User --}}

@stop

