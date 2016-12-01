<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $request->session()->flash('status', 'hello home page');//需注释，再下一次http请求才生效
        // \Session::flash('status', 'hello home page');//需注释，再下一次http请求才生效
        // flash('status', 'hello home page');//自定义全局函数载入测试 app\helpers.php
        // return redirect('welcome');//闪存测试跳转
        // 
        // new \App\Libraires\TestMe();//载入自定义类测试
        return view('home');
    }
}
