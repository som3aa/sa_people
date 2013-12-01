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
  @if (Entrust::can('manage_profiles'))<li class="active"><a href="/../admin/profiles">البروفايلات</a></li>@endif
  @if (Entrust::can('manage_roles'))<li class=""><a href="/../admin/roles">الصلاحيات</a></li>@endif
</ul>

<h4>{{{ $title }}}</h4>
  
<table>
  <thead>
    <tr>
      <th class="large-2">اسم المستخدم</th>
      <td class="large-2">الجنس</td>
      <td class="large-2">تاريخ الميلاد</td>
      <td class="large-4">الصورة الشخصية</td>
      <td class="large-2">اوامر</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($profiles as $profile)
    <tr>
      <td>{{ link_to('user/profile/'.$profile->user->username,$profile->name) }}</td>
      <td>{{{ ($profile->gender == 1)? 'ذكر' : 'انثى'  }}}</td>
      <td>{{{ $profile->birthday }}} </td>
      <td>{{{ $profile->avatar }}} </td>
      <td>
        <a href="{{{ URL::to('admin/profiles/'.$profile->id.'/edit') }}}" class="button tiny secondary" style="margin:0">تعديل</a> 
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@stop