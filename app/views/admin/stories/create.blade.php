@extends('admin.layout')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

{{-- Content --}}
@section('content')

{{-- Tabes --}}
<ul class="tabes">
  @if (Entrust::can('manage_stories'))<li class="active"><a href="/../admin/stories">الشخصيات</a></li>@endif
  @if (Entrust::can('manage_categories'))<li class=""><a href="/../admin/categories">التصنيفات</a></li>@endif
  @if (Entrust::can('manage_users'))<li class=""><a href="/../admin/users">الاعضاء</a></li>@endif
  @if (Entrust::can('manage_roles'))<li class=""><a href="/../admin/roles">الصلاحيات</a></li>@endif
</ul>

<h4>{{{ $title }}}</h4>

{{-- Form for New Story --}}
{{ Form::open(array('files'=>true)) }}
	
	{{-- Story Title --}}
	<p>
	{{ Form::label('title', 'اسم الشخصية') }}
	{{ Form::text('title','',array('class' => $errors->has('title') ? 'error' : '')) }}
	{{ $errors->first('title', '<small class="error">:message</small>') }}
	</p>

	<p>
	{{ Form::label('status', 'منشور؟' , array('style'=>'display:inline;margin-left:5px') ) }}
	{{ Form::checkbox('status', true, false);}}
	</p>

	{{-- Story Category --}}
    <p class="large-3">
	{{ Form::label('category_id', 'التصنيف') }}
	{{ Form::select('category_id', Category::lists('name','id')) }}
    </p>

	{{-- Story Content --}}
	{{ Form::label('content', 'النص') }}
	<div id="toolbar" style="display: none;">
		<a data-wysihtml5-command="bold" title="CTRL+B">bold</a> |
		<a data-wysihtml5-command="italic" title="CTRL+I">italic</a> |
		<a data-wysihtml5-command="justifyCenter">align center</a> |
		<a data-wysihtml5-command="insertUnorderedList">insert unordered list</a>
		<a data-wysihtml5-action="change_view">switch to html view</a>
	</div>
	{{ Form::textarea('content','',array('class' => $errors->has('content') ? 'error' : '','id' => 'textarea')) }}
	{{ $errors->first('content', '<small class="error">:message</small>') }}
	<br/>

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
