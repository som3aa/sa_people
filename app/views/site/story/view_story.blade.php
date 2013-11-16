@extends('site.layouts.story')

{{-- Web site Title --}}
@section('title')
@parent -
{{{ $story->title }}}
@stop

{{-- SEO - General Meta --}}
@section('meta_data')
  <link href="{{{ $story->url() }}}" rel="canonical" />
  <meta name="description" content="{{{ $story->meta_description }}}" />
  <meta property="og:image" content="{{{ $story->image }}}" />
  <meta property="og:title" content="{{{ $story->meta_title }}}" />
  <meta property="og:description" content="{{{ $story->meta_description }}}" />
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
    <div class="large-12 columns">
      <h4 itemprop="name">{{ $story->title }}</h4>
  		<p class="meta">
  	    في {{ link_to('category/'.$story->category->slug,$story->category->name) }} ,
        مساهمة {{ link_to('/user/profile/'.$story->user->username,$story->user->profile->name) }}
  		</p>
    </div>
  </div>
  <!-- ./ Story header -->

	<!-- Story image -->
  <div class="row">
    <div class="large-8 small-centered columns">
      <div class="th radius" style="margin-bottom:30px;">
        {{ HTML::image($story->image,$story->title,array('itemprop'=>'image')) }}
      </div>
    </div>
  </div>
  <!-- ./ Story image -->

	<!-- Story content -->
  <div class="row">
    <div class="large-12 columns">
      <p>{{ $story->content }}</p>
    </div>
  </div>
  <!-- ./ Story content -->

  <br/><br/>

  <!-- Story Comments -->
  <a id="comments"></a>
  <h4>{{{ $comments->count() }}} تعليق</h4>

  @if ($comments->count())
  @foreach ($comments as $comment)
  <div class="row">
    <div class="large-2 columns">
      <img class="th" src="http://placehold.it/60x60" alt="">
    </div>
    <div class="large-10 columns">
      <div class="row">
        <div class="large-12 columns">
          <div>{{{ $comment->author->username }}}</div>
          <hr />
        </div>
        <div class="large-12 columns">
          {{{ $comment->content() }}}
        </div>
      </div>
    </div>
  </div>
  <hr />
  @endforeach
  @else
  <hr />
  @endif

  @if ( ! Auth::check())
    اذا اردت ان تضيف تعليق يجب عليك تسجيل الدخول اولا<br /><br />
    اضغط <a href="{{{ URL::to('user/login') }}}">هنا</a> لتسجيل الدخول.
  @elseif ( ! $canComment )
    You don't have the correct permissions to add comments.
  @else

    @if($errors->has())
    <div class="alert-box alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <h4>اضف تعليقك</h4>
    <form  method="post" action="{{{ URL::to($story->slug) }}}">
      <input type="hidden" name="_token" value="{{{ Session::getToken() }}}" />

      <textarea rows="4" name="comment" id="comment">{{{ Request::old('comment') }}}</textarea>

      <input type="submit" id="submit" value="ارسال" class="button small secondary" />
    </form>
  @endif

</div>

@stop