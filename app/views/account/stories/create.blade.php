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
  <li class=""><a href="/../account/messages">الرسائل الخاصة</a></li>
  <li class="active"><a href="/../account/stories">ادارة المقالات</a></li>
  <li class=""><a href="/../account/user">اعدادات الحساب</a></li>
</ul>
  
<h4>{{{ $title }}}</h4>

{{-- Form for New Story --}}
{{ Form::open(array('files'=>true)) }}

  {{-- Story Rules --}}
  <p><div class="panel radius">
    <h5>على الكاتب مُراعاة الآتي :</h5>
    <ol>
      <li>كتابة المقال بشكل بسيط وسلس ومراعاة ترابط الجمل مع بعضها . </li>
      <li>أي مقال منسوخ من غير تعديل لايُقبل ويتم حذفهُ على الفور .</li>
      <li>مُراجعة المقال قبل نشرُهـ لتفادي الأخطاء الإملائية واللغوية .</li>
      <li>تقسيم المقال إلى ثلاث أو أربع أجزاء ،أما إن كان حجم المقال كبير لامانع من تقسيمه إلى خمس أوست أجزاء.</li>
    </ol>
  </div></p>
  
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
  {{ Form::label('content', 'النص') }}
  <div id="toolbar" style="display: none;">
    <a data-wysihtml5-command="bold" title="CTRL+B">bold</a> |
    <a data-wysihtml5-command="italic" title="CTRL+I">italic</a>
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