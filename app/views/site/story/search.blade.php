@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent - {{{ Lang::get('site.search_result') }}} 
{{{ $keyword }}}
@stop

{{-- Content --}}
@section('content')

@if(count($stories) > 0)
{{--include the stories loop --}}
@include('site.story.loop')

@else
<!-- Post Content -->
<div class="post">
	<div class="row">
		<div class="large-12 columns">
			<h4>عذرا , لا توجد نتائج لما بحثت</h4>
			<p>حاول مرة اخرى مع مراعاة الهمزة في الاسماء</p>
		</div>
	</div>
</div>

@endif

@stop