<?php
/**
 * 用户管理控制器
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Validate;
use think\Db;

class User extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	/* 用户列表 */
	public function index(){
		$model = model("User");
		$role_model = model("Role");
		$_res = $model->page_all_users();
		$r_names = $role_model->all_role_names();
		$r_names[0] = "系统超级管理员";
		$replace = [
			'status' => [1=>'禁用',0=>'正常'],
			'rid'	 => $r_names
		];
		int_to_string($_res['list'], $replace);
		$roles = $role_model->all_roles();
		$this->assign("_page", $_res['page']);
		$this->assign("_list", $_res['list']);
		$this->assign("_roles", $roles);
		return view('user/index',['meta_title'=>"用户列表"]);
	}
	
	/* 添加用户 */
	public function add(){
		if(request()->isPost()){
			$data = [];
			$data['username']	= input("post.username", "", "trim");
			$data['password']	= input("post.password", "", "trim");
			$data['repassword']	= input("post.repassword", "", "trim");
			$data['role_id']	= input("post.role_id", 0, "intval");
			$data['status']		= input("post.status",  0, "intval");
			$validate = \think\Loader::validate('User');
			if($validate->scene('add')->check($data)){
				Db::startTrans();
				try{
					$role_id = $data['role_id'];
					unset($data['repassword']);
					unset($data['role_id']);
					$model = model("User");
					$r_model = model("Role");
					$model->save($data);
					$user_id = $model->uid;
					$r_model->bind_relation($user_id, $role_id);
				    // 提交事务
				    Db::commit();
					$res = true;
				} catch (\Exception $e) {
				    // 回滚事务
				    Db::rollback();
					dump($e->getMessage());
					$res = false;
				}
				if($res){
					return $this->success("添加成功！", url('user/index'));
				}else{
					return $this->error("添加失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$role_model = model("Role");
			$roles = $role_model->all_roles();
			$this->assign("_roles", $roles);
			return view('user/add',['meta_title'=>"添加用户"]);
		}
	}

	/**
	 * 修改用户
	 */
	public function edit(){
		if(request()->isPost()){
			$uid = input("post.uid", 0, "intval");
			if($uid == config('user_administrator')){
				$this->error("系统错误！", "");
			}else{
				$data = [];
				$data['uid']	= $uid;
				$data['username']	= input("post.username", "", "trim");
				$data['role_id']	= input("post.role_id", 0, "intval");
				$data['status']		= input("post.status",  0, "intval");
				$validate = \think\Loader::validate('User');
				if($validate->scene('edit')->check($data)){
					Db::startTrans();
					try{
						$role_id = $data['role_id'];
						$password = input("post.password", "", "trim");
						if($password){
							$data['password'] = $password;
						}
						unset($data['role_id']);
						$model = model("User");
						$r_model = model("Role");
						$model->update($data);
						$r_model->bind_relation($uid, $role_id);
						// 提交事务
					    Db::commit();
						$res = true;
					} catch (\Exception $e) {
					    // 回滚事务
					    Db::rollback();
						$res = false;
					}
					if($res !== false){
						return $this->success("修改成功！", "");
					}else{
						return $this->error("修改失败！", "");
					}
				}else{
					return $this->error($validate->getError(), "");
				}
			}
		}else{
			return $this->error("系统错误：非法操作！");
		}
	}

	/**
	 * 更改状态
	 */
	public function status($id,$value = 0){
		if(!is_administrator() && in_array($id, [config('user_administrator'), config('user_root')])){
			return $this->error("系统错误！", "");
		}else{
			$where = ['uid'=>$id];
	        $msg   = ['success'=>'操作成功！', 'error'=>'操作失败！', 'url'=>'' ,'ajax'=> request()->isAjax()];
			$data  = ['status' => $value];
			$model = model("User");
	        if($model->save($data, $where)!==false) {
	            return $this->success($msg['success'],$msg['url'],$msg['ajax']);
	        }else{
	            return $this->error($msg['error'],$msg['url'],$msg['ajax']);
	        }
		}
	}
	
	/**
	 * 删除用户
	 */
	public function delete(){
		$id = input('uid', 0);
        if ( empty($id) ) {
            return $this->error('请选择要操作的数据!', "");
        }
		if(!is_administrator() && in_array($id, [config('user_administrator'), config('user_root')])){
			return $this->error('系统错误！', "");
		}else{
			Db::startTrans();
			try{
				$model = model('User');
				$r_model = model('Role');
				$map = ['uid' => $id];
				$model->where($map)->delete();
				$r_model->unbind_relation($id);
				// 提交事务
			    Db::commit();
				$res = true;
			} catch (\Exception $e) {
			    // 回滚事务
			    Db::rollback();
				$res = false;
			}
			if($res){
				return $this->success('删除成功！', "");
			}else{
				return $this->error('删除失败！', "");
			}
		}
	}
}
