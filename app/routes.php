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

Route::get('/', function()
{
	return View::make('hello');
});



//http://localhost/learn-laravel/public/test
Route::get('test', function()
{
	$user = new User;

	$user->name = "Horacio";
	$user->email = "horaciaontar@gmail.com";
	$user->telephone = "351-6373389";
	$user->password = "1111!";

	$user->save();

	return "The user was saved";

});


//GET 	/users 	index 	users.index
//GET 	/users/create 	create 	users.create
//POST 	/users 	store 	users.store
//GET 	/users/{id} 	show 	users.show
//GET 	/users/{id}/edit 	edit 	users.edit
//PUT/PATCH 	/users/{id} 	update 	users.update
//DELETE 	/users/{id} 	destroy 	users.destroy
Route::resource('users', 'UsersController');

