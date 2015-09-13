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
//
//Route::get('/', function () {
//    return view('welcome');

Route::get('/', 'HomeController@index');
Route::get('contact', 'HomeController@contact');
Route::get('home', 'HomeController@home');

Route::resource('people', 'PeopleController');
Route::resource('users', 'UserController');
Route::get('updates/pending', 'UpdateController@pending');
Route::resource('updates', 'UpdateController');

//$router->bind('people', function($id)
////Route::bind('song', function($slug) //original value
//{
//    return App\Person::whereId($id)->first();
//});

Route::controllers ([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
