<?php
/**
 * 行业领域controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;

class Industry extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 行业领域列表
	 */
	public function index(){
		$model = model("Industry");
		$_res = $model->page_industrys();
		$replace = [
			'status' => [0=>'显示', 1=>'关闭'],
			'newtab' => [0=>'是', 1=>'否'],
			'location' => [0=>'大图标',1=>'小图标'],
		];
		int_to_string($_res['list'], $replace);
		$this->assign("_list", $_res['list']);
		$this->assign("_page", $_res['page']);
		return view('industry/index',['meta_title'=>"行业领域列表"]);
	}
	
	/**
	 * 添加行业领域
	 */
	public function add(){
		if(request()->isPost()){
			$data = [];
			$data['title']	= input("post.title", "", "trim");
			$data['thumb']	= input("post.thumb", "", "trim");
			$data['style']	= input("post.style", "", "trim");
			$data['url']	= input("post.url", "", "trim");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['newtab']	= input("post.newtab", 0, "intval");
			$data['location'] = input("post.location", 0, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$validate = \think\Loader::validate('Industry');
			if($validate->scene('add')->check($data)){
				$model = model("Industry");
				$_res = $model->save($data);
				if($_res){
					$_id = $model->id;
					return $this->success("添加成功！", url("industry/index"));
				}else{
					return $this->error("添加失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			return view('industry/add',['meta_title'=>"添加行业领域"]);
		}
	}
	
	/**
	 * 修改行业领域
	 */
	public function edit($id=0){
		if(request()->isPost()){
			$data = [];
			$data['id']		= input("post.id", 0, "intval");
			$data['title']	= input("post.title", "", "trim");
			$data['thumb']	= input("post.thumb", "", "trim");
			$data['style']	= input("post.style", "", "trim");
			$data['url']	= input("post.url", "", "trim");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['newtab']	= input("post.newtab", 0, "intval");
			$data['location'] = input("post.location", 0, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$validate = \think\Loader::validate('Industry');
			if($validate->scene('edit')->check($data)){
				$model = model("Industry");
				$res = $model->update($data);
				if($res !== false){
					return $this->success("修改成功！", url("industry/index"));
				}else{
					return $this->error("修改失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$model = model("Industry");
			$_info = $model->industry_by_id($id);
			if($_info){
				$this->assign("_info", $_info);
				return view('industry/edit',['meta_title'=>"编辑行业领域"]);
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
		$model = model("Industry");
        if($model->save($data, $where)!==false) {
            return $this->success($msg['success'],$msg['url'],$msg['ajax']);
        }else{
            return $this->error($msg['error'],$msg['url'],$msg['ajax']);
        }
	}
	
	/**
	 * 删除行业领域
	 */
	public function delete(){
		$id = input('post.id', 0);
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!', "");
        }
		$model = model("Industry");
		$thumb = $model->col_value_by_id($id, 'thumb');
		$map = ['id' => $id];
		if($model->where($map)->delete()){
			@unlink(".{$thumb}");
            $this->success('删除成功！', "");
        } else {
            $this->error('删除失败！', "");
        }
	}
}
