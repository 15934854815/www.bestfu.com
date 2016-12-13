<?php
/**
 * 前台基类controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\controller;
use think\Controller;

class Base extends Controller
{
	protected $cfgs;
	
	public function _initialize()
    {
    	/*网站配置*/
    	$this->cfgs = model("Config")->configs();
		$this->assign("_cfgs", $this->cfgs);
		
		/*顶部菜单*/
		$_header = model("Menu")->header_menus();
		$this->assign("_header", $_header);
		
		/*底部菜单*/
		$_footer = model("Menu")->footer_menus();
		$this->assign("_footer", $_footer);
    }
}
