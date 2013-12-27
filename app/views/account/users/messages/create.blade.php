@extends('account.layout')

{{-- Web site Title --}}
@section('title')
@parent - 
ارسال رسالة
@stop

{{-- Content --}}
@section('content')

{{-- Tabes --}}
<ul class="tabes">
  <li class=""><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
  <li class=""><a href="/../account/profile">تعديل بروفايلي</a></li>
  <li class="active"><a href="/../account/messages">الرسائل الخاصة</a></li>
  <li class=""><a href="/../account/stories">ادارة المقالات</a></li>
  <li class=""><a href="/../account/user">اعدادات الحساب</a></li>
</ul>
  
<h4>ارسال رسالة</h4>

{{ Form::open() }}
  
  {{-- Message To --}}
  <p>
  {{ Form::label('to', 'الى') }}
  {{ Form::text('to','',array('class' => $errors->has('to') ? 'error' : '')) }}
  {{ $errors->first('to', '<small class="error">:message</small>') }}
  </p>

  {{-- Conversation supject --}}
  <p>
  {{ Form::label('supject', 'العنوان') }}
  {{ Form::text('supject','',array('class' => $errors->has('supject') ? 'error' : '')) }}
  {{ $errors->first('supject', '<small class="error">:message</small>') }}
  </p>

  {{-- Message text --}}
  {{ Form::label('text', 'النص') }}
  {{ Form::textarea('text','',array('class' => $errors->has('text') ? 'error' : '','id' => 'textarea')) }}
  {{ $errors->first('text', '<small class="error">:message</small>') }}
  <br/>

  {{-- Actions --}}
  <p>
  {{ Form::submit('ارسال',array('class'=> 'button small')) }}
  <a href="{{{ URL::to('account/messages') }}}" class="button small secondary">الغاء</a>
  </p>

{{ Form::close() }}

@stop
