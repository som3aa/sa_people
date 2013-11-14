@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

{{-- Content --}}
@section('content')

<h3>{{{ $title }}}</h3>

<a href="{{{ URL::to('admin/categories/create') }}}" class="button small secondary">اضافة</a>
  
<table>
  <thead>
    <tr>
      <th class="large-2">{{{ Lang::get('admin/categories/table.name') }}}</th>
      <th class="large-4">{{{ Lang::get('admin/categories/table.slug') }}}</th>
      <td class="large-2">{{{ Lang::get('admin/categories/table.created_at') }}}</td>
      <th class="large-2">اوامر</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
    <tr>
      <td>{{{ $category->name }}}</td>
      <td>{{{ $category->slug }}}</td>
      <td>{{{ $category->created_at }}}</td>
      <td>
        <a href="{{{ URL::to('admin/categories/'.$category->id.'/edit') }}}" class="button small secondary" style="margin:0">تعديل</a> 
        <a href="{{{ URL::to('admin/categories/'.$category->id.'/delete') }}}"  class="button small" style="margin:0">حذف</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@stop