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
  <li class="active"><a href="/../admin/stories">الشخصيات</a></li>
  <li class=""><a href="/../admin/categories">التصنيفات</a></li>
  <li class=""><a href="/../admin/comments">التعليقات</a></li>
  <li class=""><a href="/../admin/users">الاعضاء</a></li>
  <li class=""><a href="/../admin/roles">الصلاحيات</a></li>
</ul>

<h4>{{{ $title }}}</h4>

<a href="{{{ URL::to('admin/stories/create') }}}" class="button small secondary">اضافة</a>
  
<table>
  <thead>
    <tr>
      <th class="large-4">اسم الشخصية</th>
      <td class="large-2">التصنيف</td>
      <td class="large-2">مساهمة</td>
      <td class="large-2">اضيفت في</td>
      <td class="large-2">اوامر</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($stories as $story)
    <tr>
      <td>@if (!$story->status) {{ '!' }} @endif {{ link_to($story->slug,$story->title) }}</td>
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