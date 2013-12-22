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
  @if (Entrust::can('manage_stories'))<li class=""><a href="/../admin/stories">الشخصيات</a></li>@endif
  @if (Entrust::can('manage_categories'))<li class="active"><a href="/../admin/categories">التصنيفات</a></li>@endif
  @if (Entrust::can('manage_users'))<li class=""><a href="/../admin/users">الاعضاء</a></li>@endif
  @if (Entrust::can('manage_roles'))<li class=""><a href="/../admin/roles">الصلاحيات</a></li>@endif
</ul>

<h4>{{{ $title }}}</h4>

<a href="{{{ URL::to('admin/categories/create') }}}" class="button small secondary">اضافة</a>
  
<table>
  <thead>
    <tr>
      <th class="large-2">الاسم</th>
      <th class="large-4">اسم صديق</th>
      <td class="large-2">ضيفت في</td>
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
        <a href="{{{ URL::to('admin/categories/'.$category->id.'/edit') }}}" class="button tiny secondary" style="margin:0">تعديل</a> 
        <a href="{{{ URL::to('admin/categories/'.$category->id.'/delete') }}}"  class="button tiny" style="margin:0">حذف</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@stop