<?php
/**
 * 行业领域model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\model;
use think\Model;

class Industry extends Model
{
	/**
	 * 大图片行业领域
	 * @return array
	 */
	public function big_industrys(){
		$lists = [];
		$map = ['location'=>0, 'status'=>0];
		$objs = $this->where($map)->order("sort")->limit(2)->select();
		if($objs){
			foreach($objs as $obj){
				$lists[] = $obj->getData();
			}
		}
		return $lists;
	}
	
	/**
	 * 小图片行业领域
	 * @return array
	 */
	public function small_industrys(){
		$lists = [];
		$map = ['location'=>1, 'status'=>0];
		$objs = $this->where($map)->order("sort")->limit(3)->select();
		if($objs){
			foreach($objs as $obj){
				$lists[] = $obj->getData();
			}
		}
		return $lists;
	}
}
