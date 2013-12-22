<?php

class Category extends Eloquent {

	/**
	 * Get the URL to the category.
	 *
	 * @return string
	 */
	public function url()
	{
		return URL::to('category/'.$this->slug);
	}

	/**
	 * story relationship
	 */
	public function story()
	{
	    return $this->hasMany('Story');
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

}