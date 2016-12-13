<?php
/**
 * 联系我们model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\model;
use think\Model;

class Contact extends Model
{
	/**
	 * 所有服务热线
	 * @return array
	 */
	public function all_telephones(){
		$tels = [];
		$map = ['status'=>0,'type'=>1];
		$objs = $this->where($map)->order("sort")->select();
		if($objs){
			foreach($objs as $obj){
				$tels[] = $obj->getData();
			}
		}
		return $tels;
	}
	
	/**
	 * 所有邮箱
	 * @return array
	 */
	public function all_emails(){
		$emails = [];
		$map = ['status'=>0,'type'=>2];
		$objs = $this->where($map)->order("sort")->select();
		if($objs){
			foreach($objs as $obj){
				$emails[] = $obj->getData();
			}
		}
		return $emails;
	}
	
	/**
	 * 所有微信公众号
	 * @return array
	 */
	public function all_wechats(){
		$wechats = [];
		$map = ['status'=>0,'type'=>3];
		$objs = $this->where($map)->order("sort")->select();
		if($objs){
			foreach($objs as $obj){
				$wechats[] = $obj->getData();
			}
		}
		return $wechats;
	}
	
	/**
	 * 地址信息
	 * @return array
	 */
	public function address_info(){
		$map = ['type'=>4];
		$obj = $this->where($map)->find();
		if($obj){
			return $obj->getData();
		}
		return [];
	}
}
