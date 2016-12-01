<?php 
/**
 * 自定义函数 composer.json 中 autoload 部分里的 files 字段加入该文件
 * {
    ...

    "autoload": {
        "files": [
            "app/helpers.php"
        ]
    }
    ...
	}

	然后运行 composer dump-autoload
 */

if(!function_exists('flash')){
	function flash($key, $value)
	{
	    session()->flash($key, $value);
	}
}