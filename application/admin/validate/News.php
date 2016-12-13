<?php
/**
 * 新闻验证器
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\validate;
use think\Validate;

class News extends Validate
{
	protected $rule = [
		'id'		=> 'require|number|gt:0',
		'title'		=> 'require|max:128',
		'thumb'		=> 'require',
		'intro'		=> 'require',
		'content'	=> 'require',
		'sort'		=> 'number',
		'status'	=> 'number|in:0,1',
	];
	
	protected $message = [
		'id.require'	=> '系统错误，非法操作！',
		'id.number'		=> '系统错误，非法操作！',
		'id.gt'			=> '系统错误，非法操作！',
		'title.require'	=> '新闻标题不能为空！',
		'title.max'		=> '新闻标题最多128个字符！',
		'thumb.require'	=> '请上传缩略图！',
		'intro.require'	=> '新闻简介不能为空！',
		'content.require' => '新闻内容不能为空！',
		'sort.number'	=> '排序必须为数字！',
		'status.number'	=> '系统错误，非法操作！',
		'status.in'		=> '系统错误，非法操作！',
    ];
	
	protected $scene = [
        'add'	=> ['title', 'thumb', 'intro', 'content', 'sort', 'status'],
        'edit'	=> ['id', 'title', 'thumb', 'intro', 'content', 'sort', 'status'],
    ];
}
