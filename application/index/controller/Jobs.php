<?php
/**
 * 工作机会controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\controller;
use app\index\controller\Base;

class Jobs extends Base
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
	 * 工作机会
	 */
	public function index(){
		$p_model = model("Picture");
		$a_model = model("Article");
		$banner = $p_model->picture_by_m_id($this->class_id);
		$article = $a_model->article_by_m_id($this->class_id);
		$this->assign("_banner", $banner);
		$this->assign("_info", $article);
		return view('jobs/index', ['_meta_title'=>$this->meta_tilte]);
	}
}
