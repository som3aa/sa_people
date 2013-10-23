@extends('site.layouts.default')

{{-- Content --}}
@section('content')
@foreach ($stories as $story)
<div class="post">
	<!-- story Title -->
	<div class="row">
		<div class="large-12 columns">
			<h4><strong><a href="{{{ $story->url() }}}">{{ $story->title }}</a></strong></h4>
		</div>
	</div>
	<!-- ./ story title -->

	<!-- Post Content -->
	<div class="row">
		<div class="large-4 columns">
			<a href="{{{ $story->url() }}}" class="thumbnail"><img src="http://placehold.it/300x300" alt=""></a>
		</div>
		<div class="large-8 columns">
			<p>
				{{ Str::limit($story->content, 200) }}
			</p>
			<p><a class="bottun small" href="{{{ $story->url() }}}">Read more</a></p>
		</div>
	</div>
	<!-- ./ post content -->
</div>

@endforeach

{{ $stories->links() }}

@stop