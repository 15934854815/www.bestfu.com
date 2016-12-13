<?php
define("__ROOT__", str_replace("/admin.php", "", \think\Request::instance()->root()));
//配置文件
return [
	'pwd_auth_key'	=>	'yFjXp2Qxke',	//用户密码加密密钥
	
	'user_auth_key'		=>  'UID',	// 用户认证SESSION标记
	'admin_auth_key'	=>	'ADMIN_UID',
	'user_administrator'	=>	1, //超级管理员ID
	'user_root'			=>	2, //管理员ID
	'role_root'			=>	1, //管理员角色ID
	'not_auth_module'	=>	['LOGIN','INDEX','FILE'], //不需要认证模块
	
	'page_size'	=> 10,		//分页数量
	'picture_size'	=> 2097152,			//允许上传图片大小
	'picture_ext'	=> 'jpg,png,gif,tmp',	//允许上传图片格式
	'upload_full_path'	=> ROOT_PATH . 'public' . DS . 'uploads' . DS,	//上传目录（绝对路径）
	'upload_path'	=> DS . 'public' . DS . 'uploads' . DS,	//上传目录（相对路径）
	
	'captcha'  => [
        // 验证码字符集合
        'codeSet'  => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY', 
        // 验证码字体大小(px)
        'fontSize' => 25, 
        // 是否画混淆曲线
        'useCurve' => true, 
         // 验证码图片高度
        'imageH'   => 30,
        // 验证码图片宽度
        'imageW'   => 100, 
        // 验证码位数
        'length'   => 5, 
        // 验证成功后是否重置        
        'reset'    => true
	],
	
	'view_replace_str'=>[
		'__STATIC__' => __ROOT__ . '/public/static',
        '__IMG__'    => __ROOT__ . '/public/' . \think\Request::instance()->module() . '/images',
        '__CSS__'    => __ROOT__ . '/public/' . \think\Request::instance()->module() . '/css',
        '__JS__'     => __ROOT__ . '/public/' . \think\Request::instance()->module() . '/js',
        '__PUBLIC__' => __ROOT__ . '/public',
	],
	'dispatch_success_tmpl'  => APP_PATH . \think\Request::instance()->module() . '/view/public/success.html',
	'dispatch_error_tmpl'    => APP_PATH . \think\Request::instance()->module() . '/view/public/error.html',
];