<?php

class AccountStoriesController extends AccountController {

    /**
     * Inject the models.
     * @param Story $story
     */
    public function __construct()
    {
        parent::__construct();
        $this->story = Auth::user()->story();
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
        return View::make('site/account/stories/index', compact('stories', 'title'));
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
        return View::make('site/account/stories/index', compact('title'));
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
            $this->story->status           = Input::get('status') ? 1 : 0;
            $this->story->meta_title       = 'test';
            $this->story->meta_description = 'test';
            $this->story->category_id      = Input::get('category_id');
            $this->story->user_id          = $user->id;

            // Was the story created?
            if($this->story->save())
            {
                // Redirect to the new story page
                return Redirect::to('admin/stories')->with('success', Lang::get('admin/stories/messages.create.success'));
            }

            // Redirect to the story create page
            return Redirect::to('admin/stories/create')->with('error', Lang::get('admin/stories/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('admin/stories/create')->withInput()->withErrors($validator);
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
        return View::make('admin/stories/edit', compact('story', 'title'));
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
            $story->status           = Input::get('status') ? 1 : 0;
            $story->meta_title       = 'test';
            $story->meta_description = 'test';
            $story->category_id      = Input::get('category_id');
            $story->user_id          = Input::get('user_id');
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
                return Redirect::to('admin/stories')->with('success', Lang::get('admin/stories/messages.update.success'));
            }

            // Redirect to the blogs story management page
            return Redirect::to('admin/stories/' . $story->id . '/edit')->with('error', Lang::get('admin/stories/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/stories/' . $story->id . '/edit')->withInput()->withErrors($validator);
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
        return View::make('admin/stories/delete', compact('story', 'title'));
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
                return Redirect::to('admin/stories')->with('success', Lang::get('admin/stories/messages.delete.success'));
            }
        }
        // There was a problem deleting the story
        return Redirect::to('admin/stories')->with('error', Lang::get('admin/stories/messages.delete.error'));
    }

}