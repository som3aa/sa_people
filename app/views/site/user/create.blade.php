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

	        <br/><hr /><br/>

	        <h4>معلومات البروفايل</h4>

		    {{-- name --}}
		    {{ Form::label('name', 'الاسم') }}
		    {{ Form::text('name',Input::old('name'),array('class' => $errors->has('name') ? 'error' : '')) }}
		    {{ $errors->first('name', '<small class="error">:message</small>') }}

		    {{-- location --}}
		    {{ Form::label('location', 'المكان') }}
		    {{ Form::text('location',Input::old('location'),array('class' => $errors->has('location') ? 'error' : '')) }}
		    {{ $errors->first('location', '<small class="error">:message</small>') }}

		    {{-- Gender --}}
		    {{ Form::label('gender_label', 'الجنس') }}
		    <span><input style="display:inline" type="radio" name="gender" value="1" id="male">
		          <label style="display:inline" for="male" >ذكر</label></span>
		     <span><input style="display:inline; margin-right:10px;" type="radio" name="gender" value="2" id="female">
		          <label style="display:inline" for="female">انثى</label></span>
		    {{ $errors->first('gender', '<small class="error">:message</small>') }}

		    {{-- BirthDay --}}
		    <p>
		    {{ Form::label('BirthDay', 'تاريخ الميلاد') }}
		     {{ Form::selectRange('day', 1, 31,Input::old('day'),array('class'=>'birthday')) }}
		     {{ Form::selectMonth('month',Input::old('month'),array('class'=>'birthday')); }}
		     {{ Form::selectRange('year', 2014,1920,Input::old('year'),array('class'=>'birthday')) }}
		    </p>

		    <br/>
		    {{-- Bio --}}
		    <p>
		    {{ Form::label('bio', 'عن نفسك') }}
		    {{ Form::textarea('bio',Input::old('bio'),array('class' => $errors->has('bio') ? 'error' : '',
		    		'style'=> 'height:150px')) }}
		    {{ $errors->first('bio', '<small class="error">:message</small>') }}
		    </p>

	        <button type="submit" class="button small">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
	</form>
		
@stop
