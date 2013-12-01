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
  @if (Entrust::can('manage_categories'))<li class=""><a href="/../admin/categories">التصنيفات</a></li>@endif
  @if (Entrust::can('manage_comments'))<li class=""><a href="/../admin/comments">التعليقات</a></li>@endif
  @if (Entrust::can('manage_users'))<li class=""><a href="/../admin/users">الاعضاء</a></li>@endif
  @if (Entrust::can('manage_profiles'))<li class=""><a href="/../admin/profiles">البروفايلات</a></li>@endif
  @if (Entrust::can('manage_roles'))<li class="active"><a href="/../admin/roles">الصلاحيات</a></li>@endif
</ul>

<h4>{{{ $title }}}</h4>

<a href="{{{ URL::to('admin/roles/create') }}}" class="button small secondary">اضافة</a>
  
<table>
  <thead>
    <tr>
      <th class="large-2">الاسم</th>
      <td class="large-4">عدد الاعضاء</td>
      <td class="large-2">اضيفت في</td>
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
        <a href="{{{ URL::to('admin/roles/'.$role->id.'/edit') }}}" class="button tiny secondary" style="margin:0">تعديل</a> 
        <a href="{{{ URL::to('admin/roles/'.$role->id.'/delete') }}}"  class="button tiny" style="margin:0">حذف</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@stop