@foreach ($stories as $story)
<div class="post">
	<!-- Story Content -->
	<div class="row">
		<div class="large-4 columns">
			<a href="{{{ $story->url() }}}" class="th radius">{{ HTML::image($story->image,$story->title) }}</a>
		</div>
		<div class="large-8 columns">
			<h4><strong><a href="{{{ $story->url() }}}">{{ $story->title }}</a></strong></h4>
			<p class="meta">
                في {{ link_to('category/'.$story->category->slug,$story->category->name) }} ,
                مساهمة {{ link_to('/user/profile/'.$story->user->username,$story->user->profile->name) }}
			</p>
			<p>
				{{ Str::limit($story->content, 100) }}
			</p>
			<a class="button small" href="{{{ $story->url() }}}">{{{ Lang::get('site.read_more') }}}</a>
		</div>
	</div>
	<!-- ./ Story Content -->
</div>

@endforeach

{{ $stories->links() }}