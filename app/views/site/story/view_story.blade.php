@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $story->title }}}
@stop

{{-- Content --}}
@section('content')
<div class="post">
  <!-- Story header -->
  <div class="row">
    <div class="large-12 columns">
      <h4>{{ $story->title }}</h4>
  		<p class="meta">
  	    في <a href="#">علماء</a> ,
  	    مساهمة <a href="#">محمد عادل</a> ,
  	    (Sept 16th, 2012)
  		</p>
    </div>
  </div>
  <!-- ./ Story header -->

	<!-- Story image -->
  <div class="row">
    <div class="large-8 small-centered columns">
      <div class="th radius" style="margin-bottom:30px;">
        {{ HTML::image('http://sudactive.com/uploads/2013-10/vk9E.jpg') }}
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