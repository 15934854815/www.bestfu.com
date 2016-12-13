<?php
/**
 * 服务支持controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\controller;
use app\index\controller\Base;

class Service extends Base
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
	 * 服务支持
	 */
	public function index(){
		$p_model = model("Picture");
		$banner = $p_model->picture_by_m_id($this->class_id);
		$this->assign("_banner", $banner);
		return view('service/index', ['_meta_title'=>$this->meta_tilte]);
	}
	
	/**
	 * 留言
	 */
	public function do_message(){
		if(request()->isPost()){
			$data = [];
			$data['name'] = input("post.name", "", "trim");
			$data['mobile'] = input("post.tel", "", "trim");
			$data['email'] = input("post.company", "", "trim");
			$data['address'] = input("post.post", "", "trim");
			$data['content'] = input("post.message", "", "trim");
			$validate = \think\Loader::validate('Message');
			if($validate->scene('add')->check($data)){
				$model = model("Message");
				$_res = $model->save($data);
				if($_res){
					$_id = $model->id;
					return $this->success("您的信息提交成功，请您耐心等待，我们的工作人员会尽快联系您！");
				}else{
					return $this->error("留言失败！");
				}
			}else{
				return $this->error($validate->getError());
			}
		}else{
			return $this->error("系统提示：非法访问");
		}
	}
}
