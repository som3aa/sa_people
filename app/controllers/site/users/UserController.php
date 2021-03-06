<?php

class UserController extends BaseController {

    /**
     * profile Model
     * @var Story
     */
    protected $profile;

    /**
     * profile Model
     * @var Story
     */
    protected $user;

    /**
     * Role Model
     * @var Role
     */
    protected $role;


    /**
     * Inject the models.
     * @param User $user
     * @param Profile $profile
     */
    public function __construct(User $user, Profile $profile,Role $role)
    {
        parent::__construct();
        $this->user = $user;
        $this->profile = $profile;
        $this->role = $role;
    }

    /**
     * Displays the form for user creation
     *
     */
    public function getCreate()
    {
        $user = Auth::user();
        if(!empty($user->id)){
            return Redirect::to('/');
        }

        return View::make('site.users.create');
    }

    /**
     * Stores new user
     *
     */
    public function postIndex()
    {
        
        // Declare the rules for the form validation
        $rules = array(
            'username' => 'required|alpha_dash|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|between:4,11|confirmed',
            'password_confirmation' => 'between:4,11',
            'name'   => 'required',
            'location' => 'required',
            'gender'  => 'required',
            'policy'  => 'accepted'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes())
        {   
            $this->user->username = Input::get( 'username' );
            $this->user->email = Input::get( 'email' );

            $password = Input::get( 'password' );
            $passwordConfirmation = Input::get( 'password_confirmation' );

            if(!empty($password)) {
                if($password === $passwordConfirmation) {
                    $this->user->password = $password;
                    // The password confirmation will be removed from model
                    // before saving. This field will be used in Ardent's
                    // auto validation.
                    $this->user->password_confirmation = $passwordConfirmation;
                } else {
                    // Redirect to the new user page
                    return Redirect::to('user/create')
                        ->withInput(Input::except('password','password_confirmation'))
                        ->with('error', Lang::get('admin/users/messages.password_does_not_match'));
                }
            } else {
                unset($this->user->password);
                unset($this->user->password_confirmation);
            }

            // check birthday
            if(Input::get('year') == '2014') {
                // Redirect to the new user page
                return Redirect::to('user/create')
                    ->withInput(Input::except('password','password_confirmation'))
                    ->with('error', Lang::get('user.correct_birthday'));
            }

            // Save if valid. Password field will be hashed before save
            $this->user->save();

            // setup the profile for the user
            $this->profile->name = Input::get( 'name' );
            $this->profile->location = Input::get( 'location' );
            $this->profile->bio = Input::get( 'bio' );
            $this->profile->birthday = new DateTime(Input::get('day').'-'.Input::get('month').'-'.Input::get('year'));
            $this->profile->gender = Input::get( 'gender' );
            $this->profile->user_id = $this->user->id ;

            // Was the profile created?
            $this->profile->save();

            // attach subscriber Role
            $subscriberRole = $this->role->where('name','=','subscriber')->first();
            $this->user->attachRole($subscriberRole);

            // Redirect with success message, You may replace "Lang::get(..." for your custom message.
            return Redirect::to('user/login')
                ->with( 'success', Lang::get('user.account_created') );
        }

        // Form validation failed
        return Redirect::to('user/create')->withInput(Input::except('password'))->withErrors($validator);

    }

    /**
     * Displays the login form
     *
     */
    public function getLogin()
    {
        $user = Auth::user();
        if(!empty($user->id)){
            return Redirect::to('/');
        }

        return View::make('site.users.login');
    }

