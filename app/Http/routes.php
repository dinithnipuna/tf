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
	Route::resource('/provinces', 'ProvinceController');
	Route::resource('/districts', 'DistrictController');

	Route::post('/posts/{postId}/reply', ['uses' =>'PostController@reply', 'as' => 'posts.reply']);
	Route::post('/post/solution/{post}', ['uses' =>'PostController@solution', 'as' => 'post.solution']);
	Route::resource('/posts', 'PostController');

	Route::get('/join/{userId}', ['uses' =>'ProfileController@join', 'as' => 'friends.join']);
	Route::get('/accept/{userId}', ['uses' =>'ProfileController@accept', 'as' => 'friends.accept']);
	Route::post('/leave/{userId}', ['uses' =>'ProfileController@leave', 'as' => 'friends.leave']);

	Route::get('/posts/{postId}/like', ['uses' =>'PostController@getLike', 'as' => 'posts.like']);

	Route::get('/classes/join/{classId}', ['uses' =>'ProfileController@joinClass', 'as' => 'classes.join']);
	Route::get('/classes/leave/{classId}', ['uses' =>'ProfileController@leaveClass', 'as' => 'classes.leave']);

	Route::resource('/notebooks', 'NotebookController');
	Route::get('/notes/{notebook}/create', ['uses' =>'NoteController@createNote', 'as' => 'notes.new']);
	Route::resource('/notes', 'NoteController');

	Route::get('/markAsRead', ['uses' =>'HomeController@markAsRead', 'as' => 'markAsRead']);

	Route::resource('/assignments', 'AssignmentController');

	Route::resource('/forums', 'ForumController');

	Route::get('/topics/{forum}/create', ['uses' =>'TopicController@createTopic', 'as' => 'topics.new']);
	Route::get('/topic/post/{post}', ['uses' =>'TopicController@showTopicPost', 'as' => 'topic.post']);
	Route::resource('/topics', 'TopicController');
});

Route::auth();

Route::get('search/autocomplete', ['uses' =>'HomeController@autocomplete', 'as' => 'search.data']);

/**
* User Profile
*/
Route::get('/user/{id}', [
	'uses' => 'ProfileController@getProfile',
	'as' => 'profile'
]);

Route::get('/profile/edit', [
	'uses' => 'ProfileController@getEdit',
	'as' => 'profile.edit',
	'middleware' => ['auth'],
]);

Route::post('/profile/edit', [
	'uses' => 'ProfileController@postEdit',
	'middleware' => ['auth'],
]);

Route::get('/profile/classes', [
	'uses' => 'ProfileController@getClasses',
	'as' => 'profile.classes',
	'middleware' => ['auth'],
]);

Route::get('/profile/assignments', [
	'uses' => 'ProfileController@getAssignments',
	'as' => 'profile.assignments',
	'middleware' => ['auth'],
]);


Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
   // Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::get('/{userId}/create', ['uses' =>'MessagesController@create', 'as' => 'messages.create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::get('/{id}/load', ['as' => 'messages.load', 'uses' => 'MessagesController@load']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::get('verify/{email}/{verifyToken}', [
	'uses' => 'HomeController@getVerify',
	'as' => 'verify'
]);

Route::get('password/change/{id?}', ['uses' =>'UserController@getChange']);
Route::post('password/change', ['uses' =>'UserController@postChange', 'as' => 'users.change']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \Unisharp\Laravelfilemanager\Lfm::routes();
 });