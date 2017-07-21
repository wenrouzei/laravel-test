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
// use Illuminate\Support\Facades\Cache;

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

//Route::get('HelloWorld', 'HelloWorldController@index');
Route::get('HelloWorld', ['uses'=>'HelloWorldController@index']);//通过uses建立数组等价上面路由
Route::get('HelloWorld', ['uses'=>'HelloWorldController@index', 'as'=>'helpMe']);//通过uses建立数组等价上面路由 加多路由别名 给route函数使用 route("helpMe");

Auth::routes();

Route::get('welcome', function(){
	return view('welcome');
});

Route::get('home', 'HomeController@index');

/**
 * 测试生成动态数据库连接
 */
Route::get('pdo', 'PdoController@index');


######################前端文章测试操作########################################
Route::get('/', 'ArticleController@index');
Route::get('article/{id}', 'ArticleController@show')->name('articleId')->where('id','[0-9]+');//name方法也可设置路由别名
Route::get('articleDbTest', function() {
	//测试路由的闭合函数直接操作数据库 TODO测试DB可无需载入命名空间门面？
    $article = DB::select("select * from articles where id<?",[4]);
    dd($article);
});

Route::get('article/query', 'ArticleController@query')->name('articlequery');// name方法也可设置路由别名
Route::get('article/orm', 'ArticleController@orm')->name('articleorm');// name方法也可设置路由别名
Route::any('article/upload', 'ArticleController@upload')->name('articleupload');// name方法也可设置路由别名
Route::get('article/cache', 'ArticleController@cache')->name('articlecache');// name方法也可设置路由别名
Route::get('article/queue', 'ArticleController@queue')->name('articlequeue');// name方法也可设置路由别名

//test request请求
Route::get('article/request', 'ArticleController@request')->name('articlerequest');// name方法也可设置路由别名

//test session
Route::get('article/session', 'ArticleController@session')->name('articlesession');// name方法也可设置路由别名

//test response
Route::get('article/response', 'ArticleController@response')->name('articleresponse');// name方法也可设置路由别名


##############################################################################

Route::post('comment', 'CommentController@store');

Route::get('captcha', 'CaptchaController@index');
Route::get('getCaptcha', 'CaptchaController@getCaptcha');

Route::get('now', function() {
    return date('Y-m-d H:i:s');
})->middleware('CheckAge');

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    // Route::get('/article', 'ArticleController@index');
    Route::resource('article', 'ArticleController');
});

// Route::get('profile', function() {
//     // Only authenticated users may enter...
// })->middleware('auth.basic');

include "test.php";