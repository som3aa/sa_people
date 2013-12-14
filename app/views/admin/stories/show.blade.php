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
  @if (Entrust::can('manage_stories'))<li class="active"><a href="/../admin/stories">الشخصيات</a></li>@endif
  @if (Entrust::can('manage_categories'))<li class=""><a href="/../admin/categories">التصنيفات</a></li>@endif
  @if (Entrust::can('manage_users'))<li class=""><a href="/../admin/users">الاعضاء</a></li>@endif
  @if (Entrust::can('manage_roles'))<li class=""><a href="/../admin/roles">الصلاحيات</a></li>@endif
</ul>

<a href="{{{ URL::to('admin/stories/') }}}" class="button small secondary">رجوع</a>

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