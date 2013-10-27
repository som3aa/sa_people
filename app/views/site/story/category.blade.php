@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ $category->name }}}
@stop

{{-- SEO - General Meta --}}
@section('meta_data')
  <link href="{{{ $category->url() }}}" rel="canonical" />
  <meta name="description" content="موقع شخصيات هو جزء من شبكة سوداكتف، لتوثيق الشخصيات السودانية البارزة في المجتمع" />
  <meta property="og:image" content="{{{ Config::get('app.url').'/img/sudactive-logo.jpg' }}}" />
  <meta property="og:title" content="سوداكتف - {{{$category->name}}}" />
  <meta name="description" content="موقع شخصيات هو جزء من شبكة سوداكتف، لتوثيق الشخصيات السودانية البارزة في المجتمع" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{{ $category->url() }}}" />
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs', Breadcrumbs::render('category',$category))

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