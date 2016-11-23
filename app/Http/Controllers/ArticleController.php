<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    //
    public function index(){
    	return view('article',['articles'=>Article::orderBy('id', 'DESC')->paginate(5)]);
    }

    public function show($id){
    	return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }
}
