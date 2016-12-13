<?php
/**
 * 广告位图片model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\model;
use think\Model;

class Picture extends Model
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
	 * 分页获取轮播图列表
	 * @return array
	 */
	public function page_carousel_imgs()
	{
		$imgs = [];
		$page = null;
		$map = ['type' => 0];
		$objs = $this
				->where($map)
				->order("sort")
				->paginate(config('page_size'));
		if($objs)
		{
			foreach($objs as $obj)
			{
				$imgs[] = $obj->getData();
			}
			$page = $objs->render();
		}
		return ['list'=>$imgs, 'page'=>$page];
	}
	
	/**
	 * 分页获取banner图列表
	 * @return array
	 */
	public function page_banner_imgs()
	{
		$imgs = [];
		$page = null;
		$map = ['type' => 1];
		$objs = $this
				->where($map)
				->order("sort")
				->paginate(config('page_size'));
		if($objs)
		{
			foreach($objs as $obj)
			{
				$imgs[] = $obj->getData();
			}
			$page = $objs->render();
		}
		return ['list'=>$imgs, 'page'=>$page];
	}
	
	/**
	 * 根据ID获取轮播图详情
	 * @param $id 图片ID
	 * @param $field 查询字段
	 * @return array
	 */
	public function carousel_img_by_id($id, $field="*")
	{
		if($id)
		{
			$map = ['id'=>$id, 'type'=>0];
			$obj = $this->field($field)->where($map)->find();
			if($obj)
			{
				return $obj->getData();
			}
			return [];
		}
		return [];
	}
	
	/**
	 * 根据ID获取BANNER图详情
	 * @param $id 图片ID
	 * @param $field 查询字段
	 * @return array
	 */
	public function banner_img_by_id($id, $field="*")
	{
		if($id)
		{
			$map = ['id'=>$id, 'type'=>1];
			$obj = $this->field($field)->where($map)->find();
			if($obj)
			{
				return $obj->getData();
			}
			return [];
		}
		return [];
	}
	
	/**
	 * 根据菜单ID获取图片详情
	 */
	public function picture_by_m_id($menu_id, $field="*")
	{
		if($menu_id)
		{
			$map = ['m_id'=>$menu_id, 'type'=>1];
			$obj = $this->field($field)->where($map)->find();
			if($obj)
			{
				return $obj->getData();
			}
			return [];
		}
		return [];
	}
	
	/**
	 * 根据id获取某个字段的值
	 * @return int|string|mixed
	 */
	public function col_value_by_id($id, $col='id')
	{
		return $this->where(['id'=>$id])->value($col);
	}
}
