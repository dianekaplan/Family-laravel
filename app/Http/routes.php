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
//Route::get('home', 'HomeController@home');
Route::get('home', ['middleware' => 'auth', 'uses' => 'HomeController@home']);

Route::resource('people', 'PeopleController');
Route::resource('families', 'FamilyController');
Route::resource('users', 'UserController');

Route::get('updates/pending', ['middleware' => 'super', 'uses' => 'UpdateController@pending']);
//Route::get('updates/pending', 'UpdateController@pending');
Route::resource('updates', 'UpdateController');

Route::get('tags/{tags}', 'TagsController@show');


////name the route so you can refer to it later and not have to hard code a url$router
//ex: http://family.app/updates/user/1
//Route::get('updates/user/test',function(){return 'user updates'; }); //is found
Route::get('updates/user/{$user}',function(){return 'user updates'; }); //NotFoundHttpException in RouteCollection.php line 143:
//Route::get('updates/user/{$user}',['as' =>'user_updates', 'uses'=> 'UpdateController@user_updates'] );

//$router->bind('people', function($id)
////Route::bind('song', function($slug) //original value
//{
//    return App\Person::whereId($id)->first();
//});

Route::controllers ([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//Route::get('foo', ['middleware' => 'super', function()
//{
//    return 'this page may only be viewed by super users';
//}]);