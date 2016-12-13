<?php
/**
 * 新闻管理model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\model;
use think\Model;

class News extends Model
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
	 * 分页获取所有新闻列表
	 * @return array
	 */
	public function page_news(){
		$news = [];
		$page = null;
		$objs = $this
				->order("sort")
				->paginate(config('page_size'));
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
	
	/**
	 * 根据id获取某个字段的值
	 * @return int|string|mixed
	 */
	public function col_value_by_id($id, $col='id'){
		return $this->where(['id'=>$id])->value($col);
	}
}
