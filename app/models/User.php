<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Entrust\HasRole;
use Zizaco\Confide\Confide;
use Zizaco\Confide\ConfideEloquentRepository;
use Carbon\Carbon;

class User extends ConfideUser {
	use HasRole; // Add this trait to your user model

	/**
	 * story relationship
	 */
	public function story()
	{
	    return $this->hasMany('Story');
	}

    /**
     * profile relationship
     */
    public function profile()
    {
        return $this->hasOne('Profile');
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

        // delete the user
        return parent::delete();
    }

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
     * Get the date the user was created.
     *
     * @return string
     */
    public function joined()
    {
        return String::date(Carbon::createFromFormat('Y-n-j G:i:s', $this->created_at));
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
     * Get user by username
     * @param $username
     * @return mixed
     */
    public function getUserByUsername( $username )
    {
        return $this->where('username', '=', $username)->first();
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
    
    public function currentUser()
    {
        return (new Confide(new ConfideEloquentRepository()))->user();
    }

}