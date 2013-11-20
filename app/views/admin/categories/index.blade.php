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
  <li class="active"><a href="/../admin/categories">التصنيفات</a></li>
  <li class=""><a href="/../admin/comments">التعليقات</a></li>
  <li class=""><a href="/../admin/users">الاعضاء</a></li>
  <li class=""><a href="/../admin/roles">الصلاحيات</a></li>
</ul>

<h4>{{{ $title }}}</h4>

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