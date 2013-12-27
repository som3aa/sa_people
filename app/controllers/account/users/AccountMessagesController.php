<?php

class AccountMessagesController extends BaseController {


    /**
     * conversation Model
     * @var conversation
     */
    protected $conversation;

    /**
     * message Model
     * @var message
     */
    protected $message;

    /**
     * Inject the models.
     * @param conversation $conversation
     */
    public function __construct(Conversation $conversation, Message $message)
    {
        parent::__construct();
        $this->conversation = $conversation;
        $this->message = $message;
    }

    /**
     * Show a list of all the user conversations.
     *
     * @return View
     */
    public function getIndex()
    {
        // Grab all the conversation
        $conversations = Auth::user()->conversations()->orderBy('created_at', 'DESC')->get();

        // Show the page
        return View::make('account/users/messages/index', compact('conversations'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        // Show the page
        return View::make('account/users/messages/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
        // Declare the rules for the form validation
        $rules = array(
            'to'   => 'required|exists:users,username',
            'supject' => 'required',
            'text' => 'required'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $this->conversation->supject = Input::get('supject');

            // attach users to coversations & save
            User::whereUsername(Input::get('to'))->first()->conversations()->save($this->conversation);
            Auth::user()->conversations()->save($this->conversation);

            // create the messages
            $this->message->user_id =Auth::user()->id;
            $this->message->text = Input::get('text');

            // Was the conversation created?
            if ($this->conversation->messages()->save($this->message))
            {
                // Redirect to the new conversation page
                return Redirect::to('account/messages')->with('success', Lang::get('تم ارسال الرسالة بنجاح'));
            }

            // Redirect to the conversation create page
            return Redirect::to('account/messages/create')->with('error', Lang::get('حدث خطأ ما اثناء الارسار حاول مرة اخرى'));
        }

        // Form validation failed
        return Redirect::to('account/messages/create')->withInput()->withErrors($validator);
	}


    /**
     * Show specified resource.
     *
     * @param $conversation
     * @return Response
     */
    public function getShow($conversation)
    {
        // check if the user in the conversation 
        if (is_null($conversation->users()->whereUser_id(Auth::user()->id)))
        {
            return App::abort(404);
        }

        // update last_conversation_view datetime
        $conversation->users->find(Auth::user()->id)->pivot->conversation_last_view = new DateTime  ;
        $conversation->users->find(Auth::user()->id)->pivot->save();

        // Grab all the messages
        $messages = $conversation->messages()->orderBy('created_at', 'DESC')->get();

        // Show the page
        return View::make('account/users/messages/show', compact('conversation','messages'));
    }

    
    /**
     * Post from Show specified resource.
     *
     * @param $conversation
     * @return Response
     */
    public function postShow($conversation)
    {
        // Declare the rules for the form validation
        $rules = array(
            'text' => 'required'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // create the messages
            $this->message->user_id =Auth::user()->id;
            $this->message->text = Input::get('text');

            // Was the conversation created?
            if ($conversation->messages()->save($this->message))
            {
                // Redirect to the new conversation page
                return Redirect::to('account/messages/'.$conversation->id.'/show')->with('success', Lang::get('تم ارسال الرسالة بنجاح'));
            }

            // Redirect to the conversation create page
            return Redirect::to('account/messages/'.$conversation->id.'/show')->with('error', Lang::get('حدث خطأ ما اثناء الارسار حاول مرة اخرى'));
        }

        // Form validation failed
        return Redirect::to('account/messages/'.$conversation->id.'/show')->withInput()->withErrors($validator);
    }

}