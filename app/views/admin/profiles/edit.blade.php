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

{{-- Form for New User --}}
{{ Form::model($profile,array('action' => array('AdminProfilesController@postEdit',$profile->id))) }}
  
  {{-- name --}}
  <p>
  {{ Form::label('name', 'الاسم') }}
  {{ Form::text('name',Input::old('name'),array('class' => $errors->has('name') ? 'error' : '')) }}
  {{ $errors->first('name', '<small class="error">:message</small>') }}
  </p>

  {{-- location --}}
  <p>
  {{ Form::label('location', 'المكان') }}
  {{ Form::text('location',Input::old('location'),array('class' => $errors->has('location') ? 'error' : '')) }}
  {{ $errors->first('location', '<small class="error">:message</small>') }}
  </p>

  {{-- Gender --}}
  <p>
  {{ Form::label('gender_label', 'الجنس') }}
  <span><input style="display:inline" type="radio" name="gender" value="1" id="male" 
        @if($profile->gender == 1) checked @endif>
        <label style="display:inline" for="male" >ذكر</label></span>
   <span><input style="display:inline; margin-right:10px;" type="radio" name="gender" value="2" id="female"
        @if($profile->gender == 2) checked @endif>
        <label style="display:inline" for="female">انثى</label></span>
  {{ $errors->first('gender', '<small class="error">:message</small>') }}
  </p>

  {{-- BirthDay --}}
  <p>
  {{ Form::label('BirthDay', 'تاريخ الميلاد') }}
    <?php $date = new DateTime($profile->birthday); ?>
   {{ Form::selectRange('day', 1, 31,$date->format('d'),array('class'=>'birthday')) }}
   {{ Form::selectMonth('month',$date->format('m'),array('class'=>'birthday')); }}
   {{ Form::selectRange('year', 2014,1920,$date->format('Y'),array('class'=>'birthday')) }}
  </p>

  <br/>
  {{-- Bio --}}
  <p>
  {{ Form::label('bio', 'عن نفسك') }}
  {{ Form::textarea('bio',Input::old('bio'),array('class' => $errors->has('bio') ? 'error' : '')) }}
  {{ $errors->first('bio', '<small class="error">:message</small>') }}
  </p>

  {{-- Actions --}}
  <p>
  {{ Form::submit('تحديث',array('class'=> 'button small')) }}
  <a href="{{{ URL::to('admin/profiles') }}}" class="button small secondary">الغاء</a>
  </p>

{{ Form::close() }}
{{-- ./ Form for New User --}}

@stop

