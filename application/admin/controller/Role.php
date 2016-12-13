<?php
/**
 * 角色管理控制器
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class Role extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 角色列表
	 */
	public function index(){
		$model = model("Role");
		$n_model = model("Node");
		$_res = $model->page_all_roles();
		$replace = ['status' => [1=>'禁用',0=>'正常']];
		int_to_string($_res['list'], $replace);
		$nodes = $n_model->all_authorize_nodes();
		$this->assign("_page", $_res['page']);
		$this->assign("_list", $_res['list']);
		$this->assign("_nodes", $nodes);
		return view('role/index',['meta_title'=>"角色列表"]);
	}
	
	/**
	 * 角色添加
	 */
	public function add(){
		if(request()->isPost()){
			$data = [];
			$data['name']	= input("post.name", "", "trim");
			$data['remark']	= input("post.remark", "", "trim");
			$data['status']	= input("post.status", 0, "intval");
			$validate = \think\Loader::validate('Role');
			if($validate->scene('add')->check($data)){
				$model = model("Role");
				$res = $model->save($data);
				if($res){
					$role_id = $model->id;
					return $this->success("添加成功！", url('role/index'));
				}else{
					return $this->error("添加失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			return view('role/add',['meta_title'=>"添加角色"]);
		}
	}
	
	/**
	 * 角色修改
	 */
	public function edit(){
		if(request()->isPost()){
			$data = [];
			$data['id']		= input("post.id", 0, "intval");
			$data['name']	= input("post.name", "", "trim");
			$data['remark']	= input("post.remark", "", "trim");
			$data['status']	= input("post.status", 0, "intval");
			$validate = \think\Loader::validate('Role');
			if($validate->scene('edit')->check($data)){
				$model = model("Role");
				$res = $model->update($data);
				if($res !== false){
					return $this->success("修改成功！", "");
				}else{
					return $this->error("修改失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			return $this->error("系统错误：非法操作！");
		}
	}
	
	/**
	 * 角色授权
	 */
	public function authorize(){
		if(request()->isPost()){
			$id = input("post.id", 0, "intval");
			if(is_root() && $id == config('role_root')){
				return $this->error("系统错误！", "");
			}else{
				$access = isset($_POST['access']) ? $_POST['access'] : [];
				if($id){
					$data = [];
					$n_model = model("Node");
					$pids = $n_model->pids_by_ids($access);
					$access = array_merge($pids, $access);
					foreach($access as $val){
						$data[] = [
							'role_id' => intval($id),
							'node_id' => intval($val)
						];
					}
					Db::startTrans();
					try{
						$a_model = model("Access");
						$a_model->clear_access($id);
						$a_model->saveAll($data);
						// 提交事务
					    Db::commit();
						$res = true;
					} catch (\Exception $e) {
					    // 回滚事务
					    Db::rollback();
						$res = false;
					}
					if($res){
						return $this->success("授权成功！", "");
					}else{
						return $this->error("授权失败！", "");
					}
				}else{
					return $this->error("系统错误：非法操作！", "");
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
		if(is_root() && $id == config('role_root')){
			return $this->error("系统错误！", "");
		}else{
	        $where = ['id'=>$id];
	        $msg   = ['success'=>'操作成功！', 'error'=>'操作失败！', 'url'=>'' ,'ajax'=> request()->isAjax()];
			$data  = ['status' => $value];
			$model = model("Role");
	        if($model->save($data, $where)!==false) {
	            $this->success($msg['success'],$msg['url'],$msg['ajax']);
	        }else{
	            $this->error($msg['error'],$msg['url'],$msg['ajax']);
	        }
		}
	}
	
	/**
	 * 删除角色
	 */
	public function delete(){
		$id = input('id', 0);
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!', "");
        }
		if(is_root() && $id == config('role_root')){
			return $this->error("系统错误！", "");
		}else{
			$model = model('Role');
			$id = array_unique((array)$id);
			$uid = $model->role_has_bind($id);
			if($uid){
				$this->error('角色有下属用户，无法删除！', "");
			}else{
				$map = ['id' => ['IN', $id]];
		        if($model->where($map)->delete()){
		            $this->success('删除成功', "");
		        } else {
		            $this->error('删除失败！', "");
		        }
			}
		}
	}
}
