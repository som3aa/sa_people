@extends('layouts.story')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $story->title }}}
@stop

{{-- SEO - General Meta --}}
@section('meta_data')
  <link href="{{{ $story->url() }}}" rel="canonical" />
  <meta name="description" content="{{{ strip_tags($story->meta_description) }}}" />
  <meta property="og:image" content="{{{ URL::to($story->image) }}}" />
  <meta property="og:title" content="{{{ $story->meta_title }}}" />
  <meta property="og:description" content="{{{ strip_tags($story->meta_description) }}}" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="{{{ $story->url() }}}" />
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs', Breadcrumbs::render('story',$story))

{{-- Content --}}
@section('content')
<div class="post" itemscope itemtype="http://schema.org/Person">

  <!-- Story header -->
  <div class="row">
    <div class="large-7 columns">
      <h4 itemprop="name">{{ $story->title }}</h4>
  		<p class="meta">
  	    في {{ link_to('category/'.$story->category->slug,$story->category->name) }} ,
        مساهمة {{ link_to('/user/profile/'.$story->user->username,$story->user->profile->name) }}
  		</p>
    </div>
    <div class="large-3 columns">
      @if( !Auth::check() )
        <a style="margin-top:15px" href="{{{ URL::to('account/stories/create') }}}" class="button small">اكتب عن شخصية</a>
      @endif
    </div>
  </div>

	<!-- Story image -->
  <div class="row">
    <div class="large-8 small-centered columns">
      <div class="th radius" style="margin-bottom:30px;">
        {{ HTML::image($story->image,$story->title,array('itemprop'=>'image')) }}
      </div>
    </div>
  </div>

	<!-- Story content -->
  <div class="row">
    <div class="large-12 columns">
      <p>{{ $story->content }}</p>

      <!-- facebook shear butoon -->
      <div class="fb-share-button" data-href="{{{ $story->url() }}}" data-type="box_count"></div>
    </div>
  </div>

  <br/><br/>

  <!-- Story Comments -->
  <a id="comments"></a>
  <h4>{{{ $comments->count() }}} تعليق</h4>

  {{-- View Comments --}}
  @foreach ($comments as $comment)
  <div class="row comment">
    <div class="large-2 columns">
      @if (!empty($comment->user->profile->avatar))
        <a href="{{ $comment->user->url() }}">{{ HTML::image($comment->user->profile->avatar,$comment->user->profile->name,array('class'=>'th')) }}</a>
      @else
        {{ HTML::image('img/avatar.jpg','',array('class'=>'th')) }}
      @endif
    </div>
    <div class="large-10 columns">
      <div class="meta">
        <span class="username">{{ link_to($comment->user->url(),$comment->user->profile->name) }}</span>
        <span class="date">{{{ $comment->date() }}}</span>
      </div>
      <p class="content">{{ $comment->content() }}</p>
    </div>
  </div>
  @endforeach

  {{-- Post Comment --}}
  @if (!Auth::check())
    اذا اردت ان تضيف تعليق يجب عليك تسجيل الدخول اولا<br /><br />
    اضغط <a href="{{{ URL::to('user/login') }}}">هنا</a> لتسجيل الدخول.
  @elseif (!$canComment )
    ليس لديك صلاحيات لاضاف تعليق هنا
  @else

  <h4>اضف تعليقك</h4>

  <div class="row comment">
    <div class="large-2 columns">
      @if (!empty(Auth::user()->profile->avatar))
        {{ HTML::image(Auth::user()->profile->avatar,Auth::user()->profile->name,array('class'=>'th')) }}
      @else
        {{ HTML::image('img/avatar.jpg','',array('class'=>'th')) }}
      @endif 
    </div>
    <div class="large-10 columns">
      <form  method="post" action="{{{ URL::to($story->slug) }}}">
        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}" />

        <p>
        {{ Form::textarea('comment',Input::old('comment'),array('class' => $errors->has('comment') ? 'error' : '','id'=>'comment')) }}
        {{ $errors->first('comment', '<small class="error">:message</small>') }}
        </p>
        
        <input type="submit" id="submit" value="ارسال" class="button small secondary" />
      </form>
    </div>
  </div>


  @endif

</div>

@stop

@section('javascripts')

<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=363335887072007";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

@stop