<?php

class Profile extends Eloquent {

	/**
	 * user relationship
	 */
	public function user()
	{
	    return $this->belongsTo('User');
	}

}