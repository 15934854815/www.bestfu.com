<?php
/**
 * 系统设置controller
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class System extends Base
{
	/**
	 * 构造
	 */
	private $cfg_type;
	public function _initialize(){
		parent::_initialize();
		$this->cfg_type = [
			'1'	=>	'网站配置',
			'2'	=>	'后台配置',
			'3'	=>	'开发配置',
		];
	}
	
	public function index($id=1){
		$template = "index_{$id}";
		$meta_title = $this->cfg_type[$id];
		return view("system/{$template}", ['meta_title'=>$meta_title]);
	}
	
	public function save($config){
        if($config && is_array($config)){
			Db::startTrans();
			try{
				$cfg_model = model("Config");
	            $cfg_param = [];
	            $cfg_keys = array_keys($config);
	            $map = ['key' => ['IN', $cfg_keys]];
	            foreach ($config as $key => $value) {
	            	$cfg_param[] = [
	            		'key' => $key,
	            		'value'	=> $value
	            	];
	            }
				$cfg_model->where($map)->delete();
				$cfg_model->saveAll($cfg_param);
			    // 提交事务
			    Db::commit();
				$resp = true;
			} catch (\Exception $e) {
			    // 回滚事务
			    Db::rollback();
				$resp = false;
			}
			if($resp){
				return $this->success('保存成功！', "");
			}else{
				return $this->error("保存失败！", "");
			}
        }else{
        	return $this->error("参数错误，保存失败！", "");
        }
    }
}
