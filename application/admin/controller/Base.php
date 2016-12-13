<?php
/**
 * 基类controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use think\Controller;
use app\admin\service\Tree;

class Base extends Controller
{
	protected $cfgs;
	
	public function _initialize()
    {
        define('ADMIN_UID', is_login());
		if(!ADMIN_UID){// 还没登录 跳转到登录页面
			return $this->redirect(url("login/login"));
			exit;
       	}
		
		if(!$this->_check_access()){
        	$this->error("访问失败，权限拒绝！");
        	exit;
        }
		
		$left = $this->_left_menus();
		$this->assign("_left", $left);
		
		/*配置*/
		$cfg_model = model("Config");
		$this->cfgs = $cfg_model->configs();
		$this->assign('cfgs', $this->cfgs);
    }
	
	/**
	 * 左侧菜单列表
	 */
	private function _left_menus(){
		$user_id = ADMIN_UID;
		$sess_key = md5("{$user_id}_menus");
		if(session($sess_key)){
			$menus = session($sess_key);
		}else{
			$node_obj = model("Node");
			$service = new Tree();
			$menus = $node_obj->all_menus();
			if(!is_administrator()){
				$r_model = model("Role");
				$a_model = model("Access");
				$role_id = $r_model->role_by_uid(ADMIN_UID);
				$access = $a_model->access_by_role($role_id);
				foreach($menus as $key => $val){
					if(!in_array($val['id'], $access)){
						unset($menus[$key]);
					}
				}
			}
			$menus = $service->create_menu($menus);
			//session($sess_key, $menus);
		}
		return $menus;
	}
	
	/**
	 * 检查权限
	 */
	private function _check_access(){
		$controller = strtoupper(request()->controller());
		$not_auth = config("not_auth_module");
		if(in_array($controller, $not_auth)){
			return true;
		}else{
			$access_list = $this->_access_list();
			if(in_array($controller, $access_list)){
				return true;
			}else{
				return false;
			}
		}
	}
	
	/**
	 * 权限列表
	 */
	private function _access_list(){
		if(isset($_SESSION['_ACCESS_LIST']) && !empty($_SESSION['_ACCESS_LIST'])){
			$_list = $_SESSION['_ACCESS_LIST'];
		}else{
			$_list = [];
			$n_model = model("Node");
			$nodes = $n_model->all_menus();
			if(!is_administrator()){
				$r_model = model("Role");
				$a_model = model("Access");
				$role_id = $r_model->role_by_uid(ADMIN_UID);
				$access = $a_model->access_by_role($role_id);
				foreach($nodes as $key => $val){
					if(!in_array($val['id'], $access)){
						unset($nodes[$key]);
					}
				}
			}
			foreach($nodes as $val){
				$temp = explode('/', $val['name']);
				$_list[] = strtoupper($temp[0]);
			}
			$_list = array_unique($_list);
			//$_SESSION['_ACCESS_LIST'] = $_list;
		}
		return $_list;
	}
}
