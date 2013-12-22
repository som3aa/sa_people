@extends('site.layout')

{{-- Web site Title --}}
@section('title')
@parent - 
اتصل بنا
@stop

{{-- SEO - General Meta --}}
@section('meta_data')
  <link href="{{{ Config::get('app.url') }}}/contact" rel="canonical" />
  <meta name="description" content="اذا كان لديك اي اقتراح او فكرة او شكوى او اذا اردت انا تدعمنا لنواصل في العطاء او اذا اردت ان ترحب بنا فقط ، سنكون سعيدين جدا بالرد عليك في اقرب فرصة، شكرا لك" />
  <meta property="og:image" content="{{{ Config::get('app.url').'/img/sudactive-logo.jpg' }}}" />
  <meta property="og:title" content="سوداكتف - اتصل بنا" />
  <meta property="og:description" content="اذا كان لديك اي اقتراح او فكرة او شكوى او اذا اردت انا تدعمنا لنواصل في العطاء او اذا اردت ان ترحب بنا فقط ، سنكون سعيدين جدا بالرد عليك في اقرب فرصة، شكرا لك" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{{ Config::get('app.url') }}}/contact" />
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs', Breadcrumbs::render('page','اتصل بنا'))

{{-- Content --}}
@section('content')

  <div class="post">

    @if (  $errors->first() )
      <div class="alert-box alert">
      @foreach ( $errors->all() as $error)
      {{{ $error }}}<br/> 
      @endforeach
      <a href="" class="close">&times;</a></div>
    @endif

    @if ( Session::get('success') )
      <div class="alert-box success">{{{ Session::get('success') }}} <a href="" class="close">&times;</a></div>
    @endif

    <h3>اتصل بنا</h3>
    <p>
      اذا كان لديك اي اقتراح او فكرة او شكوى او اذا اردت انا تدعمنا لنواصل في العطاء او اذا اردت ان ترحب بنا فقط ، سنكون سعيدين جدا بالرد عليك في اقرب فرصة، شكرا
      لك
    </p>

    {{ Form::open() }}

      <p>{{ Form::label('name', 'الاسم') }}
      {{ Form::text('name') }}</p>

      <p>{{ Form::label('email', 'البريد الالكتروني') }}
      {{ Form::text('email') }}</p>

      <p>{{ Form::label('text', 'الرسالة') }}
      {{ Form::textarea('text') }}</p>

      <p>{{ Form::submit('ارسال',array('class'=>'button')) }}</p>

    {{ Form::close() }}

  </div><!-- end content here -->

@stop
