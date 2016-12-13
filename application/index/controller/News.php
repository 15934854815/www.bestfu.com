<?php
/**
 * 新闻controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\controller;
use app\index\controller\Base;

class News extends Base
{
	private $class_id;
	private $meta_tilte;
	public function _initialize(){
		parent::_initialize();
		
		$control = strtolower(request()->controller());
		$_info = model("Menu")->menu_by_control($control);
		$this->class_id = $_info['id'];
		$this->meta_tilte = $_info['title'];
	}
	
	/**
	 * 新闻列表
	 */
	public function index(){
		$model = model("News");
		$p_model = model("Picture");
		$_res = $model->page_news();
		$banner = $p_model->picture_by_m_id($this->class_id);
		$this->assign("_list", $_res['list']);
		$this->assign("_page", $_res['page']);
		$this->assign("_banner", $banner);
		return view('news/index', ['_meta_title'=>$this->meta_tilte]);
	}
	
	/**
	 * 查看新闻
	 */
	public function show($id=0){
		if($id){
			$model = model("News");
			$news = $model->news_by_id($id);
			if($news){
				$this->assign("_info", $news);
				$title = "{$news['title']}_{$this->meta_tilte}";
				return view('news/show', ['_meta_title'=>$title]);
			}else{
				return abort(404, '页面不存在！');
				//return $this->error("系统提示：非法访问！");
			}
		}else{
			return $this->error("系统提示：非法访问！");
		}
	}
}
