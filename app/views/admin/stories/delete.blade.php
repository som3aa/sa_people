@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

@section('s-active') class="active" @stop

{{-- Content --}}
@section('content')

<h3>{{{ $title }}}</h3>

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
