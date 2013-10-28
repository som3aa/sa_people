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
 *  Admin Routes
 *  ------------------------------------------
 */

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
	# Blog Management
    Route::get('stories/{post}/show', 'AdminStoriesController@getShow')
        ->where('post', '[0-9]+');
    Route::get('stories/{post}/edit', 'AdminStoriesController@getEdit')
        ->where('post', '[0-9]+');
    Route::post('stories/{post}/edit', 'AdminStoriesController@postEdit')
        ->where('post', '[0-9]+');
    Route::get('stories/{post}/delete', 'AdminStoriesController@getDelete')
        ->where('post', '[0-9]+');
    Route::post('stories/{post}/delete', 'AdminStoriesController@postDelete')
        ->where('post', '[0-9]+');
    Route::controller('stories', 'AdminStoriesController');
    
});


/** ------------------------------------------
 *  Frontend Site Routes
 *  ------------------------------------------
 */

# Search stories
Route::get('/s','StoryController@getSearch');

# categories
Route::get('/c/{categorySlug}', 'StoryController@getCategory');

# stories - Second to last set, match slug
Route::get('{storySlug}', 'StoryController@getView');

# Index Page - Last route, no matches
Route::get('/','StoryController@getIndex');


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