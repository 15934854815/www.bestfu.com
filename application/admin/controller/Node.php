<?php
/**
 * 节点管理controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Validate;
use app\admin\service\Tree;

class Node extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	public function index($pid=0){
		$model = model("Node");
		$_res = $model->page_nodes_by_pid($pid);
		$replace = [
			'level' => [1=>'模块',2=>'列表',3=>'操作'],
			'status' => [1=>'禁用',0=>'启用']
		];
		int_to_string($_res['list'], $replace);
		if($_res['list']){
			$titles = $model->all_titles();
			foreach($_res['list'] as &$key){
                if($key['pid']){
                    $key['pid_text'] = $titles[$key['pid']];
                }else{
                	$key['pid_text'] = "顶级菜单";
                }
            }
		}
		if($pid){
			$data = $model->node_by_id($pid);
			$this->assign("_data", $data);
		}
		$this->assign("_page", $_res['page']);
		$this->assign("_list", $_res['list']);
		return view('node/index',['meta_title'=>"后台菜单"]);
	}
	
	public function add($pid=0){
		if(request()->isPost()){
			$rule = [
				'title'	=> 'require',
				'name'	=> 'require'
			];
			$msg = [
				'title.require'	=> "标题不能为空！",
				'name.require'	=> "链接不能为空！",
			];
			$data = [];
			$data['title'] = input("post.title", "", "trim");
			$data['name'] = input("post.url", "", "trim");
			$data['status'] = input("post.status", 0, "intval");
			$data['sort'] = input("post.sort", 0, "intval");
			$data['pid'] = input("post.pid", 0, "intval");
			$data['level'] = input("post.level", 1, "intval");
			$data['remark'] = input("post.remark", "", "trim");
			$validate = new Validate($rule, $msg);
			$check   = $validate->check($data);
			if($check){
				$model = model("Node");
				$res = $model->save($data);
				if($res){
					$node_id = $model->id;
					return $this->success("添加成功！", url('node/index', ['pid'=>$data['pid']]));
				}else{
					return $this->error("添加失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$model = model("Node");
			$service = new Tree();
			$menus = $model->all_menus();
			$menus = $service->create_menu($menus);
			$menus = $service->toFormatTree($menus);
			$menus = array_merge([0=>['id'=>0,'title_show'=>'顶级菜单']], $menus);
			if($pid){
				$level = $model->col_value_by_id($pid, 'level');
				$level = ++$level > 3 ? 3 : $level;
				$this->assign('_level', $level);
			}
			$this->assign("_menus", $menus);
			$this->assign("_pid", $pid);
			return view('node/add',['meta_title'=>"添加后台菜单"]);
		}
	}

	public function edit($id=0){
		if(request()->isPost()){
			$rule = [
				'id'	=> 'gt:0',
				'title'	=> 'require',
				'name'	=> 'require',
			];
			$msg = [
				'id.gt'	=> '系统错误，非法操作！',
				'title.require'	=> "标题不能为空！",
				'name.require'	=> "链接不能为空！",
			];
			$data = [];
			$data['id'] = input("post.id", 0, "intval");
			$data['title'] = input("post.title", "", "trim");
			$data['name'] = input("post.url", "", "trim");
			$data['status'] = input("post.status", 0, "intval");
			$data['sort'] = input("post.sort", 0, "intval");
			$data['pid'] = input("post.pid", 0, "intval");
			$data['level'] = input("post.level", 1, "intval");
			$data['remark'] = input("post.remark", "", "trim");
			$validate = new Validate($rule, $msg);
			$check   = $validate->check($data);
			if($check){
				$model = model("Node");
				$res = $model->update($data);
				if($res !== false){
					return $this->success("修改成功！", url('node/index', ['pid'=>$data['pid']]));
				}else{
					return $this->error("修改失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$model = model("Node");
			$info = $model->node_by_id($id);
			if($info){
				$service = new Tree();
				$menus = $model->all_menus();
				$menus = $service->create_menu($menus);
				$menus = $service->toFormatTree($menus);
				$menus = array_merge([0=>['id'=>0,'title_show'=>'顶级菜单']], $menus);
				$this->assign("_info", $info);
				$this->assign("_menus", $menus);
				return view('node/edit',['meta_title'=>"编辑后台菜单"]);
			}else{
				$this->error('获取节点信息错误');
			}
		}
	}

	/**
	 * 更改状态
	 */
	public function status($id,$value = 0){
        $where = ['id'=>$id];
        $msg   = ['success'=>'操作成功！', 'error'=>'操作失败！', 'url'=>'' ,'ajax'=> request()->isAjax()];
		$data  = ['status' => $value];
		$model = model("Node");
        if($model->save($data, $where)!==false) {
            $this->success($msg['success'],$msg['url'],$msg['ajax']);
        }else{
            $this->error($msg['error'],$msg['url'],$msg['ajax']);
        }
	}
	
	/**
	 * 删除节点
	 */
	public function delete(){
		$id = input('id', 0);
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!', "");
        }
		$model = model('Node');
		$id = array_unique((array)$id);
        $map = ['id' => ['IN', $id]];
        if($model->where($map)->delete()){
            $this->success('删除成功', "");
        } else {
            $this->error('删除失败！', "");
        }
	}
}
