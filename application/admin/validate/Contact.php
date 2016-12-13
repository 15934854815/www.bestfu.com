<?php
/**
 * 联系我们验证器
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\validate;
use think\Validate;

class Contact extends Validate
{
	protected $rule = [
		'id'		=> 'require|number|gt:0',
		'title'		=> 'require|unique:contact,key^type|max:64',
		//'telephone'	=> ['require','regex'=>'/^(\d{3,4}(-|\s){1}\d{7,8}(-|\s)?\d{0,4})|((0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8})$/'],
		'telephone'	=> ['require','regex'=>'/^((\(\d{3,4}\)|\d{3,4}-|\s)?\d{7,8})|((0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8})$/'],
		'email'		=> 'require|email',
		'thumb'		=> 'require',
		'sort'		=> 'number',
		'status'	=> 'number|in:0,1',
		'address'	=> 'require',
		'addr_img'	=> 'require',
	];
	
	protected $message = [
		'id.require'		=> '系统错误，非法操作！',
		'id.number'			=> '系统错误，非法操作！',
		'id.gt'				=> '系统错误，非法操作！',
		'title.require'		=> '名称不能为空！',
		'title.unique'		=> '名称已存在！',
		'title.max'			=> '名称最多64个字符！',
		'telephone.require'	=> '电话号码不能为空！',
		'telephone.regex'	=> '电话号码格式错误！',
		'email.require'		=> 'E-mail不能为空！',
		'email.email'		=> 'E-mail格式错误！',
		'thumb.require'		=> '请上传二维码！',
		'sort.number'		=> '排序必须为数字！',
		'status.number'		=> '系统错误，非法操作！',
		'status.in'			=> '系统错误，非法操作！',
		'address.require'	=> '详细地址不能为空！',
		'addr_img.require'	=> '请上传地址图片！',
    ];
	
	protected $scene = [
        'add_tel'	=> ['title', 'telephone', 'sort', 'status'],
        'edit_tel'	=> ['id', 'title', 'telephone', 'sort', 'status'],
        'add_email'	=> ['title', 'email', 'sort', 'status'],
        'edit_email'	=> ['id', 'title', 'email', 'sort', 'status'],
        'add_wechat'	=> ['title', 'thumb', 'sort', 'status'],
        'edit_wechat'	=> ['id', 'title', 'thumb', 'sort', 'status'],
        'save_address'	=> ['address', 'addr_img'],
    ];
}
