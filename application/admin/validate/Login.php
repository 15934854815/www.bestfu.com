<?php
/**
 * 登录验证器
 * @author liangjian<liangjian@bestfu.com>
 */
 
namespace app\admin\validate;
use think\Validate;

class Login extends Validate
{
	protected $rule = [
        'username'  =>  'require|alphaDash|length:4,32',
        'password'	=>  'require',
        'verify'	=>	'require|captcha',
    ];

    protected $message = [
        'username.require'	 =>	'用户名不能为空！',
        'username.alphaDash' =>	'用户名格式错误！',
        'username.length'	 =>	'用户名长度为4-32位！',
        'password.require'	 =>	'密码不能为空！',
        'verify.require'	 =>	'验证码不能为空！',
        'verify.captcha'	 =>	'验证码输入错误！',
    ];
	
	protected $scene = [
        'login'  =>  ['username', 'password', 'verify'],
    ];
}
