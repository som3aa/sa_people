<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Entrust\HasRole;
use Zizaco\Confide\Confide;
use Zizaco\Confide\ConfideEloquentRepository;
use Carbon\Carbon;

class User extends ConfideUser {
	use HasRole; // Add this trait to your user model

    /**
     * Get the URL to the post.
     *
     * @return string
     */
    public function url()
    {
        return URL::to('user/profile/'.$this->username);
    }

    /**
     * profile relationship
     */
    public function profile()
    {
        return $this->hasOne('Profile');
    }

	/**
	 * story relationship
	 */
	public function stories()
	{
	    return $this->hasMany('Story');
	}

    /**
     * conversation relationship
     */
    public function conversations()
    {
        return $this->belongsToMany('Conversation');
    }

    /**
     * delete related profile & roles with the user
     * 
     */
    public function delete()
    {
        //Delete related profile 
        $this->profile->delete();

        //Delete all related roles
        $this->detachRoles($this->roles);

        //Delete all related stories 
        foreach($this->stories as $story)
        {
            $story->delete();
        }

        // delete the user
        return parent::delete();
    }

	/**
     * Save roles inputted from multiselect
     * @param $inputRoles
     */
    public function saveRoles($inputRoles)
    {
        if(! empty($inputRoles)) {
            $this->roles()->sync($inputRoles);
        } else {
            $this->roles()->detach();
        }
    }

    /**
     * Returns user's current role ids only.
     * @return array|bool
     */
    public function currentRoleIds()
    {
        $roles = $this->roles;
        $roleIds = false;
        if( !empty( $roles ) ) {
            $roleIds = array();
            foreach( $roles as &$role )
            {
                $roleIds[] = $role->id;
            }
        }
        return $roleIds;
    }

    /**
     * Get user by username & the current user
     * @param $username
     * @return mixed
     */
    public function getUserByUsername( $username )
    {
        return $this->where('username', '=', $username)->first();
    }
    public function currentUser()
    {
        return (new Confide(new ConfideEloquentRepository()))->user();
    }

    /**
     * Redirect after auth.
     * If ifValid is set to true it will redirect a logged in user.
     * @param $redirect
     * @param bool $ifValid
     * @return mixed
     */
    public static function checkAuthAndRedirect($redirect, $ifValid=false)
    {
        // Get the user information
        $user = Auth::user();
        $redirectTo = false;

        if(empty($user->id) && ! $ifValid) // Not logged in redirect, set session.
        {
            Session::put('loginRedirect', $redirect);
            $redirectTo = Redirect::to('user/login')->with( 'notice', 'يجب عليك تسجيل الدخول اولا' );
        }
        elseif(!empty($user->id) && $ifValid) // Valid user, we want to redirect.
        {
            $redirectTo = Redirect::to($redirect);
        }

        return array($user, $redirectTo);
    }

    /**
     * Get the date the post was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

    /**
     * Returns the date of the blog post creation,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function created_at()
    {
        return $this->date($this->created_at);
    }

    /**
     * Returns the date of the blog post last update,
     * on a good and more readable format :)
     *
     * @return string
     */
    public function updated_at()
    {
        return $this->date($this->updated_at);
    }  

}