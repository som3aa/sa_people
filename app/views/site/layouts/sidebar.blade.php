<!-- categories list -->
<section>
	<h4>التصنيفات</h4>
	<ul class="side-nav">
	@foreach(Category::all()  as $category)
		<li>{{ Link_to('/c/'.$category->slug,$category->name.' ('.$category->story()->count().')') }}</li>
	@endforeach
	</ul>
</section>
<!-- ./ categories list -->

<!-- join us call -->
@if( !Auth::check() )
<section>
	<p>{{{ Lang::get('site.sidebar.join_call') }}}</p>
	<div class="get_in">
		<a href="/../join-us" class="button small">{{{ Lang::get('site.sidebar.join_now') }}}</a>
	</div>
</section>
@endif
<!-- ./ join us call -->