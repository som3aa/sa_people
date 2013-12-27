@extends('account.layout')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ $conversation->supject }}}
@stop

{{-- Content --}}
@section('content')

{{-- Tabes --}}
<ul class="tabes">
  <li class=""><a href="/../user/profile/{{ Auth::user()->username }}">بروفايلي</a></li>
  <li class=""><a href="/../account/profile">تعديل بروفايلي</a></li>
  <li class="active"><a href="/../account/messages">الرسائل الخاصة</a></li>
  <li class=""><a href="/../account/stories">ادارة المقالات</a></li>
  <li class=""><a href="/../account/user">اعدادات الحساب</a></li>
</ul>

<a href="{{{ URL::to('account/messages/') }}}" class="button tiny secondary">رجوع للرسائل الخاصة</a>

  {{-- Add message --}}
  <div class="row message">
    <div class="large-2 columns">
      @if (!empty(Auth::user()->profile->avatar))
        {{ HTML::image(Auth::user()->profile->avatar,Auth::user()->profile->name,array('class'=>'th')) }}
      @else
        {{ HTML::image('img/avatar.jpg','',array('class'=>'th')) }}
      @endif 
    </div>
    <div class="large-10 columns">
      <form  method="post" action="{{{ URL::to('account/messages/'.$conversation->id.'/show') }}}">
        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}" />

        <p>
        {{ Form::textarea('text',Input::old('text'),array('class' => $errors->has('text') ? 'error' : '','id'=>'text')) }}
        {{ $errors->first('text', '<small class="error">:text</small>') }}
        </p>
        
        <input type="submit" id="submit" value="ارسال" class="button small secondary" />
      </form>
    </div>
  </div>

  {{-- View messages --}}
  @foreach ($messages as $message)
  <div class="row message">
    <div class="large-2 columns">
      @if (!empty($message->user->profile->avatar))
        <a href="{{ $message->user->url() }}">{{ HTML::image($message->user->profile->avatar,$message->user->profile->name,array('class'=>'th')) }}</a>
      @else
        {{ HTML::image('img/avatar.jpg','',array('class'=>'th')) }}
      @endif
    </div>
    <div class="large-10 columns">
      <div class="meta">
        <span class="username">{{ link_to($message->user->url(),$message->user->profile->name) }}</span>
        <span class="date">{{{ $message->date() }}}</span>
      </div>
      <p class="content">{{ $message->text }}</p>
    </div>
  </div>
  @endforeach

@stop