@extends('layouts.user')

{{-- Web site Title --}}
@section('title')
@parent - 
التسجيل
@stop

{{-- Content --}}
@section('content')

	<h2>التسجيل</h2>
	
	<form method="POST" action="{{{ (Confide::checkAction('UserController@store')) ?: URL::to('user')  }}}" accept-charset="UTF-8">
	    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

	        {{-- username --}}
	        <label for="username">{{{ Lang::get('confide::confide.username') }}}<small> ( بالنجليزي فقط )</small></label>
	        <input placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}"
	       	class="{{{ $errors->has('username') ? 'error' : '' }}}">{{ $errors->first('username', '<small class="error">:message</small>') }}
	        
	       	{{-- email --}}
	        <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} <small> ( {{ Lang::get('confide::confide.signup.confirmation_required') }} )</small></label>
	        <input placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}"
	        class="{{{ $errors->has('email') ? 'error' : '' }}}">{{ $errors->first('email', '<small class="error">:message</small>') }}

	        {{-- password --}}
	        <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
	        <input placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password"
	        class="{{{ $errors->has('password') ? 'error' : '' }}}">{{ $errors->first('password', '<small class="error">:message</small>') }}

	        {{-- password confirmation --}}
	        <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
	        <input placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation"
	        class="{{{ $errors->has('password_confirmation') ? 'error' : '' }}}">{{ $errors->first('password_confirmation', '<small class="error">:message</small>') }}

	        <br/><hr /><br/>

	        <h4>معلومات البروفايل</h4>

		    {{-- name --}}
	        <label for="name">الاسم<small> ( بالعربي أو الانجليزي )</small></label>
	        <input placeholder="الاسم" type="text" name="name" id="name" value="{{{ Input::old('name') }}}"
	       	class="{{{ $errors->has('name') ? 'error' : '' }}}">{{ $errors->first('name', '<small class="error">:message</small>') }}

		    {{-- location --}}
	        <label for="location">مكان الاقامة<small> ( مثلا السودان - الخرطوم )</small></label>
	        <input placeholder="مكان الاقامة" type="text" name="location" id="location" value="{{{ Input::old('location') }}}"
	       	class="{{{ $errors->has('location') ? 'error' : '' }}}">{{ $errors->first('location', '<small class="error">:message</small>') }}

		    {{-- Gender --}}
		    {{ Form::label('gender_label', 'الجنس') }}
		    <span><input style="display:inline" type="radio" name="gender" value="1" id="male" @if(Input::old('gender') == 1) checked @endif>
		          <label style="display:inline" for="male" >ذكر</label></span>
		     <span><input style="display:inline; margin-right:10px;" type="radio" name="gender" value="2" id="female" @if(Input::old('gender') == 2) checked @endif>
		          <label style="display:inline" for="female">انثى</label></span>
		    {{ $errors->first('gender', '<small class="error">:message</small>') }}

		    {{-- BirthDay --}}
		    <p>
		    <label for="birthday">تاريخ الميلاد<small> ( لم يتم نشره)</small></label>
		     {{ Form::selectRange('day', 1, 31,Input::old('day'),array('class'=>'birthday')) }}
		     {{ Form::selectMonth('month',Input::old('month'),array('class'=>'birthday')); }}
		     {{ Form::selectRange('year', 2014,1920,Input::old('year'),array('class'=>'birthday')) }}
		    </p>

		    <br/>
		    {{-- Bio --}}
		    <p>
		    <label for="bio">عن نفسك<small> ( يمكنك تركه فارغا )</small></label>
		    {{ Form::textarea('bio',Input::old('bio'),array('class' => $errors->has('bio') ? 'error' : '',
		    		'style'=> 'height:150px','placeholder'=>'عن نفسك')) }}
		    {{ $errors->first('bio', '<small class="error">:message</small>') }}
		    </p>

	        <button type="submit" class="button small">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
	</form>
		
@stop
