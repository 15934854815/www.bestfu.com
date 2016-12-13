<?php
/**
 * 联系我们controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;

class Contact extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	public function index($id=1){
		$model = model("Contact");
		switch($id){
			case 1:
				$_res = $model->page_tels();
				$replace = ['status'=>[0=>'显示', 1=>'关闭']];
				int_to_string($_res['list'], $replace);
				$this->assign("_list", $_res['list']);
				$this->assign("_page", $_res['page']);
				break;
			case 2:
				$_res = $model->page_emails();
				$replace = ['status'=>[0=>'显示', 1=>'关闭']];
				int_to_string($_res['list'], $replace);
				$this->assign("_list", $_res['list']);
				$this->assign("_page", $_res['page']);
				break;
			case 3:
				$_res = $model->page_wechats();
				$replace = ['status'=>[0=>'显示', 1=>'关闭']];
				int_to_string($_res['list'], $replace);
				$this->assign("_list", $_res['list']);
				$this->assign("_page", $_res['page']);
				break;
			case 4:
				$_info = $model->address_info();
				$this->assign("_info", $_info);
				break;
			default:
				$id = 1;
				$_res = $model->page_tels();
				$replace = ['status'=>[0=>'显示', 1=>'关闭']];
				int_to_string($_res['list'], $replace);
				$this->assign("_list", $_res['list']);
				$this->assign("_page", $_res['page']);
				break;
		}
		$template = "index_{$id}";
		return view("contact/{$template}", ['meta_title'=>"联系我们"]);
	}
	
	/**
	 * 添加服务热线
	 */
	public function add_telephone(){
		if(request()->isPost()){
			$data = [];
			$data['key'] = $data['title'] = input("post.title", "", "trim");
			$data['value'] = $data['telephone'] = input("post.telephone", "", "trim");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$data['type']	= 1;
			$validate = \think\Loader::validate('Contact');
			if($validate->scene('add_tel')->check($data)){
				unset($data['title']);
				unset($data['telephone']);
				$model = model("Contact");
				$_res = $model->save($data);
				if($_res){
					$_id = $model->id;
					return $this->success("添加成功！", "");
				}else{
					return $this->error("添加失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$this->error("系统错误：非法操作！");
		}
	}
	
	/**
	 * 修改服务热线
	 */
	public function edit_telephone(){
		if(request()->isPost()){
			$data = [];
			$data['id'] = input("post.id", 0, "intval");
			$data['key'] = $data['title'] = input("post.title", "", "trim");
			$data['value'] = $data['telephone'] = input("post.telephone", "", "trim");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$data['type']	= 1;
			$validate = \think\Loader::validate('Contact');
			if($validate->scene('edit_tel')->check($data)){
				unset($data['title']);
				unset($data['telephone']);
				$model = model("Contact");
				$_res = $model->update($data);
				if($_res){
					return $this->success("修改成功！", "");
				}else{
					return $this->error("修改失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$this->error("系统错误：非法操作！");
		}
	}
	
	/**
	 * 删除菜单
	 */
	public function del_telephone(){
		if(request()->isPost()){
			$id = input('post.id', 0);
	        if ( empty($id) ) {
	            $this->error('请选择要操作的数据!', "");
	        }
			$model = model('Contact');
			$map = ['id'=>$id, 'type'=>1];
	        if($model->where($map)->delete()){
	            $this->success('删除成功！', "");
	        } else {
	            $this->error('删除失败！', "");
	        }
		}else{
			return $this->error("系统错误：非法操作！");
		}
	}
	
	/**
	 * 添加邮箱
	 */
	public function add_email(){
		if(request()->isPost()){
			$data = [];
			$data['key'] = $data['title'] = input("post.title", "", "trim");
			$data['value'] = $data['email'] = input("post.email", "", "trim");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$data['type']	= 2;
			$validate = \think\Loader::validate('Contact');
			if($validate->scene('add_email')->check($data)){
				unset($data['title']);
				unset($data['email']);
				$model = model("Contact");
				$_res = $model->save($data);
				if($_res){
					$_id = $model->id;
					return $this->success("添加成功！", "");
				}else{
					return $this->error("添加失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$this->error("系统错误：非法操作！");
		}
	}
	
	/**
	 * 修改邮箱
	 */
	public function edit_email(){
		if(request()->isPost()){
			$data = [];
			$data['id'] = input("post.id", 0, "intval");
			$data['key'] = $data['title'] = input("post.title", "", "trim");
			$data['value'] = $data['email'] = input("post.email", "", "trim");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$data['type']	= 2;
			$validate = \think\Loader::validate('Contact');
			if($validate->scene('edit_email')->check($data)){
				unset($data['title']);
				unset($data['email']);
				$model = model("Contact");
				$_res = $model->update($data);
				if($_res){
					return $this->success("修改成功！", "");
				}else{
					return $this->error("修改失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$this->error("系统错误：非法操作！");
		}
	}
	
	/**
	 * 删除菜单
	 */
	public function del_email(){
		if(request()->isPost()){
			$id = input('post.id', 0);
	        if ( empty($id) ) {
	            $this->error('请选择要操作的数据!', "");
	        }
			$model = model('Contact');
			$map = ['id'=>$id, 'type'=>2];
	        if($model->where($map)->delete()){
	            $this->success('删除成功！', "");
	        } else {
	            $this->error('删除失败！', "");
	        }
		}else{
			return $this->error("系统错误：非法操作！");
		}
	}

	/**
	 * 添加微信公众号
	 */
	public function add_wechat(){
		if(request()->isPost()){
			$data = [];
			$data['key'] = $data['title'] = input("post.title", "", "trim");
			$data['value'] = $data['thumb'] = input("post.thumb", "", "trim");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$data['type']	= 3;
			$validate = \think\Loader::validate('Contact');
			if($validate->scene('add_wechat')->check($data)){
				unset($data['title']);
				unset($data['thumb']);
				$model = model("Contact");
				$_res = $model->save($data);
				if($_res){
					$_id = $model->id;
					return $this->success("添加成功！", "");
				}else{
					return $this->error("添加失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$this->error("系统错误：非法操作！");
		}
	}
	
	/**
	 * 修改邮箱
	 */
	public function edit_wechat(){
		if(request()->isPost()){
			$data = [];
			$data['id'] = input("post.id", 0, "intval");
			$data['key'] = $data['title'] = input("post.title", "", "trim");
			$data['value'] = $data['thumb'] = input("post.thumb", "", "trim");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$data['type']	= 3;
			$validate = \think\Loader::validate('Contact');
			if($validate->scene('edit_wechat')->check($data)){
				unset($data['title']);
				unset($data['thumb']);
				$model = model("Contact");
				$_res = $model->update($data);
				if($_res){
					return $this->success("修改成功！", "");
				}else{
					return $this->error("修改失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$this->error("系统错误：非法操作！");
		}
	}
	
	/**
	 * 删除微信公众号
	 */
	public function del_wechat(){
		$id = input('post.id', 0);
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!', "");
        }
		$model = model("Contact");
		$thumb = $model->col_value_by_id($id, 'value');
		$map = ['id'=>$id, 'type'=>3];
		if($model->where($map)->delete()){
			@unlink(".{$thumb}");
            $this->success('删除成功！', "");
        } else {
            $this->error('删除失败！', "");
        }
	}

	/**
	 * 修改地址
	 */
	public function save_address(){
		if(request()->isPost()){
			$data = [];
			$data['key'] = $data['address'] = input("post.address", "", "trim");
			$data['value'] = $data['addr_img'] = input("post.addr_img", "", "trim");
			$data['type'] = 4;
			$validate = \think\Loader::validate('Contact');
			if($validate->scene('save_address')->check($data)){
				unset($data['address']);
				unset($data['addr_img']);
				$model = model("Contact");
				$_info = $model->address_info();
				if($_info){
					$data['id'] = $_info['id'];
					$_res = $model->update($data);
					if($_res){
						if($_info['value'] != $data['value']){
							@unlink(".{$_info['value']}");
						}
						return $this->success("修改成功！", "");
					}else{
						return $this->error("修改失败！", "");
					}
				}else{
					$_res = $model->save($data);
					if($_res){
						$_id = $model->id;
						return $this->success("修改成功！", "");
					}else{
						return $this->error("修改失败！", "");
					}
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$this->error("系统错误：非法操作！");
		}
	}
	
	/**
	 * 更改状态
	 */
	public function status($id,$value = 0){
        $where = ['id'=>$id];
        $msg   = ['success'=>'操作成功！', 'error'=>'操作失败！', 'url'=>'' ,'ajax'=> request()->isAjax()];
		$data  = ['status' => $value];
		$model = model("Contact");
        if($model->save($data, $where)!==false) {
            return $this->success($msg['success'],$msg['url'],$msg['ajax']);
        }else{
            return $this->error($msg['error'],$msg['url'],$msg['ajax']);
        }
	}
}
