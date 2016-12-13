<?php
/**
 * 文章管理model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\model;
use think\Model;

class Article extends Model
{
	/**
	 * 自动完成
	 */
	protected $insert = ['addtime'];
	
	/**
	 * 字段addtime自动完成
	 */
	protected function setAddtimeAttr()
    {
        return request()->time();
    }
	
	/**
	 * 根据前台菜单ID获取文章
	 * @return boolen|array
	 */
	public function article_by_m_id($menu_id){
		if($menu_id){
			$map = ['m_id'=>$menu_id];
			$obj = $this->where($map)->find();
			if($obj){
				return $obj->getData();
			}
			return [];
		}
		return false;
	}
}
