<?php
/**
 * 广告位图片验证器
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\validate;
use think\Validate;

class Banner extends Validate
{
	protected $rule = [
		'id'		=> 'require|number|gt:0',
		'title'		=> 'require|max:32',
		'thumb'		=> 'require',
		'sort'		=> 'number',
		'url'		=> 'url',
		'm_id'		=> 'require|number|gt:0',
		'status'	=> 'number|in:0,1',
		'tab'		=> 'number|in:0,1',
	];
	
	protected $message = [
		'id.require'	=> '系统错误，非法操作！',
		'id.number'		=> '系统错误，非法操作！',
		'id.gt'			=> '系统错误，非法操作！',
		'title.require'	=> '标题不能为空！',
		'title.max'		=> '标题最多32个字符！',
		'thumb.require'	=> '请上传图片！',
		'sort.number'	=> '排序必须为数字！',
		'url.url'		=> '链接地址格式错误！',
		'm_id.require'	=> '请选择所属菜单！',
		'm_id.number'	=> '请选择所属菜单！',
		'm_id.gt'		=> '请选择所属菜单！',
		'status.number'	=> '系统错误，非法操作！',
		'status.in'		=> '系统错误，非法操作！',
		'tab.number'	=> '系统错误，非法操作！',
		'tab.in'		=> '系统错误，非法操作！',
    ];
	
	protected $scene = [
        'add'	=> ['title', 'thumb', 'sort', 'url', 'status', 'tab'],
        'edit'	=> ['id', 'title', 'thumb', 'sort', 'url', 'status', 'tab'],
        'add_banner'	=> ['title', 'thumb', 'url', 'm_id', 'status', 'tab'],
        'edit_banner'	=> ['id', 'title', 'thumb', 'url', 'm_id', 'status', 'tab'],
    ];
}
