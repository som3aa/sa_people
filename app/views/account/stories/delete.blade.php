@extends('layouts.account')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ $title }}}
@stop

{{-- Content --}}
@section('content')

{{-- Tabes --}}
<ul class="tabes">
  <li class=""><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
  <li class=""><a href="/../account/profile">تعديل بروفايلي</a></li>
  <li class="active"><a href="/../account/stories">ادارة المقالات</a></li>
  <li class=""><a href="/../account/user">اعدادات الحساب</a></li>
</ul>
  
<h4>{{{ $title }}}</h4>

  {{-- Delete Blog Form --}}
  <form method="post" action="" autocomplete="off">
      <!-- CSRF Token -->
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
      <input type="hidden" name="id" value="{{ $story->id }}" />
      <!-- ./ csrf token -->
      <p>هل انت متاكد من حذف مقال : {{{ $story->title }}}</p>
      <!-- Form Actions -->
      <p>
          {{ Form::submit('حذف',array('class'=> 'button small')) }}
          <a href="{{{ URL::to('account/stories') }}}" class="button small secondary">الغاء</a>
      </p>
      <!-- ./ form actions -->
  </form>

@stop