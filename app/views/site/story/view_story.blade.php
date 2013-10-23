@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $story->title }}} ::
@parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')
@parent

@stop

{{-- Update the Meta Description --}}
@section('meta_description')
@parent

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
@parent

@stop

{{-- Content --}}
@section('content')
<div class="post">
	<h3>{{ $story->title }}</h3>

	<p>{{ Str::limit($story->content, 200) }}</p>
</div>

@stop