<?php

class Category extends Eloquent {

	/**
	 * story relationship
	 */
	public function story()
	{
	    return $this->hasMany('Story');
	}

}