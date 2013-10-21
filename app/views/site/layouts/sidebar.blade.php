@if( !Auth::check() )
<section>

	<p>{{{ Lang::get('site.sidebar.join_call') }}}</p>
	<div class="get_in">
		<a href="/../join-us" class="button small">{{{ Lang::get('site.sidebar.join_now') }}}</a>
	</div>

</section>
@endif