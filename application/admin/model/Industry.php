<?php
/**
 * 行业领域model
 * @author liangjian<liangjian@bestfu.com>
 */
namespace app\admin\model;
use think\Model;

class Industry extends Model
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
	 * 分页获取行业领域
	 */
	public function page_industrys(){
		$lists = [];
		$page = null;
		$objs = $this
				->order("location, sort")
				->paginate(config('page_size'));
		if($objs){
			foreach($objs as $obj){
				$lists[] = $obj->getData();
			}
			$page = $objs->render();
		}
		return ['list'=>$lists, 'page'=>$page];
	}
	
	/**
	 * 行业领域详情
	 * @param $id 行业领域ID
	 * @param $field 查询字段
	 * @return array
	 */
	public function industry_by_id($id, $field="*"){
		if($id){
			$map = ['id'=>$id];
			$obj = $this->field($field)->where($map)->find();
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
