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
		$stories = $this->story->whereStatus('1')->orderBy('created_at', 'DESC')->paginate(10);

		// Show the page
		return View::make('site/story/index', compact('stories'));
	}

	public function getSearch() 
	{
		// Get the Keyword
		$keyword = Input::get('keyword');

		// Get the stories
		$stories = $this->story->whereStatus('1')->where('title', 'LIKE', '%'.$keyword.'%')->paginate(10);

		// Show the page
		return View::make('site/story/search', compact('stories','keyword'));
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
		$stories = $category->story()->whereStatus('1')->paginate(10);

		// Show the page
		return View::make('site/story/category', compact('category','stories'));
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

		// Get this story comments
		$comments = $story->comments()->orderBy('created_at', 'ASC')->get();

        // Get current user and check permission
        $user = $this->user->currentUser();
        $canComment = false;
        if(!empty($user)) {
            $canComment = $user->can('post_comment');
        }

		// Show the page
		return View::make('site/story/view_story', compact('story', 'comments', 'canComment'));
	}

	/**
	 * View a story.
	 *
	 * @param  string  $slug
	 * @return Redirect
	 */
	public function postView($slug)
	{

        $user = $this->user->currentUser();
        $canComment = $user->can('post_comment');
		if ( ! $canComment)
		{
			return Redirect::to($slug . '#comments')->with('error', 'You need to be logged in to post comments!');
		}

		// Get this story data
		$story = $this->story->where('slug', '=', $slug)->first();

		// Declare the rules for the form validation
		$rules = array(
			'comment' => 'required|min:3'
		);

		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);

		// Check if the form validates with success
		if ($validator->passes())
		{
			// Save the comment
			$comment = new Comment;
			$comment->user_id = Auth::user()->id;
			$comment->content = Input::get('comment');

			// Was the comment saved with success?
			if($story->comments()->save($comment))
			{
				// Redirect to this story page
				return Redirect::to($slug . '#comments')->with('success', 'Your comment was added with success.');
			}

			// Redirect to this story page
			return Redirect::to($slug . '#comments')->with('error', 'There was a problem adding your comment, please try again.');
		}

		// Redirect to this story page
		return Redirect::to($slug)->withInput()->withErrors($validator);
	}

}
