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


# stories - Second to last set, match slug
Route::get('{storySlug}', 'StoryController@getView');

# Index Page - Last route, no matches
Route::get('/','StoryController@getIndex');

# categories
Route::get('/c/{categorySlug}', 'StoryController@getCategory');

# Search stories
Route::post('/','StoryController@getSearch');