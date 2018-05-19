<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('/signup', [ 'uses' => 'HomeController@signup', 'as' => 'signup']);

Route::group(['middleware' => 'auth'], function() { 
	Route::get('/', [ 'uses' => 'HomeController@index', 'as' => 'home']); 
	Route::resource('/admin', 'AdminController');
	Route::post('/institutes/{id}/join', ['uses' =>'InstituteController@join', 'as' => 'institutes.join']);
	Route::post('/institutes/{id}/leave', ['uses' =>'InstituteController@leave', 'as' => 'institutes.leave']);
	Route::resource('/institutes', 'InstituteController');
	Route::resource('/grades', 'GradeController');
	Route::resource('/subjects', 'SubjectController');
	Route::resource('/teachers', 'TeacherController');
	Route::resource('/classes', 'ClsController');
	Route::resource('/users', 'UserController');
	Route::resource('/roles', 'RoleController');

	Route::post('/posts/{postId}/reply', ['uses' =>'PostController@reply', 'as' => 'posts.reply']);
	Route::resource('/posts', 'PostController');

	Route::get('/join/{userId}', ['uses' =>'ProfileController@join', 'as' => 'friends.join']);
	Route::get('/accept/{userId}', ['uses' =>'ProfileController@accept', 'as' => 'friends.accept']);
	Route::post('/leave/{userId}', ['uses' =>'ProfileController@leave', 'as' => 'friends.leave']);

	Route::get('/posts/{postId}/like', ['uses' =>'PostController@getLike', 'as' => 'posts.like']);

	Route::resource('/notebooks', 'NotebookController');
	Route::get('/notes/{notebook}/create', ['uses' =>'NoteController@createNote', 'as' => 'notes.new']);
	Route::resource('/notes', 'NoteController');
});

Route::auth();

Route::get('search/autocomplete', ['uses' =>'HomeController@autocomplete', 'as' => 'search.data']);

/**
* User Profile
*/
Route::get('/profile/{id}', [
	'uses' => 'ProfileController@getProfile',
	'as' => 'profile'
]);