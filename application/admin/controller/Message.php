<?php
/**
 * 留言管理controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;

class Message extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	/**
	 * 留言列表
	 */
	public function index(){
		$model = model("Message");
		$_res = $model->page_msgs();
		$this->assign("_list", $_res['list']);
		$this->assign("_page", $_res['page']);
		return view('message/index',['meta_title'=>"留言列表"]);
	}
	
	/**
	 * 查看留言
	 */
	public function show($id=0){
		$model = model("Message");
		$_info = $model->msg_by_id($id);
		if($_info){
			$this->assign("_info", $_info);
			return view('message/show',['meta_title'=>"查看留言"]);
		}else{
			$this->error('获取留言信息失败！');
		}
	}
}
