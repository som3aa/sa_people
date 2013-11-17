@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

@section('co-active') class="active" @stop

{{-- Content --}}
@section('content')

<h3>{{{ $title }}}</h3>

    {{-- Delete Blog Form --}}
    <form method="post" action="" autocomplete="off">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $comment->id }}" />
        <!-- ./ csrf token -->
        <p>هل انت متاكد من حذف تعليق : {{{ Str::limit($comment->content, 40, '...') }}}</p>
        <!-- Form Actions -->
        <p>
            {{ Form::submit('حذف',array('class'=> 'button small')) }}
            <a href="{{{ URL::to('admin/comments') }}}" class="button small secondary">الغاء</a>
        </p>
        <!-- ./ form actions -->
    </form>
@stop
