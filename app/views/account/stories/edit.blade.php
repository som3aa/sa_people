@extends('account.layout')

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

<a href="{{{ URL::to('account/stories/') }}}" class="button small secondary">رجوع</a>

<h4>{{{ $title }}}</h4>

{{-- Form for The Story --}}
{{ Form::model($story, array('files' => true )) }}
  
  {{-- Story Title --}}
  <p>
  {{ Form::label('title', 'اسم الشخصية') }}
  {{ Form::text('title',Input::old('title'),array('class' => $errors->has('title') ? 'error' : '')) }}
  {{ $errors->first('title', '<small class="error">:message</small>') }}
  </p>

  {{-- Story Category --}}
    <p class="large-3">
  {{ Form::label('category_id', 'التصنيف') }}
  {{ Form::select('category_id', Category::lists('name','id'),$story->category->id) }}
  </p>


  {{-- Story Content --}}
  {{ Form::label('content', 'النص') }}
  <div id="toolbar" style="display: none;">
    <a data-wysihtml5-command="bold" title="CTRL+B">bold</a> |
    <a data-wysihtml5-command="italic" title="CTRL+I">italic</a>
    <a data-wysihtml5-action="change_view">switch to html view</a>
  </div>
  {{ Form::textarea('content',Input::old('content'),array('class' => $errors->has('content') ? 'error' : '','id' => 'textarea')) }}
  {{ $errors->first('content', '<small class="error">:message</small>') }}
  <br/><br/>

  {{-- Story Image --}}
    <div class="row">
  <div class="large-2 columns">
    {{ HTML::image($story->image,'',array('class'=>'th')) }}
  </div>
  <div class="large-10 columns">
    {{ Form::label('image', 'تغير الصورة') }}
    {{ Form::file('image',array('class' => $errors->has('image') ? 'error' : '')) }}
    {{ $errors->first('image', '<small class="error">:message</small>') }}
  </div>
  </div>
  <br/><br/>

  {{-- Actions --}}
    <p>
  {{ Form::submit('تحديث',array('class'=> 'button small')) }}
  <a href="{{{ URL::to('account/stories') }}}" class="button small secondary">الغاء</a>
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