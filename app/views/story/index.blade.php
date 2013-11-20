@extends('layouts.story')

{{-- SEO - General Meta --}}
@section('meta_data')
    <link href="{{{ Config::get('app.url') }}}" rel="canonical" />
    <meta name="description" content="موقع شخصيات هو جزء من شبكة سوداكتف، لتوثيق الشخصيات السودانية البارزة في المجتمع" />
    <meta property="og:image" content="{{{ Config::get('app.url').'/img/sudactive-logo.jpg' }}}" />
    <meta property="og:title" content="سوداكتف - شخصيات سودانية" />
    <meta property="og:description" content="موقع شخصيات هو جزء من شبكة سوداكتف، لتوثيق الشخصيات السودانية البارزة في المجتمع" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{{ Config::get('app.url') }}}" />
@stop

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ Lang::get('site.title') }}}
@stop

{{-- Content --}}
@section('content')

	{{--include the stories loop --}}
	@include('story.loop')

@stop