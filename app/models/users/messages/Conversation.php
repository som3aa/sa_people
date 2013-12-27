<?php

class Conversation extends Eloquent {

	/**
	 * conversation relationship
	 */
	public function messages()
	{
	    return $this->hasMany('Message');
	}

	/**
     * users relationship
     */
    public function users()
    {
        return $this->belongsToMany('User')->withPivot('conversation_last_view');
    }

    /**
     * unread
     */
    public function unread()
    {
        $unread = 0;
        
        $conversation_last_view = $this->users->find(Auth::user()->id)->pivot->conversation_last_view ;
        $last__message_datetime = $this->messages()->orderBy('created_at', 'DESC')->first()->created_at->toDateTimeString() ;

        //check if the conversation read or not
        if (new DateTime($conversation_last_view) < new DateTime($last__message_datetime) ){
            $unread = 1;   
        }

        return $unread;
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