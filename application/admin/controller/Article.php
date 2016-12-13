<?php
/**
 * 文章管理controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;

class Article extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 集团简介
	 */
	public function about(){
		$class_id = $this->cfgs['ABOUT_CLASS_ID'];
		$class_id = $class_id ? intval($class_id) : 0;
		if(request()->isPost()){
			$data = [];
			$data['title'] = input("post.title", "", "trim");
			$data['content'] = input("post.content", "", "htmlspecialchars");
			$data['m_id'] = $class_id;
			$validate = \think\Loader::validate('Article');
			if($validate->scene('add_menu_content')->check($data)){
				$model = model("Article");
				$_info = $model->article_by_m_id($class_id);
				if($_info){
					$data['id'] = $_info['id'];
					$_res = $model->update($data);
					if($_res){
						return $this->success("修改成功！", "");
					}else{
						return $this->error("修改失败！", "");
					}
				}else{
					$_res = $model->save($data);
					if($_res){
						$article_id = $model->id;
						return $this->success("修改成功！", "");
					}else{
						return $this->error("修改失败！", "");
					}
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			if($class_id){
				$model = model("Article");
				$_info = $model->article_by_m_id($class_id);
				$this->assign("_info", $_info);
				return view('article/about',['meta_title'=>"集团简介"]);
			}else{
				$this->error("系统错误：非法操作！");
			}
		}
	}

	/**
	 * 工作机会
	 */
	public function jobs(){
		$class_id = $this->cfgs['JOBS_CLASS_ID'];
		$class_id = $class_id ? intval($class_id) : 0;
		if(request()->isPost()){
			$data = [];
			$data['title'] = input("post.title", "", "trim");
			$data['content'] = input("post.content", "", "htmlspecialchars");
			$data['m_id'] = $class_id;
			$validate = \think\Loader::validate('Article');
			if($validate->scene('add_menu_content')->check($data)){
				$model = model("Article");
				$_info = $model->article_by_m_id($class_id);
				if($_info){
					$data['id'] = $_info['id'];
					$_res = $model->update($data);
					if($_res){
						return $this->success("修改成功！", "");
					}else{
						return $this->error("修改失败！", "");
					}
				}else{
					$_res = $model->save($data);
					if($_res){
						$article_id = $model->id;
						return $this->success("修改成功！", "");
					}else{
						return $this->error("修改失败！", "");
					}
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			if($class_id){
				$model = model("Article");
				$_info = $model->article_by_m_id($class_id);
				$this->assign("_info", $_info);
				return view('article/jobs',['meta_title'=>"工作机会"]);
			}else{
				$this->error("系统错误：非法操作！");
			}
		}
	}

	/**
	 * 法律声明
	 */
	public function legal(){
		$class_id = $this->cfgs['LEGAL_CLASS_ID'];
		$class_id = $class_id ? intval($class_id) : 0;
		if(request()->isPost()){
			$data = [];
			$data['title'] = input("post.title", "", "trim");
			$data['content'] = input("post.content", "", "htmlspecialchars");
			$data['m_id'] = $class_id;
			$validate = \think\Loader::validate('Article');
			if($validate->scene('add_menu_content')->check($data)){
				$model = model("Article");
				$_info = $model->article_by_m_id($class_id);
				if($_info){
					$data['id'] = $_info['id'];
					$_res = $model->update($data);
					if($_res){
						return $this->success("修改成功！", "");
					}else{
						return $this->error("修改失败！", "");
					}
				}else{
					$_res = $model->save($data);
					if($_res){
						$article_id = $model->id;
						return $this->success("修改成功！", "");
					}else{
						return $this->error("修改失败！", "");
					}
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			if($class_id){
				$model = model("Article");
				$_info = $model->article_by_m_id($class_id);
				$this->assign("_info", $_info);
				return view('article/legal',['meta_title'=>"法律声明"]);
			}else{
				$this->error("系统错误：非法操作！");
			}
		}
	}
}
