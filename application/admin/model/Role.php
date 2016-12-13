<?php
/**
 * 角色model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\model;
use think\Model;

class Role extends Model
{
	/**
	 * 分页获取角色列表
	 * @return array
	 */
	public function page_all_roles(){
		$roles = [];
		$page = null;
		$objs = $this->order('id desc')->paginate(config('page_size'));
		/*$objs = $this
				->alias('r')
				->field("r.*,GROUP_CONCAT(a.`node_id`) AS access")
				->join("__ACCESS__ a", "r.id = a.role_id", "LEFT")
				->group("r.id")
				->order('r.id desc')
				->paginate(config('page_size'));*/
		if($objs){
			foreach($objs as $obj){
				$temp = $obj->getData();
				$map = ['role_id'=>$temp['id']];
				$temp['access'] = $this->table("__ACCESS__")->where($map)->column('node_id');
				//$temp['access'] = $temp['access'] ? explode(',', $temp['access']) : [];
				$roles[] = $temp;
			}
			$page = $objs->render();
		}
		return ['list'=>$roles, 'page'=>$page];
	}
	
	/**
	 * 所有角色列表
	 * @param $forbidden
	 * 			true-排除禁用的角色
	 * 			false-所有角色
	 * @return array
	 */
	public function all_roles($forbidden=true){
		$map = [];
		$roles = [];
		if($forbidden){
			$map['status'] = 0;
		}
		$objs = $this->where($map)->order('id desc')->select();
		if($objs){
			foreach($objs as $obj){
				$roles[] = $obj->getData();
			}
		}
		return $roles;
	}
	
	/**
	 * 所有角色名称
	 * @return array
	 */
	public function all_role_names(){
		return $this->column('name','id');
	}
	
	/**
	 * 绑定用户与角色关系
	 */
	public function bind_relation($user_id, $role_id){
		$this->table('__ROLE_USER__')->where("user_id={$user_id}")->delete();
		$query = "INSERT INTO `" . config("database.prefix") . "role_user` VALUES ({$role_id}, {$user_id});";
		return $this->execute($query);
	}
	
	/**
	 * 解绑用户与角色关系
	 */
	public function unbind_relation($user_id=0, $role_id=0){
		$map = [];
		if($user_id){
			$map['user_id'] = ["IN", $user_id];
		}
		if($role_id){
			$map['role_id'] = ["IN", $role_id];
		}
		return $this->table('__ROLE_USER__')->where($map)->delete();
	}
	
	/**
	 * 角色是否绑定有用户
	 */
	public function role_has_bind($role_id){
		$map = ['role_id'=>["IN", $role_id]];
		return $this->table('__ROLE_USER__')->where($map)->value("user_id");
	}
	
	/**
	 * 获取用户角色ID
	 * @param $uid 用户ID
	 */
	public function role_by_uid($uid){
		$map = ['user_id' => $uid];
		return $this->table('__ROLE_USER__')->where($map)->value("role_id");
	}
}
