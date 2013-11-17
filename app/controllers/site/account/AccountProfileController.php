<?php

class AccountProfileController extends AccountController {

    /**
     * Show a list of all the stories.
     *
     * @return View
     */
    public function getIndex()
    {
        $profile = Auth::user()->profile;
        // Show the page
        return View::make('site/account/profile/index', compact('profile'));
    }

    /**
     * Edits a profile
     *
     */
    public function postEdit($profile)
    {
        // Declare the rules for the form validation
        $rules = array(
            'name'   => 'required',
            'location' => 'required',
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {
            $profile->name = Input::get( 'name' );
            $profile->location = Input::get( 'location' );

            // Was the story created?
            if($profile->save())
            {
                // Redirect to the new story page
                return Redirect::to('account/profile')->with('success', Lang::get('admin/stories/messages.create.success'));
            }

            // Redirect to the story create page
            return Redirect::to('account/profile')->with('error', Lang::get('admin/stories/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('account/profile')->withInput()->withErrors($validator);
    }

}