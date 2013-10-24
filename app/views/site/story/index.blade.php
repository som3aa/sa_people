@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ Lang::get('site.title') }}}
@stop

{{-- Content --}}
@section('content')

	{{--include the stories loop --}}
	@include('site.story.loop')

@stop