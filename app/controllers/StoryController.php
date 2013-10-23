<?php

class StoryController extends BaseController {

    /**
     * Story Model
     * @var Story
     */
    protected $story;

    /**
     * Inject the models.
     * @param Story $story
     */
    public function __construct(Story $story)
    {
        parent::__construct();

        $this->story = $story;
    }
    
	/**
	 * Returns all the stories.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Get all the stories
		$stories = $this->story->orderBy('created_at', 'DESC')->paginate(10);

		// Show the page
		return View::make('site/story/index', compact('stories'));
	}

	/**
	 * View a story.
	 *
	 * @param  string  $slug
	 * @return View
	 * @throws NotFoundHttpException
	 */
	public function getView($slug)
	{
		// Get this story data
		$story = $this->story->where('slug', '=', $slug)->first();

		// Check if the story exists
		if (is_null($story))
		{
			// If we ended up in here, it means that
			// a page or a story didn't exist.
			// So, this means that it is time for
			// 404 error page.
			return App::abort(404);
		}

		// Show the page
		return View::make('site/story/view_story', compact('story'));
	}

}
