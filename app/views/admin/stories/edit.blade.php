@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

{{-- Content --}}
@section('content')

	{{-- Edit Blog Form --}}
	<form method="post" action="@if (isset($story)){{ URL::to('admin/stories/' . $story->id . '/edit') }}
	@else {{ URL::to('admin/stories/create') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<p>
		{{ Form::label('title', 'عنوان الشخصية') }}
		{{ Form::text('title',Input::old('title', isset($story) ? $story->title : null),
		array('class' => $errors->has('title') ? 'error' : '')) }}
		{{ $errors->first('title', '<small class="error">:message</small>') }}
		</p>


        <p>
        {{ Form::label('category_id', 'التصنيف') }}
        {{ Form::select('category_id', Category::lists('name','id')) }}
        </p>

        <p>
        {{ Form::label('user_id', 'المساهم') }}
		{{ Form::select('user_id', User::lists('username','id')) }}
		</p>

        <p>
        {{ Form::label('content', 'النص') }}
		{{ Form::textarea('content',Input::old('content', isset($story) ? $story->content : null),
		array('class' => $errors->has('content') ? 'error' : '')) }}
		{{ $errors->first('content', '<small class="error">:message</small>') }}</p>

        <p>
        {{ Form::label('image', 'الصورة') }}
		{{ Form::file('image') }}
		</p>
		
        <p>
        {{ Form::submit('تحديث',array('class'=> 'button small')) }}
		<a href="{{{ URL::to('admin/stories') }}}" class="button small secondary">الغاء</a>
		</p>

	{{ Form::close() }}
@stop
