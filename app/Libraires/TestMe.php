<?php 
namespace App\Libraires;

/**
* 测试载入自定义类 只需要按命名空间如入即可 按psr-4自动加载规范 （测试可无需运行 composer dump-autoload）
*/
class TestMe
{
	
	function __construct()
	{
		echo __CLASS__;
	}
}
