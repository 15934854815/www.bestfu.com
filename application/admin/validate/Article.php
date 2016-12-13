<?php
/**
 * 文章管理验证器
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\validate;
use think\Validate;

class Article extends Validate
{
	protected $rule = [
		'content'	=> 'require',
		'm_id'		=> 'require|number|gt:0'
	];
	
	protected $message = [
		'content.require' => '内容不能为空！',
		'm_id.require'	=> '系统错误，非法操作！',
		'm_id.number'	=> '系统错误，非法操作！',
		'm_id.gt'		=> '系统错误，非法操作！',
    ];
	
	protected $scene = [
        'add_menu_content' => ['content', 'm_id'],
    ];
}
