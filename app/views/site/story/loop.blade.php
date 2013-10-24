@foreach ($stories as $story)
<div class="post">
	<!-- Story Content -->
	<div class="row">
		<div class="large-4 columns">
			<a href="{{{ $story->url() }}}" class="th radius">{{ HTML::image('http://sudactive.com/uploads/2013-10/vk9E.jpg') }}</a>
		</div>
		<div class="large-8 columns">
			<h4><strong><a href="{{{ $story->url() }}}">{{ $story->title }}</a></strong></h4>
			<p class="meta">
                في <a href="/../c/{{{$story->category->slug}}}">{{{ $story->category->name }}}</a> ,
                مساهمة <a href="#">محمد عادل</a>
			</p>
			<p>
				{{ Str::limit($story->content, 200) }}
			</p>
			<a class="button small" href="{{{ $story->url() }}}">{{{ Lang::get('site.read_more') }}}</a>
		</div>
	</div>
	<!-- ./ Story Content -->
</div>

@endforeach

{{ $stories->links() }}