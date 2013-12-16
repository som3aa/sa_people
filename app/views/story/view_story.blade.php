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
    <div class="large-6 columns">
      <h4 itemprop="name">{{ $story->title }}</h4>
  		<p class="meta">
  	    في {{ link_to('category/'.$story->category->slug,$story->category->name) }} ,
        مساهمة {{ link_to('/user/profile/'.$story->user->username,$story->user->profile->name) }}
  		</p>
    </div>
    <div class="large-4 columns">
      @if( !Auth::check() )
        <a style="margin-top:15px" href="{{{ URL::to('account/stories/create') }}}" class="button small left">اكتب عن شخصية</a>
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

        <script type="text/javascript">
        //<![CDATA[
          (function() {
            var shr = document.createElement('script');
            shr.setAttribute('data-cfasync', 'false');
            shr.src = '//dsms0mj1bbhn4.cloudfront.net/assets/pub/shareaholic.js';
            shr.type = 'text/javascript'; shr.async = 'true';
            shr.onload = shr.onreadystatechange = function() {
              var rs = this.readyState;
              if (rs && rs != 'complete' && rs != 'loaded') return;
              var apikey = '708056eb066583bcfbe34b19e7db936f';
              try { Shareaholic.init(apikey); } catch (e) {}
            };
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(shr, s);
          })();
        //]]>
        </script>
        <div class='shareaholic-canvas' data-app='share_buttons' data-app-id='4635255'></div>

    </div>
  </div>

  <br/><br/>

  {{-- Disqus Comments --}}
  <div id="disqus_thread"></div>
      <script type="text/javascript">
          /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
          var disqus_shortname = 'sudactive'; // required: replace example with your forum shortname

          /* * * DON'T EDIT BELOW THIS LINE * * */
          (function() {
              var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
              dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
              (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
          })();
      </script>
      <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
      <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
  </div>

@stop