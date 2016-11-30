<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Model\AdminRole;
use Illuminate\Support\Facades\Hash;


class ArticleController extends Controller
{

	// public function __construct(){
	// 	$this->middleware('auth');
	// }

    //
    public function index(){
    	// $b = hash::make('234234');
    	// echo $b;
    	// $b = '3333';
    	// var_dump(Hash::needsRehash($b));
    	// var_dump(hash::check('234234', $b));
    	// $a = 'cccc';
    	// echo encrypt($a);
    	// echo "<br>";
    	// echo decrypt(encrypt($a));
    	// var_dump(config('app.key'));
    	// $file = file_get_contents(public_path('storage'.DIRECTORY_SEPARATOR.'1.txt'));
    	// var_dump($file);
    	// dd(AdminRole::all());
    	// return redirect()->route('articleId', ['id'=>1]);

    	// var_dump(public_path('uploads'));
    	// var_dump(base_path('xx'));
    	// var_dump(app_path('xx'));
    	// var_dump(resource_path('xx'));

    	return view('article',['articles'=>Article::orderBy('id', 'DESC')->paginate(5)]);
    }

    public function show($id){
    	return view('article/show')->withArticle(Article::with('hasManyComments')->findOrFail($id));
    }
}
