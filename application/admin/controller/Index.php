<?php
/**
 * 首页controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;

class Index extends Base
{
	public function _initialize(){
		parent::_initialize();
	}
	
	public function index(){
		return view('index/index',['meta_title'=>"管理首页"]);
	}
	
	/*修改密码*/
	public function password(){
		if(request()->isPost()){
			$data = [];
			$data['oldpassword'] = input("post.oldpassword", "", "trim");
			$data['newpassword'] = input("post.newpassword", "", "trim");
			$data['re_password'] = input("post.re_password", "", "trim");
			$data['uid'] = ADMIN_UID;
			$validate = \think\Loader::validate('User');
			if($validate->scene('password')->check($data)){
				$temp = [];
				$model = model("User");
				$temp['uid'] = $data['uid'];
				$temp['password'] = $data['newpassword'];
				$_res = $model->update($temp);
				if($_res !== false){
					return $this->success("密码修改成功！", "");
				}else{
					return $this->error("密码修改失败！", "");
				}
			}else{
				return $this->error($validate->getError(), "");
			}
		}else{
			return view('index/password', ['meta_title'=>"修改密码"]);
		}
	}
}
