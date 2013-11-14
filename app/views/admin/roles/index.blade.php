@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

{{-- Content --}}
@section('content')

<h3>{{{ $title }}}</h3>

<a href="{{{ URL::to('admin/stories/create') }}}" class="button small secondary">اضافة</a>
  
<table>
  <thead>
    <tr>
      <th class="large-4">{{{ Lang::get('admin/stories/table.title') }}}</th>
      <td class="large-2">{{{ Lang::get('admin/stories/table.category') }}}</td>
      <td class="large-2">{{{ Lang::get('admin/stories/table.user') }}}</td>
      <td class="large-2">{{{ Lang::get('admin/stories/table.created_at') }}}</td>
      <td class="large-2">اوامر</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($stories as $story)
    <tr>
      <td>{{ link_to($story->slug,$story->title) }}</td>
      <td>{{{ $story->category->name }}}</td>
      <td>{{{ $story->user->username }}}</td>
      <td>{{{ $story->created_at }}}</td>
      <td>
        <a href="{{{ URL::to('admin/stories/'.$story->id.'/edit') }}}" class="button small secondary" style="margin:0">تعديل</a> 
        <a href="{{{ URL::to('admin/stories/'.$story->id.'/delete') }}}"  class="button small" style="margin:0">حذف</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@stop