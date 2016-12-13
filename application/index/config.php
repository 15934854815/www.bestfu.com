<?php
//配置文件
return [
	'module_route_file' => 'route',
	//伪静态后缀
	'url_html_suffix'	=> 'shtml',
	//视图输出字符串内容替换
	'view_replace_str'	=>[
		'__STATIC__' => '/public/static',
        '__IMG__'    => '/public/' . \think\Request::instance()->module() . '/images',
        '__CSS__'    => '/public/' . \think\Request::instance()->module() . '/css',
        '__JS__'     => '/public/' . \think\Request::instance()->module() . '/js',
        '__PUBLIC__' => '/public',
	],
];