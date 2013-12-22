<?php

class StoryController extends BaseController {

    /**
     * Story Model
     * @var Story
     */
    protected $story;

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Category Model
     * @var Category
     */
    protected $category;

    /**
     * Inject the models.
     * @param Story $story
     */
    public function __construct(Story $story, category $category,User $user)
    {
        parent::__construct();

        $this->story = $story;
        $this->category = $category;
        $this->user = $user;
    }
    
	/**
	 * Returns all the stories.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Get all the stories
		$stories = $this->story->whereStatus('1')->orderBy('created_at', 'DESC')->paginate(7);

		// Show the page
		return View::make('story/index', compact('stories'));
	}

	public function getSearch() 
	{
		// Get the Keyword
		$keyword = Input::get('keyword');

		// Get the stories
		$stories = $this->story->whereStatus('1')->where('title', 'LIKE', '%'.$keyword.'%')->paginate(7);

		// Show the page
		return View::make('story/search', compact('stories','keyword'));
	}

	/**
	 * Returns specific catagroy the stories.
	 *
	 * @return View
	 */
	public function getCategory($slug)
	{
		// Get this category data
		$category = $this->category->where('slug', '=', $slug)->first();

		// Check if the category exists
		if (is_null($category))
		{
			// If we ended up in here, it means that
			// a page or a story didn't exist.
			// So, this means that it is time for
			// 404 error page.
			return App::abort(404);
		}
		// Get the stories
		$stories = $category->story()->whereStatus('1')->orderBy('created_at', 'DESC')->paginate(7);

		// Show the page
		return View::make('story/category', compact('category','stories'));
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
		$story = $this->story->whereStatus('1')->where('slug', '=', $slug)->first();

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
		return View::make('story/view_story', compact('story'));
	}

}
