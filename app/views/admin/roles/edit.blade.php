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
  @if (Entrust::can('manage_stories'))<li class=""><a href="/../admin/stories">الشخصيات</a></li>@endif
  @if (Entrust::can('manage_categories'))<li class=""><a href="/../admin/categories">التصنيفات</a></li>@endif
  @if (Entrust::can('manage_users'))<li class=""><a href="/../admin/users">الاعضاء</a></li>@endif
  @if (Entrust::can('manage_roles'))<li class="active"><a href="/../admin/roles">الصلاحيات</a></li>@endif
</ul>

<h4>{{{ $title }}}</h4>

{{-- Form for New Role --}}
{{ Form::model($role) }}
	
	{{-- Role name --}}
	<p>
	{{ Form::label('name', 'الاسم') }}
	{{ Form::text('name',Input::old('name'),array('class' => $errors->has('name') ? 'error' : '')) }}
	{{ $errors->first('name', '<small class="error">:message</small>') }}
	</p>

	{{-- Permissions --}}
	<p>
	@foreach ($permissions as $permission)
	<label>
		<input type="hidden" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="0" />
		<input type="checkbox" id="permissions[{{{ $permission['id'] }}}]" name="permissions[{{{ $permission['id'] }}}]" value="1"{{{ (isset($permission['checked']) && $permission['checked'] == true ? ' checked="checked"' : '')}}} />
		{{{ $permission['display_name'] }}}
	</label>
	@endforeach
	</p>

	{{-- Actions --}}
    <p>
	{{ Form::submit('تحديث',array('class'=> 'button small')) }}
	<a href="{{{ URL::to('admin/roles') }}}" class="button small secondary">الغاء</a>
	</p>

{{ Form::close() }}
{{-- ./ Form for New Role --}}

@stop
