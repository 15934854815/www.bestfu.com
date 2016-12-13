<?php
/**
 * 用户留言
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\validate;
use think\Validate;

class Message extends Validate
{
	protected $rule = [
		'name'		=> 'require|max:64',
		'mobile'	=> ['require','regex'=>'/^(\d{3,4}(-|\s){1}\d{7,8}(-|\s)?\d{0,4})|((0|86|\+86|17951)?1[3|4|5|7|8]\d{9})$/'],
		'email'		=> 'email|max:128',
		'address'	=> 'max:256',
		'content'	=> 'require'
	];
	
	protected $message = [
		'name.require'	=> '请输入您的姓名，方便我们与您联系！',
		'name.max'		=> '姓名最多支持64个字符！',
		'mobile.require' => '请输入您的联系电话，方便我们与您联系！',
		'mobile.regex'	=> '您输入的联系电话格式错误，请重新输入！',
		'email.email'	=> '您输入的E-mail格式错误，请重新输入！',
		'email.max'		=> 'E-mail最多支持128个字符！',
		'address.max'	=> '地址最多支持256个字符！',
		'content.require' => '请输入您的疑问或建议，方便我们及时解决！'
    ];
	
	protected $scene = [
        'add'	=> ['name', 'mobile', 'email', 'address', 'content'],
    ];
}
