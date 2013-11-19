@extends('site.layouts.account')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ $title }}}
@stop

{{-- Tabes --}}
@section('tabes')
  <ul class="tabes">
    <li class=""><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
    <li class=""><a href="/../account/profile">تعديل بروفايلي</a></li>
    <li class="active"><a href="/../account/stories">ادارة المقالات</a></li>
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
  </section>
@stop

{{-- Content --}}
@section('content')

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
          <a href="{{{ URL::to('admin/stories') }}}" class="button small secondary">الغاء</a>
      </p>
      <!-- ./ form actions -->
  </form>

@stop