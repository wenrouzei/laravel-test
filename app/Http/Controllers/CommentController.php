<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use App\Http\Requests\CommentCreateRequest;

class CommentController extends Controller
{
    //
    // public function store(Request $request)
    // {
    // 	$this->validate(
    // 		$request,
    // 		[
    // 			'nickname' => 'required|min:2|max:100',
    // 			'content' => 'required|min:10',
    // 			'article_id' => 'required|integer',
    // 			'email' => 'required|email',
    // 		]
    // 	);

    //     if (Comment::create($request->all())) {
    //         return redirect()->back();
    //     } else {
    //         return redirect()->back()->withInput()->withErrors('评论发表失败！');
    //     }
    // }

    public function store(CommentCreateRequest $request){
        if (Comment::create($request->all())) {
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->withErrors('评论发表失败！');
        }
    }
}
