@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

{{-- Content --}}
@section('content')

<h3>{{{ $title }}}</h3>

{{-- Form for New Story --}}
{{ Form::open(array('files'=>true)) }}
	
	{{-- Story Title --}}
	<p>
	{{ Form::label('title', 'اسم الشخصية') }}
	{{ Form::text('title','',array('class' => $errors->has('title') ? 'error' : '')) }}
	{{ $errors->first('title', '<small class="error">:message</small>') }}
	</p>

	{{-- Story Category --}}
    <p class="large-3">
	{{ Form::label('category_id', 'التصنيف') }}
	{{ Form::select('category_id', Category::lists('name','id')) }}
    </p>

	{{-- Story Content --}}
    <p>
	{{ Form::label('content', 'النص') }}
	{{ Form::textarea('content','',array('class' => $errors->has('content') ? 'error' : '')) }}
	{{ $errors->first('content', '<small class="error">:message</small>') }}
	</p>

	{{-- Story Image --}}
    <p>
	{{ Form::label('image', 'الصورة') }}
	{{ Form::file('image',array('class' => $errors->has('image') ? 'error' : '')) }}
	{{ $errors->first('image', '<small class="error">:message</small>') }}
	</p>

	{{-- Actions --}}
    <p>
	{{ Form::submit('اضافة',array('class'=> 'button small')) }}
	<a href="{{{ URL::to('admin/stories') }}}" class="button small secondary">الغاء</a>
	</p>

{{ Form::close() }}
{{-- ./ Form for New Story --}}

@stop
