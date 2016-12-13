<?php
/**
 * 菜单model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\model;
use think\Model;

class Menu extends Model
{
	/**
	 * 顶部菜单
	 * @return array
	 */
	public function header_menus(){
		$menus = [];
		$map = ['status'=>0,'ishead'=>0];
		$objs = $this->where($map)->order("sort")->select();
		if($objs){
			foreach($objs as $obj){
				$menus[] = $obj->getData();
			}
		}
		return $menus;
	}
	
	/**
	 * 底部菜单
	 * @return array
	 */
	public function footer_menus(){
		$menus = [];
		$map = ['status'=>0,'isfoot'=>0];
		$objs = $this->where($map)->order("sort")->select();
		if($objs){
			foreach($objs as $obj){
				$menus[] = $obj->getData();
			}
		}
		return $menus;
	}
	
	/**
	 * 根据访问地址获取菜单信息
	 * @return array
	 */
	public function menu_by_url($url){
		$info = [];
		$map = ['url'=>$url];
		$obj = $this->where($map)->find();
		if($obj){
			$info = $obj->getData();
		}
		return $info;
	}
	
	/**
	 * 根据访问controller获取菜单信息
	 * @return array
	 */
	public function menu_by_control($control){
		$info = [];
		$map = ['url'=>['LIKE', "{$control}/%"]];
		$obj = $this->where($map)->find();
		if($obj){
			$info = $obj->getData();
		}
		return $info;
	}
}
