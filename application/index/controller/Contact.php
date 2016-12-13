<?php
/**
 * 联系我们controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\controller;
use app\index\controller\Base;

class Contact extends Base
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
	 * 联系我们
	 */
	public function index(){
		$model = model("Contact");
		$p_model = model("Picture");
		$telephones = $model->all_telephones();
		$emails = $model->all_emails();
		$wechats = $model->all_wechats();
		$address = $model->address_info();
		$banner = $p_model->picture_by_m_id($this->class_id);
		$this->assign("_telephones", $telephones);
		$this->assign("_emails", $emails);
		$this->assign("_wechats", $wechats);
		$this->assign("_address", $address);
		$this->assign("_banner", $banner);
		return view('contact/index', ['_meta_title'=>$this->meta_tilte]);
	}
}
