@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $story->title }}}
@stop

{{-- SEO - General Meta --}}
@section('meta_data')
  <link href="{{{ $story->url() }}}" rel="canonical" />
  <meta name="description" content="{{{ $story->meta_description }}}" />
  <meta property="og:image" content="{{{ $story->image }}}" />
  <meta property="og:title" content="{{{ $story->meta_title }}}" />
  <meta property="og:description" content="{{{ $story->meta_description }}}" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="{{{ $story->url() }}}" />
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs', Breadcrumbs::render('story',$story))

{{-- Content --}}
@section('content')
<div class="post" itemscope itemtype="http://schema.org/Person">
  <!-- Story header -->
  <div class="row">
    <div class="large-12 columns">
      <h4 itemprop="name">{{ $story->title }}</h4>
  		<p class="meta">
  	    في <a href="/../c/{{{$story->category->slug}}}" itemprop="jobTitle">{{{ $story->category->name }}}</a> ,
  	    مساهمة <a href="#">{{{ $story->user->username }}}</a>
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
</div>

@stop