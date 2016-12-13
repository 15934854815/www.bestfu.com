<?php
/**
 * 前台菜单管理controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Validate;

class Menu extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 前台菜单列表
	 */
	public function index(){
		$model = model("Menu");
		$_res = $model->page_menus();
		$replace = [
			'status' => [0=>'启用', 1=>'禁用'],
			'ishead' => [0=>'是', 1=>'否'],
			'isfoot' => [0=>'是', 1=>'否']
		];
		int_to_string($_res['list'], $replace);
		$this->assign("_page", $_res['page']);
		$this->assign("_list", $_res['list']);
		return view('menu/index',['meta_title'=>"前台菜单"]);
	}
	
	/**
	 * 添加菜单
	 */
	public function add(){
		if(request()->isPost()){
			$data = [];
			$data['title']	= input("post.title", "", "trim");
			$data['url']	= input("post.url", "", "trim");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$data['ishead']	= input("post.ishead", 0, "intval");
			$data['isfoot']	= input("post.isfoot", 0, "intval");
			$data['remark']	= input("post.remark", "", "trim");
			$validate = \think\Loader::validate('Menu');
			if($validate->scene('add')->check($data)){
				$data['addtime'] = request()->time();
				$model = model("Menu");
				$_res = $model->save($data);
				if($_res){
					$menu_id = $model->id;
					return $this->success("添加成功！", url('menu/index'));
				}else{
					return $this->error("添加失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			return view('menu/add',['meta_title'=>"添加前台菜单"]);
		}
	}
	
	/**
	 * 修改菜单
	 */
	public function edit(){
		if(request()->isPost()){
			$data = [];
			$data['id']		= input("post.id", 0, "intval");
			$data['title']	= input("post.title", "", "trim");
			$data['url']	= input("post.url", "", "trim");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$data['ishead']	= input("post.ishead", 0, "intval");
			$data['isfoot']	= input("post.isfoot", 0, "intval");
			$data['remark']	= input("post.remark", "", "trim");
			$validate = \think\Loader::validate('Menu');
			if($validate->scene('edit')->check($data)){
				$model = model("Menu");
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
	 * 删除菜单
	 */
	public function delete(){
		if(request()->isPost()){
			$id = input('post.id', 0);
	        if ( empty($id) ) {
	            $this->error('请选择要操作的数据!', "");
	        }
			$model = model('Menu');
			$id = array_unique((array)$id);
			$map = ['id' => ['IN', $id]];
	        if($model->where($map)->delete()){
	            $this->success('删除成功', "");
	        } else {
	            $this->error('删除失败！', "");
	        }
		}else{
			return $this->error("系统错误：非法操作！");
		}
	}
	
	/**
	 * 更改状态
	 */
	public function status($id,$value = 0){
        $where = ['id'=>$id];
        $msg   = ['success'=>'操作成功！', 'error'=>'操作失败！', 'url'=>'' ,'ajax'=> request()->isAjax()];
		$data  = ['status' => $value];
		$model = model("Menu");
        if($model->save($data, $where)!==false) {
            $this->success($msg['success'],$msg['url'],$msg['ajax']);
        }else{
            $this->error($msg['error'],$msg['url'],$msg['ajax']);
        }
	}
}
