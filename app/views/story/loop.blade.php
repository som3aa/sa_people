@foreach ($stories as $story)
<div class="post">
	<!-- Story Content -->
	<div class="row">
		<div class="large-4 columns">
			<a href="{{{ $story->url() }}}" class="th radius">{{ HTML::image($story->image,$story->title) }}</a>
		</div>
		<div class="large-8 columns">

			<div class="row">
				<div class="large-8 columns">
					<h4><strong><a href="{{{ $story->url() }}}">{{ $story->title }}</a></strong></h4>
				</div>
				<div class="large-4 columns top_meta">
					<span class='date'>{{{ $story->date() }}}</span>
					<span class='comments'><a href="{{{ $story->url() }}}#comments">{{$story->comments()->count()}}
					{{ \Illuminate\Support\Pluralizer::plural('Comment', $story->comments()->count()) }}</a></span>
				</div>
			</div>

			<p class="meta">
                في {{ link_to('category/'.$story->category->slug,$story->category->name) }} ,
                مساهمة {{ link_to('/user/profile/'.$story->user->username,$story->user->profile->name) }}
			</p>

			<p>
				{{ Str::limit($story->content, 120) }}
			</p>

			<a class="button small" href="{{{ $story->url() }}}">اقراء المزيد</a>
		</div>
	</div>
	<!-- ./ Story Content -->
</div>

@endforeach

{{ $stories->links() }}