<?php
/**
 * 前台菜单banner图管理controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;

class Banner extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 首页轮播图
	 */
	public function index(){
		$model = model("Picture");
		$_res = $model->page_carousel_imgs();
		$replace = [
			'status' => [0 => '显示', 1 => '关闭'],
			'tab' => [0 => '是', 1 => '否'],
		];
		int_to_string($_res['list'], $replace);
		$this->assign("_list", $_res['list']);
		$this->assign("_page", $_res['page']);
		return view('banner/index',['meta_title'=>"首页轮播图"]);
	}
	
	/**
	 * 添加轮播图
	 */
	public function add(){
		if(request()->isPost()){
			$data = [];
			$data['title']	= input("post.title", "", "trim");
			$data['thumb']	= input("post.thumb", "", "trim");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['url']	= input("post.url", "", "trim");
			$data['status']	= input("post.status", 0, "intval");
			$data['tab']	= input("post.tab", 0, "intval");
			$data['remark']	= input("post.remark", "", "trim");
			$data['type']	= 0;
			$validate = \think\Loader::validate('Banner');
			if($validate->scene('add')->check($data)){
				$model = model("Picture");
				$_res = $model->save($data);
				if($_res){
					$pic_id = $model->id;
					return $this->success("添加成功！", url("banner/index"));
				}else{
					return $this->error("添加失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			return view('banner/add',['meta_title'=>"添加轮播图"]);
		}
	}

	/**
	 * 修改轮播图
	 */
	public function edit($id=0){
		if(request()->isPost()){
			$data = [];
			$data['id']		= input("post.id", 0, "intval");
			$data['title']	= input("post.title", "", "trim");
			$data['thumb']	= input("post.thumb", "", "trim");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['url']	= input("post.url", "", "trim");
			$data['status']	= input("post.status", 0, "intval");
			$data['tab']	= input("post.tab", 0, "intval");
			$data['remark']	= input("post.remark", "", "trim");
			$validate = \think\Loader::validate('Banner');
			if($validate->scene('edit')->check($data)){
				$model = model("Picture");
				$res = $model->update($data);
				if($res !== false){
					return $this->success("修改成功！", url("banner/index"));
				}else{
					return $this->error("修改失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$model = model("Picture");
			$_info = $model->carousel_img_by_id($id);
			if($_info){
				$this->assign("_info", $_info);
				return view('banner/edit',['meta_title'=>"编辑首页轮播图"]);
			}else{
				$this->error('获取轮播图信息失败！');
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
		$model = model("Picture");
        if($model->save($data, $where)!==false) {
            return $this->success($msg['success'],$msg['url'],$msg['ajax']);
        }else{
            return $this->error($msg['error'],$msg['url'],$msg['ajax']);
        }
	}
	
	/**
	 * 删除轮播图
	 */
	public function delete(){
		$id = input('post.id', 0);
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!', "");
        }
		$model = model("Picture");
		$thumb = $model->col_value_by_id($id, 'thumb');
		$map = ['id' => $id];
		if($model->where($map)->delete()){
			@unlink(".{$thumb}");
            $this->success('删除成功！', "");
        } else {
            $this->error('删除失败！', "");
        }
	}
	
	/**
	 * 菜单banner图
	 */
	public function banner(){
		$model = model("Picture");
		$m_model = model("Menu");
		$_res = $model->page_banner_imgs();
		$_menus = $m_model->all_menu_titles();
		$replace = [
			'status' => [0 => '显示', 1 => '关闭'],
			'tab' => [0 => '是', 1 => '否'],
			'm_id' => $_menus
		];
		int_to_string($_res['list'], $replace);
		$this->assign("_list", $_res['list']);
		$this->assign("_page", $_res['page']);
		return view('banner/banner',['meta_title'=>"菜单BANNER图"]);
	}
	
	/**
	 * 添加菜单banner
	 */
	public function add_banner(){
		if(request()->isPost()){
			$data = [];
			$data['title']	= input("post.title", "", "trim");
			$data['thumb']	= input("post.thumb", "", "trim");
			$data['url']	= input("post.url", "", "trim");
			$data['m_id']	= input("post.m_id", 0, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$data['tab']	= input("post.tab", 0, "intval");
			$data['remark']	= input("post.remark", "", "trim");
			$data['type']	= 1;
			$validate = \think\Loader::validate('Banner');
			if($validate->scene('add_banner')->check($data)){
				$model = model("Picture");
				$_img = $model->picture_by_m_id($data['m_id']);
				if($_img){
					$data['id'] = $_img['id'];
					$_res = $model->update($data);
					if($_res !== false){
						return $this->success("添加成功！", url("banner/banner"));
					}else{
						return $this->error("添加失败！", "");
					}
				}else{
					$_res = $model->save($data);
					if($_res){
						$img_id = $model->id;
						return $this->success("添加成功！", url('banner/banner'));
					}else{
						return $this->error("添加失败！", "");
					}
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$model = model("Menu");
			$_menus = $model->all_menu_titles();
			foreach($_menus as $key => $val){
				if($val == '首页'){
					unset($_menus[$key]);
					break;
				}
			}
			$this->assign("_menus", $_menus);
			return view('banner/add_banner',['meta_title'=>"添加BANNER图"]);
		}
	}

	/**
	 * 编辑菜单banner
	 */
	public function edit_banner($id=0){
		if(request()->isPost()){
			$data = [];
			$data['id']		= input("post.id", 0, "intval");
			$data['title']	= input("post.title", "", "trim");
			$data['thumb']	= input("post.thumb", "", "trim");
			$data['url']	= input("post.url", "", "trim");
			$data['m_id']	= input("post.m_id", 0, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$data['tab']	= input("post.tab", 0, "intval");
			$data['remark']	= input("post.remark", "", "trim");
			$validate = \think\Loader::validate('Banner');
			if($validate->scene('edit_banner')->check($data)){
				$model = model("Picture");
				$_img = $model->banner_img_by_id($data['id']);
				if($_img){
					$_res = $model->update($data);
					if($_res !== false){
						return $this->success("修改成功！", url("banner/banner"));
					}else{
						return $this->error("修改失败！", "");
					}
				}else{
					$this->error('获取BANNER图信息失败！', "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$model = model("Picture");
			$_info = $model->banner_img_by_id($id);
			if($_info){
				$m_model = model("Menu");
				$_menus = $m_model->all_menu_titles();
				foreach($_menus as $key => $val){
					if($val == '首页'){
						unset($_menus[$key]);
						break;
					}
				}
				$this->assign("_menus", $_menus);
				$this->assign("_info", $_info);
				return view('banner/edit_banner',['meta_title'=>"编辑BANNER图"]);
			}else{
				$this->error('获取BANNER图信息失败！');
			}
		}
	}
}
