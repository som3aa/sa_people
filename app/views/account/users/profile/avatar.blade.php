@extends('account.layout')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ 'تعديل البروفايل' }}}
@stop

{{-- Content --}}
@section('content')

  {{-- Tabes --}}
  <ul class="tabes">
    <li class=""><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
    <li class="active"><a href="/../account/profile">تعديل بروفايلي</a></li>
    <li class=""><a href="/../account/messages">الرسائل الخاصة</a></li>
    <li class=""><a href="/../account/stories">ادارة المقالات</a></li>
    <li class=""><a href="/../account/user">اعدادات الحساب</a></li>
  </ul>

  <h4>تغير صورة البروفايل :</h4>

  {{ Form::open(array('action' => array('AccountProfileController@postAvatar'),'files'=>true) ) }}

    <p>{{ Form::label('image', 'الصورة') }}
    {{ Form::file('image') }}</p>

    <p>{{ Form::submit('ارسال',array('class'=>'button small')) }}</p>

  {{ Form::close() }}

@stop