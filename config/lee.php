<?php
/**
 * 自建测试config配置，无需另外设置嵌套，直接使用全局配置帮助函数config调用，调用方法为 config('不加后缀文件名.返回的一维数组的键名')、config('不加后缀文件名')
 * demo
 * config('lee.key1') 获取配置文件返回数组的某个值
 * config('lee') 获取配置文件返回的整个数组
 */

return [
	'key1' => 'lee test config 1',
	'key2' => 'lee test config 2',
	'key3' => 'lee test config 3',
	'key4' => 'lee test config 4',
];