<?php
/**
 * 系统设置model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\model;
use think\Model;

class Config extends Model
{
	/**
	 * 所有配置
	 */
	public function configs(){
		$objs = $this->all();
		$cfgs = [];
		if($objs){
			foreach($objs as $obj){
				$temp = $obj->getData();
				$cfgs[$temp['key']] = $temp['value'];
			}
		}
		return $cfgs;
	}
}
