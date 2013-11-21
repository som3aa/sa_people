<?php

class AccountStoriesController extends BaseController {


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
     * Show a list of all the stories.
     *
     * @return View
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/stories/title.story_management');

        // Grab all the stories
        $stories = $this->story->whereUser_id(Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        // Show the page
        return View::make('account/stories/index', compact('stories', 'title'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        // Title
        $title = Lang::get('admin/stories/title.create_a_new_story');

        // Show the page
        return View::make('account/stories/create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required',
            'content' => 'required',
            'image' => 'required|image'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Create a new story
            $user = Auth::user();
            $image = $this->story->upload(Input::file('image')) ;

            // Update the story data
            $this->story->title            = Input::get('title');
            $this->story->slug             = String::slug(Input::get('title'));
            $this->story->content          = Input::get('content');
            $this->story->image            = $image;
            $this->story->meta_title       = 'سوداكتف -'.Input::get('title');
            $this->story->meta_description = Str::limit(Input::get('content'), 200);
            $this->story->category_id      = Input::get('category_id');
            $this->story->user_id          = $user->id;

            // Was the story created?
            if($this->story->save())
            {
                // Redirect to the new story page
                return Redirect::to('account/stories')->with('success', Lang::get('admin/stories/messages.create.success'));
            }

            // Redirect to the story create page
            return Redirect::to('account/stories/create')->with('error', Lang::get('admin/stories/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('account/stories/create')->withInput()->withErrors($validator);
	}


    /**
     * Show specified resource.
     *
     * @param $story
     * @return Response
     */
    public function getShow($story)
    {
        // Title
        $title = Lang::get('account/stories/title.story_update');

        // Show the page
        return View::make('account/stories/show', compact('story', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getEdit($story)
	{
        // Title
        $title = Lang::get('admin/stories/title.story_update');

        // Show the page
        return View::make('account/stories/edit', compact('story', 'title'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $post
     * @return Response
     */
	public function postEdit($story)
	{

        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required',
            'content' => 'required',
            'image' => 'image'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the story data
            $story->title            = Input::get('title');
            $story->slug             = String::slug(Input::get('title'));
            $story->content          = Input::get('content');
            $story->meta_title       = 'سوداكتف -'.Input::get('title');
            $story->meta_description =  Str::limit(Input::get('content'), 200);
            $story->category_id      = Input::get('category_id');
            if(is_file(Input::file('image'))) {
                //upload the new image
                $image = $this->story->upload(Input::file('image')) ;
                //Delete old attached image
                File::delete($story->image);
                //attach the new image
                $story->image = $image;
            }

            // Was the story updated?
            if($story->save())
            {
                // Redirect to the new story page
                return Redirect::to('account/stories')->with('success', Lang::get('admin/stories/messages.update.success'));
            }

            // Redirect to the blogs story management page
            return Redirect::to('account/stories/' . $story->id . '/edit')->with('error', Lang::get('admin/stories/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('account/stories/' . $story->id . '/edit')->withInput()->withErrors($validator);
	}


    /**
     * Remove the specified resource from storage.
     *
     * @param $story
     * @return Response
     */
    public function getDelete($story)
    {
        // Title
        $title = Lang::get('admin/stories/title.story_delete');

        // Show the page
        return View::make('account/stories/delete', compact('story', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $story
     * @return Response
     */
    public function postDelete($story)
    {
        // Declare the rules for the form validation
        $rules = array(
            'id' => 'required|integer'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $id = $story->id;
            $story->delete();

            //Delete attached image
            File::delete($story->image);

            // Was the story deleted?
            $story = Story::find($id);
            if(empty($story))
            {
                // Redirect to the stories management page
                return Redirect::to('account/stories')->with('success', Lang::get('admin/stories/messages.delete.success'));
            }
        }
        // There was a problem deleting the story
        return Redirect::to('account/stories')->with('error', Lang::get('admin/stories/messages.delete.error'));
    }

}