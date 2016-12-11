<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Article;

class ArticleController extends Controller
{
    //
    public function index(Request $request){
        // var_dump(\Auth::check());
        // var_dump($request->user()->id);
        // dd(Article::orderBy('id', 'DESC')->get());
        // return view('admin/article/index', ['articles' => Article::orderBy('id', 'DESC')->paginate(2)]);
        return view('admin/article/index', ['articles' => Article::latest('id')->paginate(2)]);//latest简化模型降序排序
        return view('admin/article/index', ['articles' => Article::oldest('id')->paginate(2)]);//oldest简化模型升序排序
    }

    public function create(){
        return view('admin/article/create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|unique:articles|min:3|max:255',
            'body'  => 'required',
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
    	return view('admin.article.edit', ['article' => Article::findOrFail($id)]);
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
