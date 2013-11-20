@extends('layouts.admin')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

{{-- Content --}}
@section('content')

{{-- Tabes --}}
<ul class="tabes">
  <li class=""><a href="/../admin/stories">الشخصيات</a></li>
  <li class=""><a href="/../admin/categories">التصنيفات</a></li>
  <li class=""><a href="/../admin/comments">التعليقات</a></li>
  <li class="active"><a href="/../admin/users">الاعضاء</a></li>
  <li class=""><a href="/../admin/roles">الصلاحيات</a></li>
</ul>

<h4>{{{ $title }}}</h4>

    {{-- Delete Blog Form --}}
    <form method="post" action="" autocomplete="off">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $user->id }}" />
        <!-- ./ csrf token -->
        <p>هل انت متاكد من حذف العضو : {{{ $user->username }}}</p>
        <!-- Form Actions -->
        <p>
            {{ Form::submit('حذف',array('class'=> 'button small')) }}
            <a href="{{{ URL::to('admin/users') }}}" class="button small secondary">الغاء</a>
        </p>
        <!-- ./ form actions -->
    </form>
@stop
