<?php
/**
 * 新闻管理controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;

class News extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 新闻列表
	 */
	public function index(){
		$model = model("News");
		$_res = $model->page_news();
		$replace = ['status' => [0 => '显示', 1 => '关闭']];
		int_to_string($_res['list'], $replace);
		$this->assign("_list", $_res['list']);
		$this->assign("_page", $_res['page']);
		return view('news/index',['meta_title'=>"新闻列表"]);
	}
	
	/**
	 * 添加新闻
	 */
	public function add(){
		if(request()->isPost()){
			$data = [];
			$data['title']	= input("post.title", "", "trim");
			$data['thumb']	= input("post.thumb", "", "trim");
			$data['intro']	= input("post.intro", "", "trim");
			$data['content'] = input("post.content", "", "htmlspecialchars");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$validate = \think\Loader::validate('News');
			if($validate->scene('add')->check($data)){
				$model = model("News");
				$_res = $model->save($data);
				if($_res){
					$news_id = $model->id;
					return $this->success("添加成功！", url("news/index"));
				}else{
					return $this->error("添加失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			return view('news/add',['meta_title'=>"添加新闻"]);
		}
	}
	
	/**
	 * 修改新闻
	 */
	public function edit($id=0){
		if(request()->isPost()){
			$data = [];
			$data['id']		= input("post.id", 0, "intval");
			$data['title']	= input("post.title", "", "trim");
			$data['thumb']	= input("post.thumb", "", "trim");
			$data['intro']	= input("post.intro", "", "trim");
			$data['content'] = input("post.content", "", "htmlspecialchars");
			$data['sort']	= input("post.sort", 1, "intval");
			$data['status']	= input("post.status", 0, "intval");
			$validate = \think\Loader::validate('News');
			if($validate->scene('edit')->check($data)){
				$model = model("News");
				$_res = $model->update($data);
				if($_res !== false){
					return $this->success("修改成功！", url("news/index"));
				}else{
					return $this->error("修改失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			$model = model("News");
			$_info = $model->news_by_id($id);
			if($_info){
				$this->assign("_info", $_info);
				return view('news/edit',['meta_title'=>"编辑新闻"]);
			}else{
				$this->error('获取新闻信息失败！');
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
		$model = model("News");
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
		$model = model("News");
		$thumb = $model->col_value_by_id($id, 'thumb');
		$map = ['id' => $id];
		if($model->where($map)->delete()){
			@unlink(".{$thumb}");
            $this->success('删除成功！', "");
        } else {
            $this->error('删除失败！', "");
        }
	}
	
	public function demo(){
		/*$model = model("News");
		$_info = $model->news_by_id(2);
		$this->assign("_info", $_info);*/
		return view('news/demo');
	}
}
