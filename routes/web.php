<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('HelloWorld', 'HelloWorldController@index');
Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('/', 'ArticleController@index');
Route::get('article/{id}', 'ArticleController@show');

Route::post('comment', 'CommentController@store');

Route::get('captcha', 'CaptchaController@index');
Route::get('getCaptcha', 'CaptchaController@getCaptcha');

Route::get('now', function() {
    return date('Y-m-d H:i:s');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    // Route::get('/article', 'ArticleController@index');
    Route::resource('article', 'ArticleController');
});