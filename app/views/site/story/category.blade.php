@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ $category->name }}}
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
			<h4>عذرا لا توجد محتويات في هذا التصنيف</h4>
			<p>الموقع متجدد بصورة دورية , تابعنا باستمرار</p>
		</div>
	</div>
</div>

@endif

@stop