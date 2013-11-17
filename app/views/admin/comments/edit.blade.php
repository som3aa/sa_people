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

{{-- Form for The comment --}}
{{ Form::model($comment) }}
	
	{{-- Story Content --}}
	{{ Form::label('content', 'النص') }}
	<div id="toolbar" style="display: none;">
		<a data-wysihtml5-command="bold" title="CTRL+B">bold</a> |
		<a data-wysihtml5-command="italic" title="CTRL+I">italic</a> |
		<a data-wysihtml5-command="justifyCenter">align center</a> |
		<a data-wysihtml5-command="insertUnorderedList">insert unordered list</a>
		<a data-wysihtml5-action="change_view">switch to html view</a>
	</div>
	{{ Form::textarea('content',Input::old('content'),array('class' => $errors->has('content') ? 'error' : '','id' => 'textarea')) }}
	{{ $errors->first('content', '<small class="error">:message</small>') }}
	<br/><br/>


	{{-- Actions --}}
    <p>
	{{ Form::submit('تحديث',array('class'=> 'button small')) }}
	<a href="{{{ URL::to('admin/categories') }}}" class="button small secondary">الغاء</a>
	</p>

{{ Form::close() }}
{{-- ./ Form for New comment --}}

@stop

@section('javascripts')

<!-- wysihtml5 parser rules -->
<script src="/../assets/wysihtml5/js/simple.js"></script>
<!-- Library -->
<script src="/../assets/wysihtml5/js/wysihtml5-0.4.0pre.min.js"></script>

<script>
var editor = new wysihtml5.Editor("textarea", {
	toolbar:        "toolbar",
	parserRules:    wysihtml5ParserRules,
	stylesheets:    "/../assets/wysihtml5/css/stylesheet.css",
	useLineBreaks:  false
});
</script>

@stop