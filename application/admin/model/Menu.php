<?php
/**
 * 前台菜单管理model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\model;
use think\Model;

class Menu extends Model
{
	/**
	 * 分页获取所有菜单列表
	 * @return array
	 */
	public function page_menus(){
		$menus = [];
		$page = null;
		$objs = $this
				->order("sort")
				->paginate(config('page_size'));
		if($objs){
			foreach($objs as $obj){
				$menus[] = $obj->getData();
			}
			$page = $objs->render();
		}
		return ['list'=>$menus, 'page'=>$page];
	}
	
	/**
	 * 所有前台菜单列表
	 * @return array
	 */
	public function all_menu_titles(){
		return $this->column('title','id');
	}
}
