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
Route::post('user/{user}/edit', 'UserController@postEdit')
    ->where('user', '[0-9]+');

# User Account Routes ::
Route::post('user/login', 'UserController@postLogin');

# User RESTful Routes (Login, Logout, Register, etc)
Route::controller('user', 'UserController');