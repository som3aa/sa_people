<?php

class Profile extends Eloquent {

	/**
	 * Disabling Auto Timestamps
	 * @var boolean
	 */
	public $timestamps = false;

	/**
	 * User Relationship
	 */
	public function user()
	{
	    return $this->belongsTo('User');
	}

}