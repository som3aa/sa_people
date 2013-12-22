@extends('site.layout')

{{-- Web site Title --}}
@section('title')
@parent - نتائج بحث 
{{{ $keyword }}}
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs', Breadcrumbs::render('search', $keyword))

{{-- Content --}}
@section('content')

@if(count($stories) > 0)
	{{--include the stories loop --}}
	@include('site.stories.loop')

@else
	<!-- Post Content -->
	<div class="post">
		<div class="row">
			<div class="large-12 columns">
				<h4>لا توجد نتائج لما بحثت</h4>
				<p>حاول مرة اخرى باسم مختلف</p>
			</div>
		</div>
	</div>
@endif

@stop