    /**
     * Attempt to do login
     *
     */
    public function postLogin()
    {
        $input = array(
            'email'    => Input::get( 'email' ), // May be the username too
            'username' => Input::get( 'email' ), // May be the username too
            'password' => Input::get( 'password' ),
            'remember' => Input::get( 'remember' ),
        );

        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        // Check that the user is confirmed.
        if ( Confide::logAttempt( $input, true ) )
        {
            $r = Session::get('loginRedirect');
            if (!empty($r))
            {
                Session::forget('loginRedirect');
                return Redirect::to($r);
            }
            return Redirect::to('/');
        }
        else
        {
            // Check if there was too many login attempts
            if ( Confide::isThrottled( $input ) ) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ( $this->user->checkUserExists( $input ) && ! $this->user->isConfirmed( $input ) ) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::to('user/login')
                ->withInput(Input::except('password'))
                ->with( 'error', $err_msg );
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string  $code
     */
    public function getConfirm( $code )
    {
        if ( Confide::confirm( $code ) )
        {
            return Redirect::to('user/login')
                ->with( 'success', Lang::get('confide::confide.alerts.confirmation') );
        }
        else
        {
            return Redirect::to('user/login')
                ->with( 'error', Lang::get('confide::confide.alerts.wrong_confirmation') );
        }
    }

    /**
     * Displays the forgot password form
     *
     */
    public function getForgot()
    {
        return View::make('site.users.forgot');
    }

    /**
     * Attempt to reset password with given email
     *
     */
    public function postForgot()
    {
        if( Confide::forgotPassword( Input::get( 'email' ) ) )
        {
            return Redirect::to('user/login')
                ->with( 'success', Lang::get('confide::confide.alerts.password_forgot') );
        }
        else
        {
            return Redirect::to('user/forgot')
                ->withInput()
                ->with( 'error', Lang::get('confide::confide.alerts.wrong_password_forgot') );
        }
    }

    /**
     * Shows the change password form with the given token
     *
     */
    public function getReset( $token )
    {

        return View::make('site.users.reset')
            ->with('token',$token);
    }


    /**
     * Attempt change password of the user
     *
     */
    public function postReset()
    {
        $input = array(
            'token'=>Input::get( 'token' ),
            'password'=>Input::get( 'password' ),
            'password_confirmation'=>Input::get( 'password_confirmation' ),
        );

        // By passing an array with the token, password and confirmation
        if( Confide::resetPassword( $input ) )
        {
            return Redirect::to('user/login')
            ->with( 'success', Lang::get('confide::confide.alerts.password_reset') );
        }
        else
        {
            return Redirect::to('user/reset/'.$input['token'])
                ->withInput()
                ->with( 'error', Lang::get('confide::confide.alerts.wrong_password_reset') );
        }
    }

    /**
     * Log the user out of the application.
     *
     */
    public function getLogout()
    {
        Confide::logout();

        return Redirect::to('/');
    }

   /**
     * Get user's profile
     * @param $username
     * @return mixed
     */
    public function getProfile($username)
    {
        $userModel = new User;
        $user = $userModel->getUserByUsername($username);

        // Check if the user exists
        if (is_null($user))
        {
            return App::abort(404);
        }

        // Gram user stories
        $stories = $user->stories()->whereStatus('1')->paginate(10);

        return View::make('site.users.profile', compact('user','stories'));
    }


   /**
     * register by Facebook
     * 
     * @return mixed
     */
    public function getFb() {
        $facebook = new Facebook(Config::get('facebook'));
        $params = array(
            'redirect_uri' => url('/user/fbcallback'),
            'scope' => 'email,user_birthday,user_location',
            'display' => 'popup'
        );
        return Redirect::to($facebook->getLoginUrl($params));
    }


   /**
     * Get user's profile
     * @param $username
     * @return mixed
     */
    public function getFbcallback() {
      $code = Input::get('code');
        if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');
     
        $facebook = new Facebook(Config::get('facebook'));
        $uid = $facebook->getUser();
     
        if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');
     
        $me = $facebook->api('/me');
        
        $profile = Profile::whereUid($uid)->first();
        if (empty($profile)) {

            //create user info
            $this->user->username = empty($me['username']) ? $me['id'] : String::slug($me['username']); 
            $this->user->email = $me['email'];
            $password = str_random(8) ;
            $this->user->password = $password;
            $this->user->password_confirmation = $password;
            $this->user->confirmed = 1 ;
            
            $this->user->save();
            
            // create there related profile
            $profile = new Profile();
            $profile->uid = $uid;
            $profile->name = empty($me['name']) ? '' : $me['name'];
            $profile->location = empty($me['location']['name']) ? '' : $me['location']['name'];
            $profile->birthday = empty($me['birthday']) ? '' : new DateTime($me['birthday']);
            $profile->gender =  empty($me['gender']) ? '' : ($me['gender'] == 'male') ? 1  : 2 ;
            $profile->avatar = empty($me['username']) ? '' : 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';
            $profile->bio = empty($me['bio']) ? '' : $me['bio']; 

            $profile = $this->user->profile()->save($profile);

            // attach subscriber Role
            $subscriberRole = $this->role->where('name','=','subscriber')->first();
            $this->user->attachRole($subscriberRole);

        }
     
        $profile->access_token = $facebook->getAccessToken();
        $profile->save();
     
        $user = $profile->user;
     
        Auth::login($user);
     
        return '<script type="text/javascript">
                    opener.location.reload();
                    window.close();
                </script>';
    }

}
