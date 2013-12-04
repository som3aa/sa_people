<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('story', 'Story');
Route::model('category', 'Category');
Route::model('user', 'User');
Route::model('role', 'Role');
Route::model('comment', 'Comment');
Route::model('profile', 'Profile');


/** ------------------------------------------
 *  Frontend Account Routes
 *  ------------------------------------------
 */

Route::group(array('prefix' => 'account', 'before' => 'account-auth'), function()
{
    # Account Edit Profile
    //:: User Account Routes ::
    Route::post('profile/{profile}/edit', 'AccountProfileController@postEdit')
        ->where('profile', '[0-9]+');
    Route::controller('profile', 'AccountProfileController');

    # Acconut Stories Managment
    Route::get('stories/{story}/show', 'AccountStoriesController@getShow')
        ->where('story', '[0-9]+');
    Route::get('stories/{story}/edit', 'AccountStoriesController@getEdit')
        ->where('story', '[0-9]+');
    Route::post('stories/{story}/edit', 'AccountStoriesController@postEdit')
        ->where('story', '[0-9]+');
    Route::get('stories/{story}/delete', 'AccountStoriesController@getDelete')
        ->where('story', '[0-9]+');
    Route::post('stories/{story}/delete', 'AccountStoriesController@postDelete')
        ->where('story', '[0-9]+');
    Route::controller('stories', 'AccountStoriesController');
    
    # Account Setting
    //:: User Account Routes ::
    Route::post('user/{user}/edit', 'AccountUserController@postEdit')
        ->where('user', '[0-9]+');
    Route::controller('user', 'AccountUserController');

});


/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
	# Stories Management
    Route::get('stories/{story}/show', 'AdminStoriesController@getShow')
        ->where('story', '[0-9]+');
    Route::get('stories/{story}/edit', 'AdminStoriesController@getEdit')
        ->where('story', '[0-9]+');
    Route::post('stories/{story}/edit', 'AdminStoriesController@postEdit')
        ->where('story', '[0-9]+');
    Route::get('stories/{story}/delete', 'AdminStoriesController@getDelete')
        ->where('story', '[0-9]+');
    Route::post('stories/{story}/delete', 'AdminStoriesController@postDelete')
        ->where('story', '[0-9]+');
    Route::controller('stories', 'AdminStoriesController');

    # Comment Management
    Route::get('comments/{comment}/edit', 'AdminCommentsController@getEdit')
        ->where('comment', '[0-9]+');
    Route::post('comments/{comment}/edit', 'AdminCommentsController@postEdit')
        ->where('comment', '[0-9]+');
    Route::get('comments/{comment}/delete', 'AdminCommentsController@getDelete')
        ->where('comment', '[0-9]+');
    Route::post('comments/{comment}/delete', 'AdminCommentsController@postDelete')
        ->where('comment', '[0-9]+');
    Route::controller('comments', 'AdminCommentsController');

    # Categories Management
    Route::get('categories/{category}/show', 'AdminCategoriesController@getShow')
        ->where('category', '[0-9]+');
    Route::get('categories/{category}/edit', 'AdminCategoriesController@getEdit')
        ->where('category', '[0-9]+');
    Route::post('categories/{category}/edit', 'AdminCategoriesController@postEdit')
        ->where('category', '[0-9]+');
    Route::get('categories/{category}/delete', 'AdminCategoriesController@getDelete')
        ->where('category', '[0-9]+');
    Route::post('categories/{category}/delete', 'AdminCategoriesController@postDelete')
        ->where('category', '[0-9]+');
    Route::controller('categories', 'AdminCategoriesController');

    # Users Management
    Route::get('users/{user}/show', 'AdminUsersController@getShow')
        ->where('user', '[0-9]+');
    Route::get('users/{user}/edit', 'AdminUsersController@getEdit')
        ->where('user', '[0-9]+');
    Route::post('users/{user}/edit', 'AdminUsersController@postEdit')
        ->where('user', '[0-9]+');
    Route::get('users/{user}/delete', 'AdminUsersController@getDelete')
        ->where('user', '[0-9]+');
    Route::post('users/{user}/delete', 'AdminUsersController@postDelete')
        ->where('user', '[0-9]+');
    Route::controller('users', 'AdminUsersController');

    # Users Management
    Route::get('profiles/{profile}/edit', 'AdminProfilesController@getEdit')
        ->where('profile', '[0-9]+');
    Route::post('profiles/{profile}/edit', 'AdminProfilesController@postEdit')
        ->where('profile', '[0-9]+');
    Route::get('profiles/{profile}/delete', 'AdminProfilesController@getDelete')
        ->where('profile', '[0-9]+');
    Route::post('profiles/{profile}/delete', 'AdminProfilesController@postDelete')
        ->where('profile', '[0-9]+');
    Route::controller('profiles', 'AdminProfilesController');

    # User Role Management
    Route::get('roles/{role}/show', 'AdminRolesController@getShow')
        ->where('role', '[0-9]+');
    Route::get('roles/{role}/edit', 'AdminRolesController@getEdit')
        ->where('role', '[0-9]+');
    Route::post('roles/{role}/edit', 'AdminRolesController@postEdit')
        ->where('role', '[0-9]+');
    Route::get('roles/{role}/delete', 'AdminRolesController@getDelete')
        ->where('role', '[0-9]+');
    Route::post('roles/{role}/delete', 'AdminRolesController@postDelete')
        ->where('role', '[0-9]+');
    Route::controller('roles', 'AdminRolesController');
});


/** ------------------------------------------
 *  Frontend User Routes
 *  ------------------------------------------
 */

# User reset routes
Route::get('user/reset/{token}', 'UserController@getReset')
    ->where('token', '[0-9a-z]+');
# User password reset
Route::post('user/reset/{token}', 'UserController@postReset')
    ->where('token', '[0-9a-z]+');

# User Account Routes ::
Route::post('user/login', 'UserController@postLogin');

# User RESTful Routes (Login, Logout, Register, etc)
Route::controller('user', 'UserController');


/** ------------------------------------------
 *  Pages Routes
 *  ------------------------------------------
 */

Route::get('/about', function(){
    return View::make('story.pages.about');
});
Route::get('/team', function(){
    return View::make('story.pages.team');
});
Route::get('/policy', function(){
    return View::make('story.pages.policy');
});
Route::get('/contact', function(){
    return View::make('story.pages.contact');
});
Route::post('/contact', function(){
    
    $rules =   array(
        'name' => 'required',
        'email' => 'required|email',
        'text' => 'required',
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
        return Redirect::to('/contact')->withErrors($validator);
    }

    Mail::send('story.pages.emails.contact', Input::all() , function($message)
    {
        $message->to('mr2all@hotmail.com', 'mohammed adil')->subject('رسالة من سوداكتف - اتصل بنا');
    });
    
    return Redirect::to('/contact')->with('success','تم ارسال الرسالة بنجاح, سيتم الرد عليك في اقرب فرصة');
});


/** ------------------------------------------
 *  Frontend Story Routes
 *  ------------------------------------------
 */

# Index Page
Route::get('/','StoryController@getIndex');

# Search stories
Route::get('/search','StoryController@getSearch');

# categories
Route::get('/category/{categorySlug}', 'StoryController@getCategory');

# stories
Route::get('{storySlug}', 'StoryController@getView');
Route::post('{storySlug}', 'StoryController@postView');
