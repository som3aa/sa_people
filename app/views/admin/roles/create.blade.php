@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

{{-- Content --}}
@section('content')

<h3>{{{ $title }}}</h3>

{{-- Form for New Role --}}
{{ Form::open() }}
	
	{{-- Role name --}}
	<p>
	{{ Form::label('name', 'الاسم') }}
	{{ Form::text('name','',array('class' => $errors->has('name') ? 'error' : '')) }}
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
	{{ Form::submit('اضافة',array('class'=> 'button small')) }}
	<a href="{{{ URL::to('admin/roles') }}}" class="button small secondary">الغاء</a>
	</p>

{{ Form::close() }}
{{-- ./ Form for New Role --}}

@stop
