<?php
/**
 * 首页controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\controller;
use app\index\controller\Base;

class Index extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 首页
	 */
    public function index()
    {
    	$p_model = model("Picture");
		$i_model = model("Industry");
		$images = $p_model->carousel_imgs();
		$big = $i_model->big_industrys();
		$small = $i_model->small_industrys();
		$this->assign("_images", $images);
		$this->assign("_big", $big);
		$this->assign("_small", $small);
    	return view('index/index');
    }
	
	public function demo(){
		dump(captcha_src());
		//return view('index/demo');
	}
}
