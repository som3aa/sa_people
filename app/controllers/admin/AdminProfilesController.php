<?php

class AdminProfilesController extends BaseController {

    
    /**
     * Profile Model
     * @var profile
     */
    protected $profile;

    /**
     * Inject the models.
     * @param profile $profile
     */
    public function __construct(profile $profile)
    {
        parent::__construct();
        $this->profile = $profile;
    }

    /**
     * Show a list of all the profiles.
     *
     * @return View
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/profiles/title.profile_management');

        // Grab all the profiles
        $profiles = $this->profile->all();

        // Show the page
        return View::make('admin/profiles/index', compact('profiles', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $profile
     * @return Response
     */
	public function getEdit($profile)
	{
        // Title
        $title = Lang::get('admin/profiles/title.profile_update');

        // Show the page
        return View::make('admin/profiles/edit', compact('profile','title'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $profile
     * @return Response
     */
	public function postEdit($profile)
	{
        // Declare the rules for the form validation
        $rules = array(
            'name'   => 'required',
            'location' => 'required'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            $profile->name = Input::get( 'name' );
            $profile->location = Input::get( 'location' );
            $profile->bio = Input::get( 'bio' );
            $profile->birthday = new DateTime(Input::get('day').'-'.Input::get('month').'-'.Input::get('year'));
            $profile->gender = Input::get( 'gender' );

            // Was the story created?
            if($profile->save())
            {
                // Redirect to the new story page
                return Redirect::to('admin/profiles')->with('success','تم التحديث بنجاح');
            }

            // Redirect to the story create page
            return Redirect::to('admin/profiles')->with('error','حدث خطأ ما الرجاء المحاولة مرة اخرى');
        }

        // Form validation failed
        return Redirect::to('admin/profiles')->withInput()->withErrors($validator);
	}

}