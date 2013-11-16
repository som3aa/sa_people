@extends('site.layouts.account')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ $user->profile->name }}}
@stop

{{-- SEO - General Meta --}}
@section('meta_data')
  <link href="{{{ URL::to('u/'.$user->username) }}}" rel="canonical" />
  <meta name="description" content="{{{ $user->profile->bio }}}" />
  <meta property="og:image" content="{{{ $user->profile->avatar }}}" />
  <meta property="og:title" content="سوداكتف - {{{$user->profile->name}}}" />
  <meta name="description" content="{{{ $user->profile->bio }}}" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{{ URL::to('u/'.$user->username) }}}" />
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs', Breadcrumbs::render('profile',$user))

{{-- Content --}}
@section('content')

    {{-- Profile Sections --}}
    <div class="post">
    <div class="row">
        <div class="large-4 columns">
          {{-- Avatar --}}
          <div class="th radius">
            @if (!empty($user->profile->avatar))
              {{ HTML::image($user->profile->avatar,$user->profile->name) }}
            @else
              {{ HTML::image('img/avatar.jpg') }}
            @endif
          </div>
        </div>

        {{-- Profile Details --}}
        <div class="large-8 columns">
          <p>
            <h3>{{ $user->profile->name}}</h3>
            <h6 style="margin-top:-15px;"> {{ $user->username }}@</h6>
          </p>
          <p>{{ $user->profile->bio }}</p>
        </div>
    </div>
    </div>

    {{-- Stories Sections --}}
    <h4>من كتاباته :</h4>
    @if(count($stories) > 0)
    {{--include the stories loop --}}
    @include('site.story.loop')

    @else
    <!-- Post Content -->
    <div class="post">
        <div class="row">
            <div class="large-12 columns">
                <p>لا توجد شخصيات مضافة حاليا.</p>
            </div>
        </div>
    </div>

    @endif

@stop

