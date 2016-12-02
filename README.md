# laravel-test
laravel test

1. 文章页、评论
2. 自带登录
3. 路由
4. DB
5. 加密
6. GuzzleHttp
7. 闪存
等等...

#使用sqlite

1.安装sqlite3

2.database目录下建立database.sqlite文件

3..env文件注释

  ##DB_CONNECTION=mysql
  
  ##DB_HOST=192.168.16.228
  
  ##DB_PORT=3306
  
  ##DB_DATABASE=laravel
  
  ##DB_USERNAME=root
  
  ##DB_PASSWORD=root
    
4.database.php配置文件 'default' => 'sqlite' 

5.php artisan migrate 迁移
  php artisan db:seed 填充
  
6.操作sqlite数据库，命令行进入database目录，输入sqlite3 dababase.sqlite，从而开打数据库进行操作

 .table 列出所有表
  
 .database 列出所有数据库
 
#添加自定义函数库

  自定义函数 composer.json 中 autoload 部分里的 files 字段加入该文件
  
	{
	    ...

	    "autoload": {
		"files": [
		    "app/helpers.php"
		]
	    }
	    ...
	}

	然后运行 composer dump-autoload
 
#添加自定义类

 放在app目录下，可建多层目录，按psr-4规范编写，composer已自动加载 （测试可无需运行 composer dump-autoload）
 
 demo使用
 
 \App\Libraires\TestMe()
 
 
#扩展包
 
 barryvdh/laravel-debugbar
 
 guzzlehttp/guzzle
 
 gregwar/captcha
 
#自建config目录下配置文件获取

###demo 

config/lee.php

	<?php
	/**
	 * 自建测试config配置，无需额外设置可以在任何地方直接使用全局配置帮助函数config调用，调用方法为 config('文件名.返回一维数组的键名') as config('lee.key1')
	 */

	return [
		'key1' => 'lee test config 1',
		'key2' => 'lee test config 2',
		'key3' => 'lee test config 3',
		'key4' => 'lee test config 4',
	];
