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
  @if (Entrust::can('manage_categories'))<li class=""><a href="/../admin/categories">التصنيفات</a></li>@endif
  @if (Entrust::can('manage_users'))<li class=""><a href="/../admin/users">الاعضاء</a></li>@endif
  @if (Entrust::can('manage_roles'))<li class="active"><a href="/../admin/roles">الصلاحيات</a></li>@endif
</ul>

<h4>{{{ $title }}}</h4>

    {{-- Delete Blog Form --}}
    <form method="post" action="" autocomplete="off">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $role->id }}" />
        <!-- ./ csrf token -->
        <p>هل انت متاكد من حذف الصلاحية : {{{ $role->name }}}</p>
        <!-- Form Actions -->
        <p>
            {{ Form::submit('حذف',array('class'=> 'button small')) }}
            <a href="{{{ URL::to('admin/roles') }}}" class="button small secondary">الغاء</a>
        </p>
        <!-- ./ form actions -->
    </form>
@stop
