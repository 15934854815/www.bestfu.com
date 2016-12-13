<?php
/**
 * 新闻model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\index\model;
use think\Model;

class News extends Model
{
	/**
	 * 分页获取所有新闻列表
	 * @return array
	 */
	public function page_news($size=10){
		$news = [];
		$page = null;
		$map = ['status'=>0];
		$objs = $this
				->where($map)
				->order("sort")
				->paginate($size);
		if($objs){
			foreach($objs as $obj){
				$news[] = $obj->getData();
			}
			$page = $objs->render();
		}
		return ['list'=>$news, 'page'=>$page];
	}
	
	/**
	 * 根据ID获取新闻详情
	 * @param $id 新闻ID
	 * @param $field 查询字段
	 * @return array
	 */
	public function news_by_id($id, $field="*"){
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
