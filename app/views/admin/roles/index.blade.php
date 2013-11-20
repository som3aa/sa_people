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
  <li class=""><a href="/../admin/comments">التعليقات</a></li>
  <li class=""><a href="/../admin/users">الاعضاء</a></li>
  <li class="active"><a href="/../admin/roles">الصلاحيات</a></li>
</ul>

<h4>{{{ $title }}}</h4>

<a href="{{{ URL::to('admin/roles/create') }}}" class="button small secondary">اضافة</a>
  
<table>
  <thead>
    <tr>
      <th class="large-2">{{{ Lang::get('admin/roles/table.name') }}}</th>
      <td class="large-4">{{{ Lang::get('admin/roles/table.users') }}}</td>
      <td class="large-2">{{{ Lang::get('admin/roles/table.created_at') }}}</td>
      <td class="large-2">اوامر</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($roles as $role)
    <tr>
      <td>{{{ $role->name }}}</td>
      <td>{{{ DB::table('assigned_roles')->where('role_id','=', $role->id)->count()  }}}</td>
      <td>{{{ $role->created_at }}}</td>
      <td>
        <a href="{{{ URL::to('admin/roles/'.$role->id.'/edit') }}}" class="button small secondary" style="margin:0">تعديل</a> 
        <a href="{{{ URL::to('admin/roles/'.$role->id.'/delete') }}}"  class="button small" style="margin:0">حذف</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@stop