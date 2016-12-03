<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	// protected $table = 'articles';//指定表名 默认类名复数
	// protected $primarykey = 'id';//指定主键，默认id
	// public $timestamps = false; //自动维护时间戳 默认为true
	protected $fillable = ['title', 'body', 'user_id'];//指定允许批量赋值的字段
	// protected $guarded = ['body'];//指定不允许批量赋值的字段

	//保存为时间戳？
	// protected function getDateFormat(){
	// 	return time();
	// }

	//格式化获取的返回值
	// protected function asDateTime($val){
	// 	return strtotime($val);
	// }

    //
    public function hasManyComments(){
    	return $this->hasMany('App\Comment', 'article_id', 'id');
    }

    public static function testModel(){
    	return '不涉及数据库操作的基础模型方法调用';
    }
}
