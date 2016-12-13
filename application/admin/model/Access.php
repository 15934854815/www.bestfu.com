<?php
/**
 * 权限model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\model;
use think\Model;

class Access extends Model
{
	/**
	 * 清除权限
	 * @param $role_id 角色ID
	 * @param $node_id 节点ID
	 */
	public function clear_access($role_id=0, $node_id=0){
		$map = [];
		if($role_id){
			$map['role_id'] = $role_id;
		}
		if($node_id){
			$map['node_id'] = $node_id;
		}
		return $this->where($map)->delete();
	}
	
	/**
	 * 角色权限
	 */
	public function access_by_role($role_id){
		if($role_id){
			$map = ['role_id' => $role_id];
			return $this->where($map)->column("node_id");
		}
		return array();
	}
}
