<?php
/**
 * banner图片model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\model;
use think\Model;

class Picture extends Model
{
	/**
	 * 首页轮播图列表
	 * @return array
	 */
	public function carousel_imgs(){
		$imgs = [];
		$map = ['status'=>0, 'type'=>0];
		$objs = $this->where($map)->order("sort")->select();
		if($objs){
			foreach($objs as $obj){
				$imgs[] = $obj->getData();
			}
		}
		return $imgs;
	}
	
	/**
	 * 根据菜单ID获取图片详情
	 */
	public function picture_by_m_id($menu_id, $field="*"){
		if($menu_id){
			$map = [];
			$map['m_id'] = $menu_id;
			$map['type'] = 1;
			$obj = $this->field($field)->where($map)->find();
			if($obj){
				return $obj->getData();
			}
			return [];
		}
		return [];
	}
}
