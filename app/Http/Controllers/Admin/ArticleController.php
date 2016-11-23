<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Article;

class ArticleController extends Controller
{
    //
    public function index(){
    	return view('admin/article/index', ['articles' => Article::orderBy('id', 'DESC')->paginate(2)]);
    }

    public function create(){
    	return view('admin/article/create');
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'title'	=> 'required|unique:articles|max:255',
    		'body'	=> 'required',
    	]);

    	$article = new Article;
    	$article->title = $request->get('title');
    	$article->body = $request->get('body');
    	$article->user_id = $request->user()->id;

    	if($article->save()){
    		return redirect('admin/article')->withErrors('添加成功');
    	}else{
    		return redirect()->back()->withInput()->withErrors('保存失败！');
    	}
    }

    public function edit($id){
    	return view('admin.article.edit', ['article' => Article::find($id)]);
    }

    public function update($id, Request $request){
    	$article = Article::find($id);
    	$article->title = $request->get('title');
    	$article->body = $request->get('body');

    	if($article->save()){
    		return redirect('admin/article')->withInput()->withErrors('修改成功');
    	}else{
    		return redirect()->back()->withInput()->withErrors('修改失败');
    	}

    }

    public function destroy($id){
    	Article::find($id)->delete();
    	return redirect()->back()->withInput()->withErrors('删除成功');
    }
}