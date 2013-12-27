@extends('account.layout')

{{-- Web site Title --}}
@section('title')
@parent - 
{{{ 'الرسائل الخاصة' }}}
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
  
<h4>{{{ 'الرسائل الخاصة' }}}</h4>

<a href="{{{ URL::to('account/messages/create') }}}" class="button tiny">ارسال رسالة</a>
  
@foreach ($conversations as $conversation)

  <div class="conversation @if($conversation->unread() ) {{{ 'unread' }}} @endif">
    <a href="{{{ URL::to('account/messages/'.$conversation->id.'/show') }}}">

      @if (!empty($message->user->profile->avatar))
        <a href="{{ $message->user->url() }}">{{ HTML::image($message->user->profile->avatar,$message->user->profile->name,array('class'=>'th')) }}</a>
      @else
        {{ HTML::image('img/avatar.jpg','',array('class'=>'th')) }}
      @endif
             
      <div class="cov_meta">
        <h4>{{{ $conversation->supject }}}</h4>
        <span>{{{ $conversation->date() }}}</span>

      </div>

    </a> 
  </div>

@endforeach


@stop