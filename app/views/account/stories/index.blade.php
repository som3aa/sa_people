@extends('layouts.account')

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
  
<h4>{{{ $title }}}</h4>

<a href="{{{ URL::to('account/stories/create') }}}" class="button small secondary">اضافة</a>
  
<table>
  <thead>
    <tr>
      <th class="large-5">{{{ Lang::get('admin/stories/table.title') }}}</th>
      <td class="large-2">{{{ Lang::get('admin/stories/table.category') }}}</td>
      <td class="large-3">اوامر</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($stories as $story)
    <tr>
      <td>@if (!$story->status) {{ '[قيد المراجعة]' }} @endif {{{ $story->title }}}</td>
      <td>{{{ $story->category->name }}}</td>
      <td>
        <a href="{{{ URL::to('account/stories/'.$story->id.'/show') }}}" class="button small secondary" style="margin:0">عرض</a> 
        <a href="{{{ URL::to('account/stories/'.$story->id.'/edit') }}}" class="button small secondary" style="margin:0">تعديل</a> 
        <a href="{{{ URL::to('account/stories/'.$story->id.'/delete') }}}"  class="button small" style="margin:0">حذف</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@stop