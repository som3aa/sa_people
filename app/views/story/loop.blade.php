
@foreach ($stories as $n=>$story)
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

			<a class="button tiny read_more" href="{{{ $story->url() }}}">اقراء المزيد</a>
		</div>
	</div>
	<!-- ./ Story Content -->
</div>

@if ($n == 3 && Route::getCurrentRoute()->getPath() == '/')
	{{-- Find Us on Facebook --}}
	<div class="row fb-slider">
		<div class="large-7 columns">
			<h3>تابع كل جديد من خلال صفحتنا في الفيسبوك</h3>
		</div>
		<div class="large-5 columns">
			<p><a href="http://www.facebook.com/Sudactive.network"><img src="/../img/fb.jpg"></a></p>
		</div>
	</div>
@endif

@endforeach

{{ $stories->links() }}