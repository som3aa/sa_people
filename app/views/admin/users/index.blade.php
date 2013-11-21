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
  <li class="active"><a href="/../admin/users">الاعضاء</a></li>
  <li class=""><a href="/../admin/roles">الصلاحيات</a></li>
</ul>

<h4>{{{ $title }}}</h4>

<a href="{{{ URL::to('admin/users/create') }}}" class="button small secondary">اضافة</a>
  
<table>
  <thead>
    <tr>
      <th class="large-2">اسم المستخدم</th>
      <td class="large-2">الايميل</td>
      <td class="large-2">الصلاحيات</td>
      <td class="large-2">مفعل</td>
      <td class="large-2">ضيفت في</td>
      <td class="large-2">اوامر</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{{ $user->username}}}</td>
      <td>{{{ $user->email }}}</td>
      <td> @foreach($user->roles as $role) {{{ $role->name }}} @endforeach</td>
      <td> @if($user->confirmed) yes @else no @endif </td>
      <td>{{{ $user->created_at }}}</td>
      <td>
        <a href="{{{ URL::to('admin/users/'.$user->id.'/edit') }}}" class="button small secondary" style="margin:0">تعديل</a> 
        <a href="{{{ URL::to('admin/users/'.$user->id.'/delete') }}}"  class="button small" style="margin:0">حذف</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@stop