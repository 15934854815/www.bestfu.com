<?php
/**
 * 角色验证器
 * @author liangjian<liangjian@bestfu.com>
 */
 
namespace app\admin\validate;
use think\Validate;

class Role extends Validate
{
	protected $rule = [
		'id'		=> 'gt:0',
        'name'  	=> 'require|unique:role',
        'status'	=> 'require',
    ];
	
	protected $message = [
		'id.gt'				=> '系统错误，非法操作！',
        'name.require'		=> '角色名称不能为空！',
        'name.unique'		=> '角色名称已存在！',
        'status.require'	=> '请选择角色状态！',
    ];
	
	protected $scene = [
        'add'	=> ['name', 'status'],
        'edit'	=> ['id', 'name', 'status']
    ];
}
