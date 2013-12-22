<?php

class Story extends Eloquent {

	/**
	 * Returns a formatted post content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->content);
	}

	/**
	 * Get the URL to the post.
	 *
	 * @return string
	 */
	public function url()
	{
		return URL::to($this->slug);
	}

	/**
	 * category relationship
	 */
	public function category()
	{
	    return $this->BelongsTo('Category');
	}
	
	/**
	 * User relationship
	 */
	public function user()
	{
	    return $this->BelongsTo('User');
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

	/**
	 * Upload story image
	 *
	 * @return string
	 */
	public function upload($image=null) {
		//upload data
		$destinationPath = 'uploads/'.date('Y-m').'/';
		$extension =$image->getClientOriginalExtension(); //if you need extension of the file
		$filename = str_random(4).'.'.$extension;

		//upload now!
		$uploadSuccess = $image->move($destinationPath, $filename);

		//success message
		if($uploadSuccess) {
			return $destinationPath.$filename;
	    } else {
	    	// Redirect to the story create page
            return Redirect::to('admin/stories/create')->with('error', Lang::get('admin/stories/messages.create.error'));
	    }
	}

	/**
	 * delete all assosiated comments & files
	 * 
	 */
	public function delete()
    {
        //Delete attached image
        File::delete($this->image);

        // delete the user
        return parent::delete();
    }
}