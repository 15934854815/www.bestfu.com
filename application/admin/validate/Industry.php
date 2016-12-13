<?php
/**
 * 行业领域验证器
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\validate;
use think\Validate;

class Industry extends Validate
{
	protected $rule = [
		'id'		=> 'require|number|gt:0',
		'title'		=> 'require|unique:industry,title^location|max:64',
		'thumb'		=> 'require',
		'style'		=> 'require',
		'url'		=> 'url',
		'sort'		=> 'number',
		'newtab'	=> 'number|in:0,1',
		'location'	=> 'number|in:0,1',
		'status'	=> 'number|in:0,1',
	];
	
	protected $message = [
		'id.require'	=> '系统错误，非法操作！',
		'id.number'		=> '系统错误，非法操作！',
		'id.gt'			=> '系统错误，非法操作！',
		'title.require'	=> '标题不能为空！',
		'title.unique'	=> '标题已存在！',
		'title.max'		=> '标题最多64个字符！',
		'thumb.require'	=> '请上传背景图片！',
		'style.require'	=> '请输入样式！',
		'url.url'		=> '链接地址格式错误！',
		'sort.number'	=> '排序必须为数字！',
		'newtab.number'	=> '系统错误，非法操作！',
		'newtab.in'		=> '系统错误，非法操作！',
		'location.number' => '系统错误，非法操作！',
		'location.in'	=> '系统错误，非法操作！',
		'status.number'	=> '系统错误，非法操作！',
		'status.in'		=> '系统错误，非法操作！',
    ];
	
	protected $scene = [
        'add' => ['title', 'thumb', 'style', 'url', 'sort', 'newtab', 'location', 'status'],
        'edit' => ['id', 'title', 'thumb', 'style', 'url', 'sort', 'newtab', 'location', 'status'],
    ];
}
