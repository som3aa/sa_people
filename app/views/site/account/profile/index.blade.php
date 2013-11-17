@extends('site.layouts.account')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ 'تعديل البروفايل' }}}
@stop

{{-- Tabes --}}
@section('tabes')
  <ul class="tabes">
    <li class=""><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
    <li class="active"><a href="/../account/profile">تعديل بروفايلي</a></li>
    <li class=""><a href="/../account/stories">ادارة المقالات</a></li>
    <li class=""><a href="/../account/user">اعدادات الحساب</a></li>
  </ul>
@stop

{{-- Sidebar --}}
@section('sidebar')
  <!-- categories list -->
  <section>
    {{-- Avatar --}}
    <div class="th radius">
      @if (!empty(Auth::user()->profile->avatar))
        {{ HTML::image(Auth::user()->profile->avatar,Auth::user()->profile->name) }}
      @else
        {{ HTML::image('img/avatar.jpg') }}
      @endif
    </div>
    <a href="/../account/profile/avatar">تغير صورة البروفايل</a>
  </section>
@stop

{{-- Content --}}
@section('content')

{{-- Form for New User --}}
{{ Form::model($profile,array('action' => array('AccountProfileController@postEdit',$profile->id))) }}
    
    {{-- name --}}
    <p>
    {{ Form::label('name', 'الاسم') }}
    {{ Form::text('name',Input::old('name'),array('class' => $errors->has('name') ? 'error' : '')) }}
    {{ $errors->first('name', '<small class="error">:message</small>') }}
    </p>

    {{-- location --}}
    <p>
    {{ Form::label('location', 'المكان') }}
    {{ Form::text('location',Input::old('location'),array('class' => $errors->has('location') ? 'error' : '')) }}
    {{ $errors->first('location', '<small class="error">:message</small>') }}
    </p>

    {{-- Actions --}}
    <p>
    {{ Form::submit('تحديث',array('class'=> 'button small')) }}
    </p>

{{ Form::close() }}
{{-- ./ Form for New User --}}

@stop