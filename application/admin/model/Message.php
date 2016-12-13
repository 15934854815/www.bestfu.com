<?php
/**
 * 留言管理model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\model;
use think\Model;

class Message extends Model
{
	/**
	 * 分页获取留言列表
	 * @return array
	 */
	public function page_msgs(){
		$msgs = [];
		$page = null;
		$objs = $this
				->order("addtime DESC")
				->paginate(config('page_size'));
		if($objs){
			foreach($objs as $obj){
				$msgs[] = $obj->getData();
			}
			$page = $objs->render();
		}
		return ['list'=>$msgs, 'page'=>$page];
	}
	
	/**
	 * 根据ID获取留言详情
	 * @return array
	 */
	public function msg_by_id($id, $field="*"){
		if($id){
			$obj = $this->field($field)->find($id);
			if($obj){
				return $obj->getData();
			}
			return [];
		}
		return [];
	}
}
