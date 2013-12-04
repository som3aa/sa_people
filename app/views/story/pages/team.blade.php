@extends('layouts.story')

{{-- Web site Title --}}
@section('title')
@parent - 
فريق العمل
@stop

{{-- SEO - General Meta --}}
@section('meta_data')
  <link href="{{{ Config::get('app.url') }}}/team" rel="canonical" />
  <meta name="description" content="اذا كان لديك اي اقتراح او فكرة او شكوى او اذا اردت انا تدعمنا لنواصل في العطاء او اذا اردت ان ترحب بنا فقط ، سنكون سعيدين جدا بالرد عليك في اقرب فرصة، شكرا لك" />
  <meta property="og:image" content="{{{ Config::get('app.url').'/img/sudactive-logo.jpg' }}}" />
  <meta property="og:title" content="سوداكتف - فريق العمل" />
  <meta property="og:description" content="اذا كان لديك اي اقتراح او فكرة او شكوى او اذا اردت انا تدعمنا لنواصل في العطاء او اذا اردت ان ترحب بنا فقط ، سنكون سعيدين جدا بالرد عليك في اقرب فرصة، شكرا لك" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{{ Config::get('app.url') }}}/team" />
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs', Breadcrumbs::render('page','فريق العمل'))

{{-- Content --}}
@section('content')

  <div class="post">

    <h3>فريق العمل :</h3>

    <br />

    <div class="row">
      <div class="large-3 columns">
        <?php $mr2all = User::whereUsername('mr2all')->first();  ?>

        @if (!empty($mr2all->profile->avatar))
          {{ HTML::image($mr2all->profile->avatar,$mr2all->profile->name,array('class'=>'th')) }}
        @else
          {{ HTML::image('img/avatar.jpg','',array('class'=>'th')) }}
        @endif 
      </div>
      <div class="large-9 columns">
        <h3>محمد عادل عبد الله</h3>
        <p>المؤسس والمدير التنفيذي</p>
        <p style="margin-top:40px;color:#bbb"> {{{ $mr2all->email }}}</p>
      </div>
    </div>

    <br />

    <div class="row">
      <div class="large-3 columns">
        <?php $esmail = User::whereUsername('esmail-qurashe')->first();  ?>

        @if (!empty($esmail->profile->avatar))
          {{ HTML::image($esmail->profile->avatar,$esmail->profile->name,array('class'=>'th')) }}
        @else
          {{ HTML::image('img/avatar.jpg','',array('class'=>'th')) }}
        @endif 
      </div>
      <div class="large-9 columns">
        <h3>إسماعيل القرشي إسماعيل </h3>
        <p>شريك مساعد</p>
        <p style="margin-top:40px;color:#bbb"> {{{ @$esmail->email }}}</p>
      </div>
    </div>

    <br />

    <div class="row">
      <div class="large-3 columns">
        <?php $tota = User::whereUsername('tota-brido-9')->first();  ?>

        @if (!empty($tota->profile->avatar))
          {{ HTML::image($tota->profile->avatar,$tota->profile->name,array('class'=>'th')) }}
        @else
          {{ HTML::image('img/avatar.jpg','',array('class'=>'th')) }}
        @endif 
      </div>
      <div class="large-9 columns">
        <h3>تقوى بريدو</h3>
        <p>محررة ومراجعة</p>
        <p style="margin-top:-20px;color:#bbb"> {{{ @$tota->email }}}</p>
      </div>
    </div>

    <br />

    <div class="row">
      <div class="large-3 columns">
        <?php $asaadalsayer = User::whereUsername('asaadalsayer')->first();  ?>

        @if (!empty($asaadalsayer->profile->avatar))
          {{ HTML::image($asaadalsayer->profile->avatar,$asaadalsayer->profile->name,array('class'=>'th')) }}
        @else
          {{ HTML::image('img/avatar.jpg','',array('class'=>'th')) }}
        @endif 
      </div>
      <div class="large-9 columns">
        <h3>أسعد بابكر الساير</h3>
        <p>محرر ومراجع</p>
        <p style="margin-top:40px;color:#bbb"> {{{ @$asaadalsayer->email }}}</p>
      </div>
    </div>

    <br />

    <h3>كتاب الموقع :</h3>

    <br />
    
    <div class="row">
      <?php $users = User::has('stories', '>=', 1)->get(); ?>
      @foreach($users as $user)
        <div class="writer"><a href="{{{ $user->url() }}}">
          @if (!empty($user->profile->avatar))
            {{ HTML::image($user->profile->avatar,$user->profile->name,array('class'=>'th')) }}
          @else
            {{ HTML::image('img/avatar.jpg','',array('class'=>'th')) }}
          @endif 
        </a></div>
      @endforeach
    </div>

  </div>
@stop
