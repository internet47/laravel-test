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
// Event::listen('illuminate.query', function( $query ) {
// 	echo '<div class="alert alert-info"><h2>'.$query.'</h2></div>';
// });


Event::listen('users.show', function($user)
{
	var_dump($user->toArray());
});


 Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);


Route::get('/users', 'UserController@index');
Route::get('/users/show/{id}', 'UserController@show');
//Route::get('/users/view', 'UserController@view');

Route::post('users/getprofile', 'UserController@getprofile');

Route::get('/posts', 'PostController@index');
//Route::post('/posts/view', 'PostController@view');
Route::post('viewdata', 'PostController@viewdata');



Route::get('/cats', 'CategoryController@index');

