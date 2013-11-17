@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $title }}}
@stop

@section('u-active') class="active" @stop

{{-- Content --}}
@section('content')

<h3>{{{ $title }}}</h3>

<a href="{{{ URL::to('admin/users/create') }}}" class="button small secondary">اضافة</a>
  
<table>
  <thead>
    <tr>
      <th class="large-2">{{{ Lang::get('admin/users/table.username') }}}</th>
      <td class="large-2">{{{ Lang::get('admin/users/table.email') }}}</td>
      <td class="large-2">{{{ Lang::get('admin/users/table.roles') }}}</td>
      <td class="large-2">{{{ Lang::get('admin/users/table.activated') }}}</td>
      <td class="large-2">{{{ Lang::get('admin/users/table.created_at') }}}</td>
      <td class="large-2">اوامر</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{{ $user->username.' - '.$user->profile->name }}}</td>
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