@if ($message = Session::get('success'))
<div class="alert-box success">
	<a href="" class="close">&times;</a>
    @if(is_array($message))
        @foreach ($message as $m)
            {{ $m }}
        @endforeach
    @else
        {{ $message }}
    @endif
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert-box alert">
	<a href="" class="close">&times;</a>
    @if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}<br />
    @endforeach
    @else
    {{ $message }}
    @endif
</div>
@endif
