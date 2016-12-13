<?php
/**
 * 前台菜单验证器
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\validate;
use think\Validate;

class Menu extends Validate
{
	protected $rule = [
		'id'		=> 'require|number|gt:0',
		'title'		=> 'require|unique:menu|max:32',
		'url'		=> 'require',
		'sort'		=> 'number',
		'status'	=> 'number|in:0,1',
		'ishead'	=> 'number|in:0,1',
		'isfoot'	=> 'number|in:0,1',
	];
	
	protected $message = [
		'id.require'	=> '系统错误，非法操作！',
		'id.number'		=> '系统错误，非法操作！',
		'id.gt'			=> '系统错误，非法操作！',
		'title.require'	=> '标题不能为空！',
		'title.unique'	=> '标题已存在！',
		'title.max'		=> '标题最多32个字符！',
		'url.require'	=> '链接不能为空！',
		'sort.number'	=> '排序必须为数字！',
		'status.number'	=> '系统错误，非法操作！',
		'status.in'		=> '系统错误，非法操作！',
		'ishead.number'	=> '系统错误，非法操作！',
		'ishead.in'		=> '系统错误，非法操作！',
		'isfoot.number'	=> '系统错误，非法操作！',
		'isfoot.in'		=> '系统错误，非法操作！',
    ];
	
	protected $scene = [
        'add'	=> ['title', 'url', 'sort', 'status', 'ishead', 'isfoot'],
        'edit'	=> ['id', 'title', 'url', 'sort', 'status', 'ishead', 'isfoot'],
    ];
}
