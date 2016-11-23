<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class HelloWorldController extends Controller
{
    //
    public function index(){
    	// echo "<pre>";
    	// $articles = \App\Article::find(2);
    	// var_dump($articles);
    	$articles = Article::where('id', '>', 2)->where('id', '<', 20)->orderBy('updated_at', 'desc')->get();

    	foreach ($articles as $article) {

    	    echo $article->title."<br>";

    	}

    	// throw new \Exception("Error Processing Request", 1);
    	
    	return view('HelloWorld');
    }
}
