<?php
/**
 * 联系我们model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\model;
use think\Model;

class Contact extends Model
{
	/**
	 * 分页获取服务热线
	 * @return array
	 */
	public function page_tels(){
		$tels = [];
		$page = null;
		$map = ['type'=>1];
		$objs = $this
				->where($map)
				->order("sort")
				->paginate(config('page_size'));
		if($objs){
			foreach($objs as $obj){
				$tels[] = $obj->getData();
			}
			$page = $objs->render();
		}
		return ['list'=>$tels, 'page'=>$page];
	}
	
	/**
	 * 分页获取Email
	 * @return array
	 */
	public function page_emails(){
		$emails = [];
		$page = null;
		$map = ['type'=>2];
		$objs = $this
				->where($map)
				->order("sort")
				->paginate(config('page_size'));
		if($objs){
			foreach($objs as $obj){
				$emails[] = $obj->getData();
			}
			$page = $objs->render();
		}
		return ['list'=>$emails, 'page'=>$page];
	}
	
	/**
	 * 分页获取微信公众号
	 * @return array
	 */
	public function page_wechats(){
		$wechats = [];
		$page = null;
		$map = ['type'=>3];
		$objs = $this
				->where($map)
				->order("sort")
				->paginate(config('page_size'));
		if($objs){
			foreach($objs as $obj){
				$wechats[] = $obj->getData();
			}
			$page = $objs->render();
		}
		return ['list'=>$wechats, 'page'=>$page];
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
	
	/**
	 * 根据id获取某个字段的值
	 * @return int|string|mixed
	 */
	public function col_value_by_id($id, $col='id'){
		return $this->where(['id'=>$id])->value($col);
	}
}
