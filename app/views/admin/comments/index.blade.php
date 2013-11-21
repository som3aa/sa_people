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
  <li class=""><a href="/../admin/stories">الشخصيات</a></li>
  <li class=""><a href="/../admin/categories">التصنيفات</a></li>
  <li class="active"><a href="/../admin/comments">التعليقات</a></li>
  <li class=""><a href="/../admin/users">الاعضاء</a></li>
  <li class=""><a href="/../admin/roles">الصلاحيات</a></li>
</ul>

<h4>{{{ $title }}}</h4>

<table>
  <thead>
    <tr>
      <th class="large-4">التعليق</th>
      <td class="large-2">المقال</td>
      <td class="large-2">العضو</td>
      <td class="large-2">اضيفت في</td>
      <td class="large-2">اوامر</td>
    </tr>
  </thead>
  <tbody>
  <tbody>
    @foreach ($comments as $comment)
    <tr>
      <td>{{{ Str::limit($comment->content, 40, '...') }}}</td>
      <td>{{ link_to($comment->story->slug,$comment->story->title) }}</td>
      <td>{{{ $comment->user->profile->name }}}</td>
      <td>{{{ $comment->created_at }}}</td>
      <td>
        <a href="{{{ URL::to('admin/comments/'.$comment->id.'/edit') }}}" class="button small secondary" style="margin:0">تعديل</a> 
        <a href="{{{ URL::to('admin/comments/'.$comment->id.'/delete') }}}"  class="button small" style="margin:0">حذف</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@stop
