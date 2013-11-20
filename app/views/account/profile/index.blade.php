@extends('layouts.account')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ 'تعديل البروفايل' }}}
@stop

{{-- Content --}}
@section('content')

  {{-- Tabes --}}
  <ul class="tabes">
    <li class=""><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
    <li class="active"><a href="/../account/profile">تعديل بروفايلي</a></li>
    <li class=""><a href="/../account/stories">ادارة المقالات</a></li>
    <li class=""><a href="/../account/user">اعدادات الحساب</a></li>
  </ul>

  <h4>تعديل بروفايلي :</h4>

  <a href="/../account/profile/avatar/" class="button small secondary">تغير صورة البروفايل</a>

  {{-- Form for New User --}}
  {{ Form::model($profile,array('action' => array('AccountProfileController@postEdit',$profile->id))) }}
      
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
      </p>

  {{ Form::close() }}
  {{-- ./ Form for New User --}}

@stop