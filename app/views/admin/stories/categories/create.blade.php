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
  @if (Entrust::can('manage_stories'))<li class=""><a href="/../admin/stories">الشخصيات</a></li>@endif
  @if (Entrust::can('manage_categories'))<li class="active"><a href="/../admin/categories">التصنيفات</a></li>@endif
  @if (Entrust::can('manage_users'))<li class=""><a href="/../admin/users">الاعضاء</a></li>@endif
  @if (Entrust::can('manage_roles'))<li class=""><a href="/../admin/roles">الصلاحيات</a></li>@endif
</ul>

<h4>{{{ $title }}}</h4>

{{-- Form for New category --}}
{{ Form::open() }}
	
	{{-- category Title --}}
	<p>
	{{ Form::label('name', 'اسم التصنيف') }}
	{{ Form::text('name','',array('class' => $errors->has('name') ? 'error' : '')) }}
	{{ $errors->first('name', '<small class="error">:message</small>') }}
	</p>

	{{-- Actions --}}
    <p>
	{{ Form::submit('اضافة',array('class'=> 'button small')) }}
	<a href="{{{ URL::to('admin/categories') }}}" class="button small secondary">الغاء</a>
	</p>

{{ Form::close() }}
{{-- ./ Form for New category --}}

@stop
