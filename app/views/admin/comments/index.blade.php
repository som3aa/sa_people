@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

@section('co-active') class="active" @stop

{{-- Content --}}
@section('content')

<h3>{{{ $title }}}</h3>

<table>
  <thead>
    <tr>
      <th class="large-4">{{{ Lang::get('admin/comments/table.title') }}}</th>
      <td class="large-2">{{{ Lang::get('admin/stories/table.title') }}}</td>
      <td class="large-2">{{{ Lang::get('admin/users/table.username') }}}</td>
      <td class="large-2">{{{ Lang::get('admin/comments/table.created_at') }}}</td>
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
