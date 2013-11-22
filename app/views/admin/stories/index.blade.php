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
  @if (Entrust::can('manage_stories'))<li class="active"><a href="/../admin/stories">الشخصيات</a></li>@endif
  @if (Entrust::can('manage_categories'))<li class=""><a href="/../admin/categories">التصنيفات</a></li>@endif
  @if (Entrust::can('manage_comments'))<li class=""><a href="/../admin/comments">التعليقات</a></li>@endif
  @if (Entrust::can('manage_users'))<li class=""><a href="/../admin/users">الاعضاء</a></li>@endif
  @if (Entrust::can('manage_roles'))<li class=""><a href="/../admin/roles">الصلاحيات</a></li>@endif
</ul>

<h4>{{{ $title }}}</h4>

<a href="{{{ URL::to('admin/stories/create') }}}" class="button small secondary">اضافة</a>
  
<table>
  <thead>
    <tr>
      <th class="large-4">اسم الشخصية</th>
      <th class="large-2">التصنيف</th>
      <th class="large-2">مساهمة</th>
      <th class="large-2">اضيفت في</th>
      <th class="large-2">اوامر</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($stories as $story)
    <tr>
      <td>@if (!$story->status) {{ '!' }} @endif {{ link_to('admin/stories/'.$story->id.'/show',$story->title) }}</td>
      <td>{{{ $story->category->name }}}</td>
      <td>{{{ $story->user->profile->name }}}</td>
      <td>{{{ $story->date() }}}</td>
      <td>
        <a href="{{{ URL::to('admin/stories/'.$story->id.'/edit') }}}" class="button small secondary" style="margin:0">تعديل</a> 
        <a href="{{{ URL::to('admin/stories/'.$story->id.'/delete') }}}"  class="button small" style="margin:0">حذف</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@stop