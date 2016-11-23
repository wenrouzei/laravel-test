<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;

class CaptchaController extends Controller
{
    //
    public function index(){
    	$builder = new CaptchaBuilder;
    	$builder->build();

    	//获取验证码的内容
    	$phrase = $builder->getPhrase();

    	//把内容存入session
    	\Session::flash('milkcaptcha', $phrase);

    	return response($builder->output())->header('Content-type','image/jpeg');
    }

    public function getCaptcha(){
    	$captcha = \Session::get('milkcaptcha');
    	var_dump($captcha);
    }
}
