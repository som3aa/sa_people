<?php

class AdminUsersController extends AdminController {


    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Inject the models.
     * @param user $user
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Show a list of all the users.
     *
     * @return View
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/users/title.user_management');

        // Grab all the users
        $users = $this->user->orderBy('created_at', 'DESC')->get();

        // Show the page
        return View::make('admin/users/index', compact('users', 'title'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        // Title
        $title = Lang::get('admin/users/title.create_a_new_user');

        // Show the page
        return View::make('admin/users/create', compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
        $this->user->username = Input::get( 'username' );
        $this->user->email = Input::get( 'email' );
        $this->user->password = Input::get( 'password' );

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $this->user->password_confirmation = Input::get( 'password_confirmation' );
        $this->user->confirmed = Input::get('confirmed') ? 1 : 0;

        // Permissions are currently tied to roles. Can't do this yet.
        //$user->permissions = $user->roles()->preparePermissionsForSave(Input::get( 'permissions' ));

        // Save if valid. Password field will be hashed before save
        $this->user->save();

        if ( $this->user->id )
        {
            // Save roles. Handles updating.
            //$this->user->saveRoles(Input::get( 'roles' ));

            // Redirect to the new user page
            return Redirect::to('admin/users')->with('success', Lang::get('admin/users/messages.create.success'));
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $this->user->errors()->all();

            return Redirect::to('admin/users/create')
                ->withInput(Input::except('password'))
                ->with( 'error', $error );
        }
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getEdit($user)
	{
        // Title
        $title = Lang::get('admin/users/title.user_update');

        // Show the page
        return View::make('admin/users/edit', compact('user', 'title'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $post
     * @return Response
     */
	public function postEdit($user)
	{
        // Validate the inputs
        $validator = Validator::make(Input::all(), $user->getUpdateRules());


        if ($validator->passes())
        {
            $oldUser = clone $user;
            $user->username = Input::get( 'username' );
            $user->email = Input::get( 'email' );
            $user->confirmed = Input::get('confirmed') ? 1 : 0;

            $password = Input::get( 'password' );
            $passwordConfirmation = Input::get( 'password_confirmation' );

            if(!empty($password)) {
                if($password === $passwordConfirmation) {
                    $user->password = $password;
                    // The password confirmation will be removed from model
                    // before saving. This field will be used in Ardent's
                    // auto validation.
                    $user->password_confirmation = $passwordConfirmation;
                } else {
                    // Redirect to the new user page
                    return Redirect::to('admin/users/' . $user->id . '/edit')->with('error', Lang::get('admin/users/messages.password_does_not_match'));
                }
            } else {
                unset($user->password);
                unset($user->password_confirmation);
            }

           // $user->prepareRules($oldUser, $user);

            // Save if valid. Password field will be hashed before save
            $user->amend();

            // Save roles. Handles updating.
            //$user->saveRoles(Input::get( 'roles' ));
        } else {
            return Redirect::to('admin/users/' . $user->id . '/edit')->with('error', Lang::get('admin/users/messages.update.error'));
        }

        // Get validation errors (see Ardent package)
        $error = $user->errors()->all();

        if(empty($error)) {
            // Redirect to the new user page
            return Redirect::to('admin/users/')->with('success', Lang::get('admin/users/messages.update.success'));
        } else {
            return Redirect::to('admin/users/' . $user->id . '/edit')->with('error', Lang::get('admin/users/messages.update.error'));
        }
	}


    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function getDelete($user)
    {
        // Title
        $title = Lang::get('admin/users/title.user_delete');

        // Show the page
        return View::make('admin/users/delete', compact('user', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user
     * @return Response
     */
    public function postDelete($user)
    {
        // Check if we are not trying to delete ourselves
        if ($user->id === Confide::user()->id)
        {
            // Redirect to the user management page
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.delete.impossible'));
        }

        //AssignedRoles::where('user_id', $user->id)->delete();

        $id = $user->id;
        $user->delete();

        // Was the comment post deleted?
        $user = User::find($id);
        if ( empty($user) )
        {
            // TODO needs to delete all of that user's content
            return Redirect::to('admin/users')->with('success', Lang::get('admin/users/messages.delete.success'));
        }
        else
        {
            // There was a problem deleting the user
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.delete.error'));
        }
    }

}