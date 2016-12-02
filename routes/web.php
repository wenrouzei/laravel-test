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
use Illuminate\Support\Facades\Cache;

Route::get('/cache', function () {
	//return config('lee.key1');//测试获取自建配置lee.php文件里返回数组键名key1的值
    return Cache::get('Cathe');
});

Route::get('lee',function(){
	//return config('lee.key1');//返回配置数组的某个值
	return config('lee');//返回整个配置数组
});

Route::get('api/users/{user}', function (App\User $user) {
	// var_dump(Route::current());
	//return config('lee.key2');//测试获取自建配置lee.php文件里返回数组键名key2的值
    return $user->email;
});

Route::get('HelloWorld', 'HelloWorldController@index');
Auth::routes();

Route::get('welcome', function(){
	return view('welcome');
});

Route::get('home', 'HomeController@index');

Route::get('/', 'ArticleController@index');
Route::get('article/{id}', 'ArticleController@show')->name('articleId');

Route::post('comment', 'CommentController@store');

Route::get('captcha', 'CaptchaController@index');
Route::get('getCaptcha', 'CaptchaController@getCaptcha');

Route::get('now', function() {
    return date('Y-m-d H:i:s');
})->middleware('ChackAge');

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    // Route::get('/article', 'ArticleController@index');
    Route::resource('article', 'ArticleController');
});

// Route::get('profile', function() {
//     // Only authenticated users may enter...
// })->middleware('auth.basic');
