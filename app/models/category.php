<?php

class Category extends Eloquent {

	/**
	 * disable timestamps
	 */
	public $timestamps = false;

	/**
	 * story relationship
	 */
	public function story()
	{
	    return $this->hasMany('Story');
	}

	/**
	 * Get the URL to the category.
	 *
	 * @return string
	 */
	public function url()
	{
		return URL::to('/c/'.$this->slug);
	}

}