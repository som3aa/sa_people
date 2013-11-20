@extends('layouts.account')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ $title }}}
@stop

{{-- Content --}}
@section('content')

{{-- Tabes --}}
<ul class="tabes">
  <li class=""><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
  <li class=""><a href="/../account/profile">تعديل بروفايلي</a></li>
  <li class="active"><a href="/../account/stories">ادارة المقالات</a></li>
  <li class=""><a href="/../account/user">اعدادات الحساب</a></li>
</ul>

<a href="{{{ URL::to('account/stories/') }}}" class="button small secondary">رجوع</a>

  <!-- Story header -->
  <div class="row">
    <div class="large-12 columns">
      <h4 itemprop="name">{{ $story->title }}</h4>
      <p class="meta">
        في {{ link_to('category/'.$story->category->slug,$story->category->name) }} ,
        مساهمة {{ link_to('/user/profile/'.$story->user->username,$story->user->profile->name) }}
      </p>
    </div>
  </div>
  <!-- ./ Story header -->

  <!-- Story image -->
  <div class="row">
    <div class="large-8 small-centered columns">
      <div class="th radius" style="margin-bottom:30px;">
        {{ HTML::image($story->image,$story->title,array('itemprop'=>'image')) }}
      </div>
    </div>
  </div>
  <!-- ./ Story image -->

  <!-- Story content -->
  <div class="row">
    <div class="large-12 columns">
      <p>{{ $story->content }}</p>
    </div>
  </div>
  <!-- ./ Story content -->
  

@stop