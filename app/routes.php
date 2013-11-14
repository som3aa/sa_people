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

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
	# Blog Management
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