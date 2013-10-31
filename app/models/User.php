<?php

use Zizaco\Confide\ConfideUser;

class User extends ConfideUser {

	/**
	 * story relationship
	 */
	public function story()
	{
	    return $this->hasMany('Story');
	}
}