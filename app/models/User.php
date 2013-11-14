<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Entrust\HasRole;

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

}