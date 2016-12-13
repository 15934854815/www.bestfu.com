<?php
/**
 * 用户验证器
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\validate;
use think\Validate;

class User extends Validate
{
	protected $rule = [
		'uid'			=> 'require|number|gt:0',
		'username'		=> 'require|unique:user|alphaNum|length:4,32',
		'password'		=> 'require',
		'repassword'	=> 'require|confirm:password',
		'role_id'		=> 'number|gt:0',
		'status'		=> 'number|in:0,1',
		'oldpassword'	=> 'require|confrim_password',
		'newpassword'	=> 'require',
		're_password'	=> 'require|confirm:newpassword',
	];
	
	protected $message = [
		'uid.require'		=> '系统错误，非法操作！',
		'uid.number'		=> '系统错误，非法操作！',
		'uid.gt'			=> '系统错误，非法操作！',
		'username.require'	=> '用户名不能为空！',
		'username.unique'	=> '用户名已存在！',
		'username.alphaNum'	=> '用户名格式错误！',
		'username.length'	=> '用户名格式错误！',
		'password.require'	=> '密码不能为空！',
		'repassword.require'	=> '请输入确认密码！',
		'repassword.confirm'	=> '俩次输入密码不一致！',
		'role_id.number'	=> '系统错误，非法操作！',
		'role_id.gt'		=> '系统错误，非法操作！',
		'status.number'		=> '系统错误，非法操作！',
		'status.in'			=> '系统错误，非法操作！',
		'oldpassword.require'	=> '请输入原密码！',
		'newpassword.require'	=> '请输入新密码！',
		're_password.require'	=> '请输入确认密码！',
		're_password.confirm'	=> '俩次输入密码不一致！',
    ];
	
	protected function confrim_password($value,$rule,$data){
		$model = model("User");
		$db_pwd = $model->col_value_by_id($data['uid'], 'password');
		return sp_compare_password($data['oldpassword'], $db_pwd) ? : "原密码不正确！";
	}
	
	protected $scene = [
        'add'	=> ['username', 'password', 'repassword', 'role_id', 'status'],
        'edit'	=> ['uid', 'username', 'role_id', 'status'],
        'password' => ['oldpassword', 'newpassword', 're_password'],
    ];
}
