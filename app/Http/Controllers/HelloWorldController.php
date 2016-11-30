<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class HelloWorldController extends Controller
{
    //
    public function index(){
        // var_dump(config('auth.defaults'));
        // var_dump(getenv('APP_KEY'));//获取全局环境变量
        // echo "<br>";
        // echo "<br>";
        // var_dump($_ENV);//全局环境变量 .env文件定义
    	// echo "<pre>";
    	// $articles = \App\Article::find(2);
    	// var_dump($articles);
    	$articles = Article::where('id', '>', 2)->where('id', '<', 20)->orderBy('updated_at', 'desc')->get();

    	// foreach ($articles as $article) {

    	//     echo $article->title."<br>";

    	// }

    	// throw new \Exception("Error Processing Request", 1);
    	$title = 'compact — 建立一个数组，包括变量名和它们的值 传值模板测试';
    	return view('HelloWorld', compact('articles', 'title'));
    }
}
