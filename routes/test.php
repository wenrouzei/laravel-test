<?php
Route::match(['get', 'post'], 'test', function() {
    return 'match route test';
});

//路由别名对route函数使用
Route::any('testany',['as'=>'me', function(){
	return route('me');
}]);

//路由参数
Route::get('user/{id?}', function($id=null) {
    return "user-id-".$id;
});

Route::get('username/{name?}', function($name=null) {
    return "user-name-".$name;
})->where('name','[A-Za-z]+');

Route::get('useridname/{id}/{name?}', function($id, $name=null) {
    return "user-id-".$id."-name-".$name;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);

//路由群组
Route::group(['prefix' => 'member'], function() {
    Route::get('users/{id}', function($id) {
        return 'member-users-id-'.$id;
    });

    Route::get('test', function() {
        return 'member-test';
    });
});

//当有路由参数时，route函数调用路由别名也要加上传递过去的路由参数
Route::get('photo/{id}', ["uses"=>'PhotoController@index', "as"=>'pt'])->where('id','[0-9]+');