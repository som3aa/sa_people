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

{{-- Tabes --}}
@section('tabes')
  <ul class="tabes">
    <li class="active"><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
    @if(Auth::user()->username == $user->username)
    <li class=""><a href="/../account/profile">تعديل بروفايلي</a></li>
    <li class=""><a href="/../account/stories">ادارة المقالات</a></li>
    <li class=""><a href="/../account/user">اعدادات الحساب</a></li>
    @endif
  </ul>
@stop

{{-- Sidebar --}}
@section('sidebar')
  <!-- categories list -->
  <section>
    {{-- Avatar --}}
    <div class="th radius">
      @if (!empty($user->profile->avatar))
        {{ HTML::image($user->profile->avatar,$user->profile->name) }}
      @else
        {{ HTML::image('img/avatar.jpg') }}
      @endif
    </div>
  </section>
@stop

{{-- Content --}}
@section('content')

    {{-- Profile Sections --}}
    <p>
      <h3>{{ $user->profile->name}}</h3>
      <h6 style="margin-top:-15px;"> {{ $user->username }}@</h6>
    </p>
    <p>{{ $user->profile->bio }}</p>

    <hr />

    {{-- Stories Sections --}}
    <h5>من كتاباته :</h5>
    @if(count($stories) > 0)
      @foreach ($stories as $story)
      <!-- Story Content -->
      <div class="row">
        <div class="large-2 columns">
          <a href="{{{ $story->url() }}}" class="th radius">{{ HTML::image($story->image,$story->title) }}</a>
        </div>
        <div class="large-10 columns">
          <strong><a href="{{{ $story->url() }}}">{{ $story->title }}</a></strong>
          <p class="meta">
              في {{ link_to('category/'.$story->category->slug,$story->category->name) }} ,
              مساهمة {{ link_to('/user/profile/'.$story->user->username,$story->user->profile->name) }}
          </p>
        </div>
      </div>
      <!-- ./ Story Content -->
      <br/>
      @endforeach

      {{ $stories->links() }}

    @else
    <!-- Post Content -->
    <div class="row">
        <div class="large-12 columns">
            <p>لا توجد شخصيات مضافة حاليا.</p>
        </div>
    </div>

    @endif

@stop

